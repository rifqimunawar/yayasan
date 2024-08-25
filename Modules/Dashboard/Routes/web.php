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
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
  Route::get('/dashboard/create', 'DashboardController@create')->name('dashboard.create');
  Route::post('/dashboard', 'DashboardController@store')->name('dashboard.store');
  Route::get('/dashboard/{id}/edit', 'DashboardController@edit')->name('dashboard.edit');
  Route::post('/dashboard/{id}/update', 'DashboardController@update')->name('dashboard.update');
  Route::delete('/dashboard/{id}', 'DashboardController@destroy')->name('dashboard.destroy');
});
