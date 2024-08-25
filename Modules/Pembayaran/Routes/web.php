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

// Route::prefix('pembayaran')->group(function() {
//     Route::get('/', 'PembayaranController@index');
// });


Route::middleware(['auth', 'roles:1'])->group(function () {
  Route::get('/pembayaran', 'PembayaranController@index')->name('pembayaran.index');
  Route::get('/pembayaran/create', 'PembayaranController@create')->name('pembayaran.create');
  Route::post('/pembayaran', 'PembayaranController@store')->name('pembayaran.store');
  Route::get('/pembayaran/{id}/edit', 'PembayaranController@edit')->name('pembayaran.edit');
  Route::get('/pembayaran/{id}/show', 'PembayaranController@show')->name('pembayaran.show');
  Route::post('/pembayaran/{id}/update', 'PembayaranController@update')->name('pembayaran.update');
  Route::delete('/pembayaran/{id}', 'PembayaranController@destroy')->name('pembayaran.destroy');

  Route::get('/pembayaran/{id}/{siswa_id}/make', 'PembayaranController@make')->name('pembayaran.make');
  Route::post('/pembayaran/{id}/save', 'PembayaranController@savePembayaran')->name('pembayaran.save');
  Route::get('/pembayaran/{id}/invoice', 'PembayaranController@invoice')->name('pembayaran.invoice');

  // Route::get('/tagihan/lunas/{siswaId}/{tagihanId}', 'PembayaranController@lunas');

  // Route::get('/tagihan/lunas/{siswaId}/{tagihanId}', 'PembayaranController@lunas');

});