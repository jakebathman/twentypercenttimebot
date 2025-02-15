<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use XmlParser;
use Ixudra\Curl\Facades\Curl;
use App\Episode;
use Illuminate\Support\Carbon;

class ProcessFeed implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $feedUrl = 'https://feeds.simplecast.com/2__oe3vS';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      \Log::info('Updating podcast feed');

      // Get the podcast feed
      $rss = Curl::to($this->feedUrl)->withOption('USERAGENT', "TwentyPercentTimeBot/1.0 (+https://www.twentypercentti.me/bot)")->allowRedirect()->get();
        
      // Pull the info & duration for each episode and log to the database
      try{
        $feed = XmlParser::extract($rss);
        $tmpEpisodes = $feed->rebase('channel')->parse([
          'items' => ['uses' => 'item[title,link,guid,pubDate,author,enclosure::url>file_url,enclosure::length>length_bytes,enclosure::type>file_type,description]'],
          'itunes' => ['uses' => 'item/itunes[subtitle,duration]'],
        ]);
        \Log::info('Episodes found: ' . count($tmpEpisodes['items']));
      }
      catch(\Throwable $e){
        \Log::error('Failed to parse XML');
        \Log::error($e->getMessage());
        \Log::info($rss);
        return false;
      }

      // Merge the two arrays (since the normal and itunes: items were parsed separately)
      foreach($tmpEpisodes['items'] as $key => $episode){
        $episodeInfo = array_merge($episode,$tmpEpisodes['itunes'][$key]);

        $date = Carbon::parse($episodeInfo['pubDate']);
        if ($date->isAfter(Carbon::parse('2019-02-01'))) {
            // After the initial TPT run, skip
            continue;
        }
    
        $e = Episode::firstOrNew(['guid' => $episodeInfo['guid']]);
        $e->fill($episodeInfo);
                
        $e->save();
      }
      \Log::info('Done!');
    }
}
