<?php



Route::group([ 'prefix'=>'admin',
    'namespace'=>'Admin',
    'middleware'=> 'auth:admin'

    ], function() {
        Route::get('dashboard', 'DashboardController@index');
        Route::get('addposting', 'DashboardController@addpostingview');
        Route::get('profile', 'UserController@index');
        Route::post('searchphonenumber', 'UserController@searchphonenumber');
        Route::put('updateemail', 'UserController@updateemail');
        Route::patch('updateprofileinfo', 'UserController@updateprofileinfo');
        Route::post('deletenotification', 'DashboardController@deletenotification');
        Route::post('seennotification', 'DashboardController@seennotification');
        Route::get('autolocation','DashboardController@autolocation');
        //add sale
        //bikesale start
        Route::get('showbikesalepost/{id}','BikesaleController@show');
        Route::get('editbikesale/{id}','BikesaleController@edit');
        Route::get('bikesalelist','BikesaleController@index');
        Route::get('recentsports','BikesaleController@recentsports');
        Route::get('scooters','BikesaleController@scooters');
        Route::get('archive-list','BikesaleController@archivelist');
        Route::get('createbikesale','BikesaleController@create');
        Route::post('createbikesale','BikesaleController@store');
        Route::get('editbikesales','BikesaleController@edits');
        Route::get('updatebikesales','BikesaleController@updatebikesales');
        //Route::patch('updatebikesale/{id}','BikesaleController@update');
        Route::post('updatebikesale/{id}', 'BikesaleController@update');
        Route::delete('deletebikesale/{id}','BikesaleController@destroy');
        Route::get('archive/{id}','BikesaleController@archive');
        Route::get('restore/{id}','BikesaleController@restore');
        Route::get('home-active/{id}/{section}','BikesaleController@home_active');
        Route::get('home-inactive/{id}','BikesaleController@home_inactive');
        //bikesale end
        Route::get('allads/{id}/{section}','BikesaleController@allads');
        //bikemodel and 
        Route::post('createbikemodel','BikesaleController@store');
        Route::get('editbikesale/{id}','BikesaleController@edit');
        



Route::get('bikeshoplist','ShopController@index');
Route::get('editbikeshop/{id}','ShopController@edit');
Route::get('bikeshopdetails/{id}','ShopController@show');
Route::patch('updatebikeshop/{id}','ShopController@update');



//userlist start
        Route::get('userlist','UserController@index');
        Route::get('createuser','UserController@create');
        Route::post('createuser','UserController@store');
        Route::get('edituser/{id}','UserController@edit');
        Route::get('updateuser','UserController@updatebikesales');
        Route::patch('updateuser/{id}','UserController@update');
        Route::delete('deleteuser/{id}','UserController@destroy');
// user base ads create
        Route::get('user/ads/{id}','UserController@adcreate');



    }

);