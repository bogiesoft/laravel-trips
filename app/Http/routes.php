<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', ['middleware' => 'guest', function () {
    return view('welcome');
}]);
  
Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/addDestinations', 'HomeController@showAddDestination');
Route::post('/addDestination', 'HomeController@addDestination');

Route::get('/addTrips', 'HomeController@showAddTrips');
Route::post('/addTripPackage', 'HomeController@addTripPackage');

Route::get('/addDomains', 'HomeController@showAddDomains');
Route::post('/addNewDomain', 'HomeController@addNewDomain');


Route::get('/getDomains', 'HomeController@getDomains');
Route::get('/getDestinations', 'HomeController@getDestinations');
Route::get('/getTrips', 'HomeController@getTrips');


Route::get('/changeLanguage', 'HomeController@changeLanguage');