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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/editais', 'EditaisController@index')->name('editais');
Route::get('/acordos-e-convencoes', 'AcordosEConvencoesController@index')->name('acordos-e-convencoes');
Route::get('/noticia', 'NoticiasController@withImage')->name('noticias-with-image');
Route::get('/noticia-video', 'NoticiasController@withVideo')->name('noticias-with-video');
Route::get('/noticia-audio', 'NoticiasController@withAudio')->name('noticias-with-audio');
Route::get('/noticia-texto', 'NoticiasController@withOnlyText')->name('noticias-only-text');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
