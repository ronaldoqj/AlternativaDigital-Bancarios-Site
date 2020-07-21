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

// ADM
Route::prefix('adm')->namespace('Adm')->group(function ()
{
    // Route::fallback(function () {
    //     // rota quando não encontrou no ADM
    // });

    Route::get('/', 'HomeController@index')->name('adm-home');
    Route::get('/noticias', 'NoticiaController@index')->name('adm-noticias');
    
    Route::get('/noticias/cadastro', 'NoticiaController@cadastro')->name('adm-noticias-cadastro');
    Route::post('/noticias/cadastro', 'NoticiaController@cadastrarNoticia')->name('adm-noticias-cadastrar');
    Route::get('/noticias/edicao/{id?}', 'NoticiaController@edicao')->name('adm-noticias-edicao');
    Route::post('/noticias/edicao', 'NoticiaController@editarNoticia')->name('adm-noticias-editar');

    // Formulários de cadastros do ADM
    // Route::prefix('formularios')->namespace('Formularios')->group(function ()
    // {
    //     Route::match(['get', 'post'], '/noticia', 'NoticiaController@index')->name('adm-formularios-noticia');
    //     Route::match(['get', 'post'], '/noticia/castastrar', 'NoticiaController@cadastrarNoticia')->name('adm-formularios-noticia-cadastrar');
    // });
});



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

// Route::fallback(function () {
//     // rota quando não encontrou no site
// });

Auth::routes();
