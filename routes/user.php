<?php

Route::post('user/searchphonenumber', 'UserController@searchphonenumber');
Route::post('user/phoneotpverify', 'UserController@phoneotpverify');
Route::group([ 'prefix'=>'user',
    'namespace'=>'User',
    'middleware'=> 'auth'

    ], function() {
        Route::get('dashboard', 'DashboardController@index');
        Route::get('addposting', 'DashboardController@addpostingview');
        Route::get('profile', 'UserController@index');
        
        Route::put('updateemail', 'UserController@updateemail');
        Route::patch('updateprofileinfo', 'UserController@updateprofileinfo');
        Route::post('uploadphoto', 'UserController@uploadphoto');
        Route::post('deletenotification', 'DashboardController@deletenotification');
        Route::post('seennotification', 'DashboardController@seennotification');
        Route::get('autolocation','DashboardController@autolocation');
        Route::get('saveadd/{id}','DashboardController@saveadd');
        //add sale
        Route::resource('bikesale', 'BikesaleController');
        Route::get('bikesales/edit/{id}', 'BikesaleController@edit');
         Route::get('bikesales/remove/{id}', 'BikesaleController@remove');
        Route::post('updatebikesales/{id}', 'BikesaleController@update');
        // quick-sale
         Route::get('quick-sale', 'BikesaleController@quicksale');
          Route::post('quickstore', 'BikesaleController@quickstore');
        //chart
        Route::get('chats','ChatController@index');
        Route::get('privatechat/{id}','ChatController@privatechat');
         Route::get('bikesalechat/{id}','ChatController@singlebikesalechat');
        Route::post('chattext','ChatController@chattext');
        Route::post('newtext','ChatController@newtext');

//membership

Route::get('addshop','ShopController@index');
Route::get('createshop','ShopController@create');
Route::post('createshop','ShopController@store');
Route::get('editbikeshop/{id}','ShopController@edit');
Route::patch('updatebikeshop/{id}','ShopController@update');


    }

);