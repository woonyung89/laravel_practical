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
// //Division
// Route::get('/division/create', 'DivisionController@create')->name('division.create');
// Route::post('/division/store', 'DivisionController@store')->name('division.store');
// Route::get('/division', 'DivisionController@index')->name('division.index');
// Route::get('/division/edit/{id}', 'DivisionController@edit')->name('division.edit');
// Route::post('/division/update/{id}', 'DivisionController@update')->name('division.update');
// Route::get('/division/show/{id}', 'DivisionController@show')->name('division.show');
// //Member
// Route::get('/member/create', 'MemberController@create')->name('member.create');
// Route::post('/member/store', 'MemberController@store')->name('member.store');
// Route::get('/member/show/{id}', 'MemberController@show')->name('member.show');
// Route::get('/member', 'MemberController@index')->name('member.index');
// Route::get('/member/edit/{id}', 'MemberController@edit')->name('member.edit');
// Route::post('/member/update/{id}', 'MemberController@update')->name('member.update');

//GroupController
Route::resource('/division','DivisionController',['except'=>['destroy',]]);
Route::resource('/member', 'MemberController',['except'=>['destroy',]]);
Route::resource('/group','GroupController',['except'=>['destroy',]]);
Route::get('/member/group/{id}', 'MemberController@group')->name('member.group');
Route::get('/member/group', 'MemberController@assign')->name('member.assign');

Route::get('/member/{member}/upload', 'MemberController@upload')->name('member.upload');
Route::post('/member/{member}/save-upload', 'MemberController@saveUpload')->name('member.saveUpload');
// Route::get('/member/show/{id}', 'MemberController@show')->name('member.show');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
