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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

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
