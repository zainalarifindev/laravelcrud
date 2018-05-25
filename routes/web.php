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
// Route::get('/', function () {
//     return view('index');
// });


Route::get('/','FrontPageController@index');
Route::get('/show/{id}', 'FrontPageController@show');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// // Route::middleware(['auth'])->

// Route::get('/Kategori','KategoriController@index');
// Route::get('/Kategori/create','KategoriController@create');
// Route::post('/Kategori','KategoriController@store');
// Route::get('/Kategori/{id}','KategoriController@show');
// Route::get('/Kategori/{id}/edit','KategoriController@edit');
// Route::put('/Kategori/{id}','KategoriController@update');
// Route::delete('/Kategori/{id}','KategoriController@destroy');

// //user

// Route::get('/User','UserController@index');
// Route::get('/User/create','UserController@create');
// Route::post('/User','UserController@store');
// Route::get('/User/{id}','UserController@show');
// Route::get('/User/{id}/edit','UserController@edit');
// Route::put('/User/{id}','UserController@update');
// Route::delete('/User/{id}','UserController@destroy');

// // aduan//

// Route:: resource('/Aduan','AduanController');

Auth::routes();
Route::middleware(['auth'])->group(function () {
	Route::resource('/Kategori','KategoriController')->middleware('check-permission:user|admin|superadmin');;
	Route::resource('/User','UserController')->middleware('check-permission:admin|superadmin');	
	Route::resource('/Aduan','AduanController');	
});
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/komentar','KomentarController@store');