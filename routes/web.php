<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

 Route::group(['prefix' => 'arsip'], function() {
    Route::get('/', 'ArsipController@index')->name('arsip.index');
    Route::get('data', 'ArsipController@ajaxTable');
    Route::post('input', 'ArsipController@store');
    Route::post('edit/{id}', 'ArsipController@edit');
    Route::post('delete/{id}', 'ArsipController@delete');

    Route::get('/export', 'ArsipController@export')->name('export');
});

Route::group(['prefix' => 'list'], function() {
     Route::get('/bentuk', 'ListController@listBentuk');
     Route::get('/keterangan', 'ListController@listKeterangan');
     Route::get('/tingkat', 'ListController@listTingkat');
   });
Route::resource('indeks', 'IndeksController')->except(['create','edit']);
Route::resource('tingkat_perkembangans', 'TingkatPerkembanganController')->except(['create','edit']);
Route::resource('bentuks', 'BentukController')->except(['create','edit']);
Route::resource('keterangans', 'KeteranganController')->except(['create','edit']);

