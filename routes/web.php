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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('unsubscribe/{uuid}', 'SubscriberController@unSubscribe')->name('subscribers.unsubscribe');
Route::resource('subscribers', 'SubscriberController');

Route::name('admin.')->group(function () {
    Route::resource('admin/subscribers', 'Admin\SubscriberController');
});
//A page
Route::get('materials/{uuid}', 'MaterialController@index')->name('materials.index');

Route::resource('materials', 'MaterialController')->except('index');


