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
    Route::post('input', 'ArsipController@store');
    Route::post('edit/{id}', 'ArsipController@edit');
    Route::post('delete/{id}/{mhs}', 'ArsipController@delete');
});

Route::resource('indeks', 'IndeksController')->except(['create','edit']);
Route::resource('tingkat_perkembangans', 'TingkatPerkembanganController')->except(['create','edit']);
Route::resource('bentuks', 'BentukController')->except(['create','edit']);
Route::resource('keterangans', 'KeteranganController')->except(['create','edit']);

