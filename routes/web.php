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
 

Route::get('/admin', 'AdminController@index');
Route::get('/admin', 'AdminController@index')->name('users.index');
Route::POST('/admin/elimi/{user}', 'AdminController@eliminar')->name('user.delete');
Route::get('/admin/valid/{user}', 'AdminController@validar')->name('user.valid');;
//Route::post('', 'AdminController@eliminar');


//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();