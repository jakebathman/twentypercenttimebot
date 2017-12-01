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
    $data = [];
    $episodes = App\Episode::all();

    // Format episodes for graph
    
    return view('welcome', ['episodes', $data]);
});

Route::get('graph', 'GraphController@index');

Route::view('bot', 'bot');
