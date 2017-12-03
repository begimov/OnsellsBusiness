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

// Index landing
Route::group(['middleware' => 'guest', 'namespace' => 'Welcome'], function () {
    Route::get('/', 'WelcomeController@index')->name('welcome.index');
    Route::get('/why', 'WelcomeController@why')->name('welcome.why');
    Route::get('/features', 'WelcomeController@features')->name('welcome.features');
    Route::get('/control', 'WelcomeController@control')->name('welcome.control');
    Route::get('/consult', 'WelcomeController@consult')->name('welcome.consult');
    Route::post('/consult', 'WelcomeController@requestConsult')->name('welcome.consult.post');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Promotions
Route::resource('promotion', 'Promotions\PromotionController');

// Moderator panel
Route::group(['middleware' => ['auth', 'role:moderator']], function () {
    Route::get('/moderation', 'Admin\ModerationController@index')->name('moderation.index');
    Route::get('/moderation/{promotion}/approve', 'Admin\ModerationController@approve')->name('moderation.approve');
    Route::delete('/moderation/{promotion}', 'Promotions\PromotionController@destroy')->name('moderation.delete');
});

// Manager panel
Route::group(['middleware' => ['auth', 'role:moderator']], function () {
    Route::get('/management', 'Admin\ManagementController@index')->name('management.index');
    Route::get('/management/applications', 'Admin\ManagementController@applications')->name('management.applications');
});

// Payments, balance and finances
Route::group(['middleware' => 'auth', 'prefix' => 'balance', 'namespace' => 'Balance'], function () {
    Route::get('/', 'BalanceController@index')->name('payments.index');
});

// WebAPI
Route::group(['middleware' => 'auth', 'prefix' => 'webapi', 'namespace' => 'Webapi'], function () {
  Route::post('/checkout', 'CheckoutController@checkout')->name('checkout');
});

// External redirects
Route::get('/redirect/{promotion}', function (App\Models\Promotions\Promotion $promotion) {
  $url = $promotion->website;
  if ((substr($url, 0, 7) !== 'http://') && (substr($url, 0, 8) !== 'https://')) {
    return redirect()->to("http://{$url}");
  }
  return redirect()->to($url);
})->name('redirect.external');
