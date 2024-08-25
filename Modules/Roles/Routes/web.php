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

Route::middleware(['auth', 'roles:1'])->group(function () {
  Route::get('/roles', 'RolesController@index')->name('roles.index');
  Route::get('/roles/create', 'RolesController@create')->name('roles.create');
  Route::post('/roles', 'RolesController@store')->name('roles.store');
  Route::get('/roles/{id}/edit', 'RolesController@edit')->name('roles.edit');
  Route::post('/roles/{id}/update', 'RolesController@update')->name('roles.update');
  Route::delete('/roles/{id}', 'RolesController@destroy')->name('roles.destroy');

  Route::get('/user', 'UserController@index')->name('user.index');
  Route::get('/user/create', 'UserController@create')->name('user.create');
  Route::post('/user', 'UserController@store')->name('user.store');
  Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
  Route::post('/user/{id}/update', 'UserController@update')->name('user.update');
  Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy');
});
