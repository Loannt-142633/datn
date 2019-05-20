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
Route::get('/', 'NewController@index')->name('new');
Route::resource('new', 'NewController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('member', 'MemberController')->middleware('auth');
Route::resource('comment', 'CommentController')->middleware('auth');
Route::get('/chart', function () {
    return view('gantt');
})->name('chart')->middleware('auth');