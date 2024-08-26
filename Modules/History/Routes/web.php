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

// Route::prefix('history')->group(function() {
//     Route::get('/', 'HistoryController@index');
// });

Route::middleware(['auth', 'roles:1'])->group(function () {
  Route::get('/history', 'HistoryController@index')->name('history.index');
  Route::get('/history/create', 'HistoryController@create')->name('history.create');
  Route::post('/history', 'HistoryController@store')->name('history.store');
  Route::get('/history/{id}/edit', 'HistoryController@edit')->name('history.edit');
  Route::post('/history/{id}/update', 'HistoryController@update')->name('history.update');
  Route::delete('/history/{id}', 'HistoryController@destroy')->name('history.destroy');
});