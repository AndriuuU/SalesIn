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
 

Auth::routes(['verify' => true]);
Route::resource('/admin', 'AdminController');

Route::get('/admin/{$user}', 'AdminController@verify');
Route::get('/admin', 'AdminController@index');
Route::get('/admin', 'AdminController@index')->name('users.index');
Route::POST('/admin/elimi/{user}', 'AdminController@eliminar')->name('user.delete');
Route::get('/admin/valid/{user}', 'AdminController@validar')->name('user.valid');;
Route::get('/edit/', [ 'as' => 'users.edit', 'uses' => 'AdminController@editar']);
// Route::get('/admin/edit/{user}', 'AdminController@editar')->name('user.edit');
//Route::post('', 'AdminController@eliminar');

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

// Noticias

Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
Route::post('/articles/create/add', 'ArticlesController@add')->name('articles.add');

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();