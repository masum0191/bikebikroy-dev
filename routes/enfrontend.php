<?php


Route::get('/', 'HomeController@index');
Route::get('searchbike', 'HomeController@findbike');

Route::get('/contact-us', 'HomeController@contactus');
Route::get('/disclaimer', 'HomeController@disclaimer');
Route::get('/privacy-policy', 'HomeController@privacypolicy');
Route::get('/advertisement-on-sohibd', 'HomeController@advertisement');
Route::get('/terms-and-conditions', 'HomeController@termsandcondition');

//all bikeadd
Route::get('bikesalesearch', 'BikesController@bikesalesearch');
 Route::get('bikesale', 'BikesController@allbikeindex');
 Route::get('price/{type}', 'BikesController@type');
 Route::get('bikesale/{id}', 'BikesController@bikesaleshow');
 Route::get('bikebrand/{id}', 'BikesController@bikesalebybrnad');



 //location wise bike
 Route::get('bikesale-divison/{id}', 'BikesController@bikesalebydivison');


  //location wise bike
  Route::get('all-brand', 'HomeController@allbrand');

  //bikeshop
  Route::get('bikeshop/{id}', 'ShopController@show');