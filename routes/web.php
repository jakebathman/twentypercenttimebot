<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
 $episodes = App\Episode::orderBy('pubDate', 'ASC')->get();

 // Format episodes for graph and gather stats
 $twenty = array_fill(0, count($episodes), 20);
 $totalLength = 0;
 $numUnderTwenty = 0;
 $longestLength = 0;
 foreach ($episodes as $k => $episode) {
  $length = $episode->getDurationMinutes();
  $labels[] = substr($episode->pubDate, 0, 10);
  $x[] = $k; // Used for the regression stuff below
  $series[] = $length;

  $totalLength += $length;

  if ($length <= 20) {
   $numUnderTwenty += 1;
  }
  if ($length > $longestLength) {
   $longestLength = round($length, 1);
  }
 }

 $avgLength = round($totalLength / count($episodes), 1);

 // Calculate a line of best fit to estimate future episode lengths
 // Yes, this is silly, and isn't a predictor of future behavior. I know that,
 // but it's funny. Seek a duly licensed professional for investment advice.
 
 $milestones = [60, 90, 120, 150, 180];
 $milestone = 0;
 foreach ($milestones as $m) {
     if ($m > $longestLength) {
         $milestone = $m;
         break;
     }
 }
 

 // These steps are my implementation of a limear regression

 // Averages
 $avgX = array_sum($x) / count($x);
 $avgY = $avgLength;
 $y = $series;

 // Covariance
 $cov = 0;
 for ($i = 0; $i < count($x); $i++) {
  $cov += ($x[$i] - $avgX) * ($y[$i] - $avgY);
 }

 // Variance
 $var = 0;
 for ($i = 0; $i < count($x); $i++) {
  $var += pow(($x[$i] - $avgX), 2);
 }
 // Slope
 $m = $cov / $var;

 // Intercept
 $b = $avgY - ($m * $avgX);

 // Use these to determine when they'll hit a 60/90/120 minute episode
 $ep = ($milestone - $b) / $m;
 $milestoneEpisode = ceil($ep);

 return view('welcome', compact('labels', 'series', 'twenty', 'avgLength', 'numUnderTwenty', 'longestLength', 'milestone', 'milestoneEpisode'));
});

Route::get('graph', 'GraphController@index');

Route::view('bot', 'bot');
