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

Route::resource('/noticias', 'ArticlesController');
Route::resource('articles','ArticlesController');
Route::get('/noticias', 'ArticlesController@index')->name('articles.index');
Route::POST('/noticias/elimi/{article}', 'ArticlesController@eliminar')->name('articles.delete');
// Route::get('/edit/', [ 'as' => 'articles.edit', 'uses' => 'ArticlesController@editar']);
Route::get('/noticias/edit/{article}', 'ArticlesController@editar')->name('articles.edit');
Route::post('/noticias/edit/{article}/confir', 'ArticlesController@update')->name('articles.update');

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

// Noticias

Route::get('/noticias', 'ArticlesController@index');
Route::post('/noticias/create', 'ArticlesController@create')->name('articles.create');
Route::post('/noticias/create/add', 'ArticlesController@store')->name('articles.add');

//Route::get('/home', 'HomeController@index')->name('home');

//ofertas
Route::get('/ofertas', 'OffersController@index')->name('offers.index');
Route::get('/ofertas/aplicar/{offer}', 'OffersController@aplicar')->name('offers.apli');
Route::get('pdf', 'InformesController@download')->name('pdf');



Auth::routes();