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
//Routes for the getting the whole web pages on view root folder
Route::get('/', 'PagesController@getHome');
Route::get('/track', 'PagesController@getTrackPage');
Route::get('/service', 'PagesController@getServicePage');
Route::get('/about', 'PagesController@getAboutPage');
Route::get('/contact', 'PagesController@getContactPage');


//Routes for All Registrations and login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home'); 

//Routs for the Parcel Functionalities
Route::get('/parcel','ParcelController@get');
Route::post('/addparcel','ParcelController@addParcel');
Route::get('/edit/{id}','ParcelController@edit');
Route::post('/editparcel/{id}','ParcelController@editParcel');
Route::get('/delete/{id}','ParcelController@delete');
Route::get('/view/{id}','ParcelController@view');
Route::post('/search','ParcelController@search');