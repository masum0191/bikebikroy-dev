<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LanguageController;
include __DIR__ . '/enfrontend.php';
include __DIR__ . '/bnfrontend.php';
include __DIR__ . '/user.php';
include __DIR__ . '/admin.php';
include __DIR__ . '/superadmin.php';
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
Auth::routes();
Route::get('/cc', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return '<h1>Cache, Route, View cache cleared.</h1>';
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// quick-ads
Route::get('/quick-ads', [App\Http\Controllers\HomeController::class, 'quickads'])->name('quickads');
Route::post('/quickadstore', [App\Http\Controllers\HomeController::class, 'quickadstore'])->name('quickadstore');
Route::get('/info/{slug}', [App\Http\Controllers\HomeController::class, 'procategory']);
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Route::group(['prefix'=> 'filemanager', 'middleware'=> ['auth:superadmin,admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
}

);

Route::get('/login', 'Auth\LoginController@showLoginuserForm');
Route::post('/login', 'Auth\LoginController@UserLogin');
Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

// Route::post('login', 'Auth\LoginController@UserLogin');
// Route::get('login', 'Auth\LoginController@customloginForm');
Route::get('register', 'Auth\LoginController@customregisterForm');
Route::post('userregister', 'Auth\RegisterController@create');
Route::get('otpverify/{id}', 'Auth\LoginController@showOTPveirfyForm');
Route::post('userotpverify', 'Auth\LoginController@userotpverify');


//gobal location
Route::get('/location', 'OnchangeController@index');
Route::get('getdistrict/{id}', 'OnchangeController@district');
Route::get('getthana/{id}', 'OnchangeController@thana');
Route::get('getarea/{id}', 'OnchangeController@area');
Route::get('gettpackageinfo/{id}', 'OnchangeController@package');
Route::get('getbikebrand/{id}', 'OnchangeController@getbikebrand');
Route::get('getbikebrandsingle/{id}', 'OnchangeController@getbikebrandsingle');
Route::get('getcustomerinfo', 'OnchangeController@customerinfo');
Route::get('gettsmstypeinfo/{id}', 'OnchangeController@smstype');
Route::get('getpaymentmessage/{id}', 'OnchangeController@payment');
Route::get('getadminpaybyinfo/{id}', 'OnchangeController@adminpaybyinfo');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/admin/verificationlink/{id}', 'Auth\LoginController@showEmailveirfyForm');
Route::get('/admin/verificationphone/{id}', 'Auth\LoginController@showOTPveirfyForm');
Route::post('/admin/adminverifyphone', 'Auth\LoginController@adminverifyphone');
Route::post('/admin/adminverifyemail', 'Auth\LoginController@adminverifyemail');

Route::get('/login/superadmin', 'Auth\LoginController@showSuperadminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/superadmin', 'Auth\LoginController@superadminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');