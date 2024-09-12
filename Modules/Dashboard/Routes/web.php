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

Route::middleware(['auth', 'roles:1,2'])->group(function () {
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
  Route::get('/dashboard/get_ajax_statistik', 'DashboardController@get_ajax_statistik')->name('dashboard.get_ajax_statistik');
  Route::get('/dashboard/get_ajax_statistik_seminggu', 'DashboardController@get_ajax_statistik_seminggu')->name('dashboard.get_ajax_statistik_seminggu');
  Route::get('/dashboard/get_ajax_statistik_sebulan', 'DashboardController@get_ajax_statistik_sebulan')->name('dashboard.get_ajax_statistik_sebulan');
  Route::get('/dashboard/get_ajax_statistik_3sebulan', 'DashboardController@get_ajax_statistik_3sebulan')->name('dashboard.get_ajax_statistik_3sebulan');
  Route::get('/dashboard/get_ajax_statistik_6sebulan', 'DashboardController@get_ajax_statistik_6sebulan')->name('dashboard.get_ajax_statistik_6sebulan');
  Route::get('/dashboard/get_ajax_statistik_setahun', 'DashboardController@get_ajax_statistik_setahun')->name('dashboard.get_ajax_statistik_setahun');
});
