<?php

use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Modules\MasterData\Http\Controllers\SiswaController;

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

// Route::prefix('masterdata')->group(function() {
//     Route::get('/', 'MasterDataController@index');
// });
Route::middleware(['auth', 'roles:1'])->group(function () {
  Route::get('/siswa', 'SiswaController@index')->name('siswa.index');
  Route::get('/siswa/create', 'SiswaController@create')->name('siswa.create');
  Route::post('/siswa', 'SiswaController@store')->name('siswa.store');
  Route::get('/siswa/{id}/edit', 'SiswaController@edit')->name('siswa.edit');
  Route::post('/siswa/{id}/update', 'SiswaController@update')->name('siswa.update');
  Route::delete('/siswa/{id}', 'SiswaController@destroy')->name('siswa.destroy');
  Route::get('/export-siswa', function () {
    return Excel::download(new SiswaExport, 'siswa.xlsx');
  })->name('siswa.export');
  Route::get('/siswa/createImport', 'SiswaController@createImport')->name('siswa.createImport');
  Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');


  Route::get('/tahun_masuk', 'TahunMasukController@index')->name('tahun_masuk.index');
  Route::get('/tahun_masuk/create', 'TahunMasukController@create')->name('tahun_masuk.create');
  Route::post('/tahun_masuk', 'TahunMasukController@store')->name('tahun_masuk.store');
  Route::get('/tahun_masuk/{id}/edit', 'TahunMasukController@edit')->name('tahun_masuk.edit');
  Route::post('/tahun_masuk/{id}/update', 'TahunMasukController@update')->name('tahun_masuk.update');
  Route::delete('/tahun_masuk/{id}', 'TahunMasukController@destroy')->name('tahun_masuk.destroy');

  Route::get('/tagihan', 'TagihanController@index')->name('tagihan.index');
  Route::get('/tagihan/create', 'TagihanController@create')->name('tagihan.create');
  Route::post('/tagihan', 'TagihanController@store')->name('tagihan.store');
  Route::get('/tagihan/{id}/edit', 'TagihanController@edit')->name('tagihan.edit');
  Route::post('/tagihan/{id}/update', 'TagihanController@update')->name('tagihan.update');
  Route::delete('/tagihan/{id}', 'TagihanController@destroy')->name('tagihan.destroy');

  // menghububgkan tagihan dengan siswa
  Route::post('/tagihan/{tagihanId}/target/', 'TagihanController@hubungkanTagihanDenganTarget');
  Route::get('/tagihan/{id}', 'TagihanController@tagihan')->name('tagihan.setting');


});
