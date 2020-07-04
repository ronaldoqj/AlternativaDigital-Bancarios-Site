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

// Portal Bancários
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/editais', 'EditaisController@index')->name('editais');
Route::get('/acordos-e-convencoes', 'AcordosEConvencoesController@index')->name('acordos-e-convencoes');
Route::get('/meu-sindicato', 'MeuSindicatoController@index')->name('meu-sindicato');
Route::get('/noticia', 'NoticiasController@withImage')->name('noticias-with-image');
Route::get('/noticia-destaque', 'NoticiasController@withImageDestaque')->name('noticias-with-image-destaque');
Route::get('/noticia-video', 'NoticiasController@withVideo')->name('noticias-with-video');
Route::get('/noticia-audio', 'NoticiasController@withAudio')->name('noticias-with-audio');
Route::get('/noticia-texto', 'NoticiasController@withOnlyText')->name('noticias-only-text');

// Sindicatos
Route::prefix('sindicato')->namespace('Sindicatos')->group(function () {
    Route::get('/editais', 'EditaisController@index')->name('sindicato-editais');    
    Route::get('/contato', 'ContatoController@index')->name('sindicato-contato');    
    Route::get('/sindicalize-se', 'SindicalizeSeController@index')->name('sindicato-sindicalize-se');    
});
Route::get('/sindicato', 'Sindicatos\SindicatoController@index')->name('sindicato-sindicato');
Route::get('/o-sindicato', 'Sindicatos\OSindicatoController@index')->name('sindicato-o-sindicato');
Route::get('/servicos', 'Sindicatos\ServicosController@index')->name('sindicato-servicos');

Auth::routes();

Route::prefix('adm')->namespace('Adm')->group(function ()
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home-home');
});
