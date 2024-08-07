<?php



Route::group([ 'prefix'=>'superadmin',
    'namespace'=>'Superadmin',
    'middleware'=> 'auth:superadmin'

    ], function() {
        Route::get('dashboard', 'DashboardController@index');
        Route::get('importcustomer', 'DashboardController@impotercustomer');
        Route::post('impotercustomer', 'DashboardController@customerimporter');
        Route::post('deletenotification', 'DashboardController@deletenotification');
        Route::post('seennotification', 'DashboardController@seennotification');
        Route::get('autolocation','DashboardController@autolocation');


  //package  Start
  Route::get('packagelist','PackageController@index');
   Route::post('createpackage','PackageController@store');
  Route::get('editpackage/{id}','PackageController@edit');
  Route::put('updatepackage/{id}','PackageController@update');
  Route::delete('deletepackage/{id}','PackageController@destroy');
  //package End


  //AccountPermission Start
  Route::get('permissionlist','PermissionController@index');
  Route::post('permissionsearch','PermissionController@permissionsearch');
  Route::get('createpermission','PermissionController@create');
  Route::post('createpermission','PermissionController@store');
  Route::get('editpermission/{id}','PermissionController@edit');
  Route::patch('updatepermission/{id}','PermissionController@update');
  Route::delete('deletepermission/{id}','PermissionController@destroy');
  //AccountPermission End

   //AccountRole Start
   Route::get('rolelist','RoleController@index');
   Route::get('rolesearch','RoleController@rolesearch');
    Route::post('createtrole','RoleController@store');
   Route::post('allpermissionlist','RoleController@allpermissionlist');
   Route::get('editaccountrole/{id}','RoleController@edit');
   Route::get('showrolepermission/{id}','RoleController@show');
   Route::put('updateaccountrole/{id}','RoleController@update');
   Route::delete('deleterole/{id}','RoleController@destroy');
   //AccountRole End

  
   //Accountcreate Start
   Route::get('adminlist','AdminController@index');
   Route::post('searchadmin','AdminController@adminsearch');
   Route::post('allrolename','AdminController@allrolename');
   Route::get('createadmin','AdminController@create');
   Route::post('createadmin','AdminController@store');
   Route::get('editadmin/{id}','AdminController@edit');
   Route::put('updateadmin/{id}','AdminController@update');
  Route::delete('deleteadmin/{id}','AdminController@destroy');
  Route::post('adminstatus', 'AdminController@setapproval'); 
   //Accountcreate  End


//smssettinglist Start 

Route::get('smssettinglist','SmsController@index');
Route::get('editsmssetting/{id}','SmsController@edit');
 Route::patch('updatesmssetting/{id}','SmsController@update');
Route::post('searchsmssetting', 'SmsController@searchmedicine');
Route::get('smstypelist', 'SmsController@smstype');
Route::get('createsmstype', 'SmsController@createsmstype');
Route::post('createsmstype', 'SmsController@smstypestore');
Route::get('editsmstype/{id}', 'SmsController@editsmstype');
Route::patch('updatesmstype/{id}', 'SmsController@smstypeupdate');

//smssettinglist  End

//salesms Start 

Route::get('salesmslist','BuysmsController@index');
Route::get('createsalesms','BuysmsController@create');
Route::post('createsalesms','BuysmsController@store');
Route::get('editsalesms/{id}','BuysmsController@edit');
Route::patch('updatesalesms/{id}','BuysmsController@update');
Route::post('searchsalesms', 'BuysmsController@searchmedicine');
Route::post('aprovesalesms/{id}', 'BuysmsController@setapproval');
Route::delete('deletesalesms/{id}','BuysmsController@destroy');
//smssettinglist  End

//payment Start 

Route::get('paymentlist','PaymentController@index');
Route::get('createpayment','PaymentController@create');
Route::post('createpayment','PaymentController@store');
Route::get('editpayment/{id}','PaymentController@edit');
 Route::patch('updatepayment/{id}','PaymentController@update');
 Route::delete('deletepayment/{id}','PaymentController@destroy');

//payment  End


//countryy
Route::get('countrylist','CountryController@index');
Route::post('searchcountry','CountryController@search');
Route::get('createcountry','CountryController@create');
Route::post('createcountry','CountryController@store');
Route::get('editcountry/{id}','CountryController@edit');
 Route::patch('updatecountry/{id}','CountryController@update');
 Route::delete('deletecountry/{id}','CountryController@destroy');
//Division Start 

 
 
 Route::get('divisionlist','DivisionController@index');
 Route::post('createdivision','DivisionController@store');
Route::get('editdivision/{id}','DivisionController@edit');
 Route::put('updatedivision/{id}','DivisionController@update');
 Route::delete('deletedivision/{id}','DivisionController@destroy');


//Division  End

//district Start 

Route::get('districtlist','DistrictController@index');
Route::post('searchdistrict','DistrictController@search');
Route::get('createdistrict','DistrictController@create');
Route::post('createdistrict','DistrictController@store');
Route::get('editdistrict/{id}','DistrictController@edit');
 Route::patch('updatedistrict/{id}','DistrictController@update');
 Route::delete('deletedistrict/{id}','DistrictController@destroy');


//district  End


//Thana Start 

Route::get('thanalist','ThanaController@index');
Route::post('createthana','ThanaController@store');
Route::get('editthana/{id}','ThanaController@edit');
 Route::patch('updatethana/{id}','ThanaController@update');
 Route::delete('deletethana/{id}','ThanaController@destroy');


//Thana  End
      
//area list

Route::get('arealist','AreaController@index');
Route::post('createarea','AreaController@store');
Route::get('editarea/{id}','AreaController@edit');
 Route::patch('updatearea/{id}','AreaController@update');
 Route::delete('deletearea/{id}','AreaController@destroy');


//bikebrandlist Start 

Route::get('homebrandadd/{id}/{type}','BikebrandController@homebrandadd');
Route::get('bikebrandlist','BikebrandController@index');
Route::post('createbikebrand','BikebrandController@store');
Route::get('editbikebrand/{id}','BikebrandController@edit');
 Route::patch('updatebikebrand/{id}','BikebrandController@update');
 Route::delete('deletebikebrand/{id}','BikebrandController@destroy');


//bikebrandlist  End


//bikemodellist Start 

Route::get('bikemodellist','BikemodelController@index');
Route::post('createbikemodel','BikemodelController@store');
Route::get('editbikemodel/{id}','BikemodelController@edit');
 Route::patch('updatebikemodel/{id}','BikemodelController@update');
 Route::delete('deletebikemodel/{id}','BikemodelController@destroy');


//bikemodel  End

//Sitemap Start 

 
 Route::get('addcountry','CommandController@addcountry');
 Route::get('adddivision','CommandController@adddivision');
 Route::get('adddistrict/{id}','CommandController@adddistrict');
 Route::get('dropalldata','CommandController@dropalldata');
 Route::get('commandlist','CommandController@index');
 Route::get('cacheclear','CommandController@cacheclear');
 Route::get('databasebackupclear','CommandController@databasebackupclear');
 Route::get('routerclear','CommandController@routerclear');
 Route::get('queueclear','CommandController@queueclear');
 Route::get('eventclear','CommandController@eventclear');
 Route::get('telescopeclear','CommandController@telescopeclear');
 Route::get('configclear','CommandController@configclear');
 Route::get('cache','CommandController@cacheall');
  Route::get('databasecacheclear','CommandController@databasecacheclear');
 Route::get('dbseeder','CommandController@dbseeder');
 Route::get('databckup','CommandController@databckup');
 Route::get('queuework','CommandController@queuework');
 Route::get('migratedata','CommandController@migratedata');
 Route::get('blogsitemap','SitemapController@blogsitemapgenerate');
 Route::get('allsitemap','SitemapController@allsitemap');


//Sitemap  End

//Contact Start 


// Route::get('emaillist','ContactController@index');
// Route::get('createemail','ContactController@create');
// Route::post('fdgfcreateblog','ContactController@store');
// Route::get('replymail/{id}','ContactController@edit');
// Route::post('replyemail','ContactController@store');


//Contact  End



//Customer Start
Route::get('customerlist','CustomerController@index');
Route::get('pendingcustomerlist','CustomerController@pendingcustomer');
Route::get('createcustomer','CustomerController@create');
Route::post('createcustomer','CustomerController@store');
Route::get('editcustomer/{id}','CustomerController@edit');
Route::get('customerprofile/{id}','CustomerController@show');
 Route::patch('updatecustomer/{id}','CustomerController@update');
 Route::delete('deletecustomer/{id}','CustomerController@destroy');
Route::post('customerstatus', 'CustomerController@setapproval');
Route::post('searchcustomer', 'CustomerController@searchmedicine');
Route::get('findbill/{id}','CustomerController@findbill');
Route::post('updatebillcustomer','CustomerController@updatebillcustomer');
Route::get('inactivecustomer','CustomerController@inactivecustomer');
Route::get('inactivecustomerfind','CustomerController@findinactivecustomer');
Route::get('restorecustomer/{id}','CustomerController@restorecustomer');
Route::post('sendsmscustomer','CustomerController@sendsmscustomer');

//Customer  End

    }

);