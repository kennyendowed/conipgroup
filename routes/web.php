<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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



//Clear Cache facade value:
Route::get('/cache', function() {
  $exitCode = Artisan::call('cache:clear');
  return '<h1>Cache facade value cleared</h1>';
});

//Clear config facade value:
Route::get('/config', function() {
  $exitCode = Artisan::call('config:clear');
  return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
  $exitCode = Artisan::call('optimize');
  return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/ro', function() {
  $exitCode = Artisan::call('route:cache');
  return '<h1>Routes cached</h1>';
});


//Clear View cache:
Route::get('/view', function() {
  $exitCode = Artisan::call('view:clear');
  return '<h1>View cache cleared</h1>';
});



Route::get('/', 'HomeController@index');
Route::get('/Authorization/{id?}', 'Auth\RegisterController@Authorization')->name('Authorization');
Route::post('/createAccount','\App\Http\Controllers\Auth\RegisterController@customRegistration')->name('createAccount');

Route::get('/about', 'HomeController@About')->name('about');


Auth::routes();

Route::get('email-verify',['as'=>'email-verify','uses'=>'HomeController@getEmailVerification']);
Route::post('email-verify-submit',['as'=>'email-verify-submit','uses'=>'HomeController@emailVerifySubmit']);
Route::post('resend-verify-submit',['as'=>'resend-verify-submit','uses'=>'HomeController@resendEmail']);



Route::middleware(['auth','verifyUser'])->group(function(){
  Route::get('home', ['as'=>'home','uses'=>'HomeController@index']);
  Route::post('/change_password','HomeController@change_password')->name('change_password');
  Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


//staff || administrator AUTH
Route::group(['middleware'=>'check-permission:administrator|staff'], function () {
  //GET

});

Route::group(['middleware'=>'check-permission:administrator'], function () {
  //GET


});

Route::group(['middleware'=>'check-permission:administrator|staff|customer'], function () {

});

Route::group(['middleware'=>'check-permission:customer'], function () {
  Route::get('shop-cart', ['as'=>'shop-cart','uses'=>'OrderController@cart']);
});
Route::post('/checkout','OrderController@checkout')->name('checkout');
Route::post('/checkOUT','OrderController@checkOUT')->name('checkOUT');
Route::patch('update-cart', 'OrderController@update');
  Route::delete('remove-from-cart', 'OrderController@remove');
  Route::post('/Payment', 'OrderController@createPackage')->name('buy_ticket');


});
Route::get('/{id?}', 'HomeController@show')->name('details');
Route::get('/{id?}/order', 'HomeController@order')->name('Order');
