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

Route::group(['namespace' => 'Scraper'], function () {
    Route::get('/scrape-endpoint', 'ScrapeController@scrape');
    Route::get('/get-data', 'ScrapeController@index');
    Route::get('/skills', 'ScrapeController@getSkills');
    Route::get('/locations', 'ScrapeController@getLocations');
    Route::get('/jobs-by-location', 'ScrapeController@getJobsByLocation');
    Route::get('/jobs-by-skill', 'ScrapeController@getJobsBySkill');
});
Route::group(['namespace' => 'Frontend'], function () {
	Route::get('/', 'HomeController@index');
});
