<?php

use App\Http\Middleware\CheckSyndicate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/mail', function () {
    return view('mail');
});

// ADM
Route::prefix('adm')->namespace('Adm')->group(function ()
{
    // Route::fallback(function () {
    //     // rota quando não encontrou no ADM
    // });

    Route::get('/', 'HomeController@index')->name('adm-home');
    Route::get('/dashboard/{id?}/{fetrafi?}', 'DashboardController@index')->name('adm-dashboard');
    
    Route::middleware([VerifyCurrentEntitySelected::class])->group(function ()
    {
        Route::match(['get', 'post'], '/noticias', 'NoticiaController@index')->name('adm-noticias');
        Route::get('/noticias/cadastro', 'NoticiaController@cadastro')->name('adm-noticias-cadastro');
        Route::post('/noticias/cadastro', 'NoticiaController@cadastrarNoticia')->name('adm-noticias-cadastrar');
        Route::get('/noticias/edicao/{id?}', 'NoticiaController@edicao')->name('adm-noticias-edicao');
        Route::post('/noticias/edicao', 'NoticiaController@editarNoticia')->name('adm-noticias-editar');
        Route::post('/noticias/delete', 'NoticiaController@deletarNoticia')->name('adm-noticias-deletar');
        
        Route::get('/entidades-parceiras', 'EntidadeParceiraController@index')->name('adm-entidades-parceiras');
        Route::get('/entidades-parceiras/cadastro', 'EntidadeParceiraController@cadastro')->name('adm-entidades-parceiras-cadastro');
        Route::post('/entidades-parceiras/cadastro', 'EntidadeParceiraController@cadastrar')->name('adm-entidades-parceiras-cadastrar');
        Route::get('/entidades-parceiras/edicao/{id?}', 'EntidadeParceiraController@edicao')->name('adm-entidades-parceiras-edicao');
        Route::post('/entidades-parceiras/edicao', 'EntidadeParceiraController@editar')->name('adm-entidades-parceiras-editar');
        Route::post('/entidades-parceiras/delete', 'EntidadeParceiraController@deletar')->name('adm-entidades-parceiras-deletar');
        
        Route::get('/campanhas', 'CampanhaController@index')->name('adm-campanhas');
        Route::get('/campanhas/cadastro', 'CampanhaController@cadastro')->name('adm-campanhas-cadastro');
        Route::post('/campanhas/cadastro', 'CampanhaController@cadastrar')->name('adm-campanhas-cadastrar');
        Route::get('/campanhas/edicao/{id?}', 'CampanhaController@edicao')->name('adm-campanhas-edicao');
        Route::post('/campanhas/edicao', 'CampanhaController@editar')->name('adm-campanhas-editar');
        Route::post('/campanhas/delete', 'CampanhaController@deletar')->name('adm-campanhas-deletar');
        
        Route::get('/acordos-e-convencoes', 'AcordoEConvencaoController@index')->name('adm-acordos-e-convencoes');
        Route::get('/acordos-e-convencoes/cadastro', 'AcordoEConvencaoController@cadastro')->name('adm-acordos-e-convencoes-cadastro');
        Route::post('/acordos-e-convencoes/cadastro', 'AcordoEConvencaoController@cadastrar')->name('adm-acordos-e-convencoes-cadastrar');
        Route::get('/acordos-e-convencoes/edicao/{id?}', 'AcordoEConvencaoController@edicao')->name('adm-acordos-e-convencoes-edicao');
        Route::post('/acordos-e-convencoes/edicao', 'AcordoEConvencaoController@editar')->name('adm-acordos-e-convencoes-editar');
        Route::post('/acordos-e-convencoes/delete', 'AcordoEConvencaoController@deletar')->name('adm-acordos-e-convencoes-deletar');
        
        Route::get('/editais', 'EditalController@index')->name('adm-editais');
        Route::get('/editais/cadastro', 'EditalController@cadastro')->name('adm-editais-cadastro');
        Route::post('/editais/cadastro', 'EditalController@cadastrar')->name('adm-editais-cadastrar');
        Route::get('/editais/edicao/{id?}', 'EditalController@edicao')->name('adm-editais-edicao');
        Route::post('/editais/edicao', 'EditalController@editar')->name('adm-editais-editar');
        Route::post('/editais/delete', 'EditalController@deletar')->name('adm-editais-deletar');
        
        Route::get('/entidades', 'EntidadeController@index')->name('adm-entidades');
        Route::post('/entidades/actions', 'EntidadeController@actions')->name('adm-entidades-actions');
        
        
        Route::match(['get', 'post'], '/categorias-convenios', 'CategoriaConvenioController@index')->name('adm-categorias-convenios');
        
        
        Route::get('/usuarios', 'UsuarioController@index')->name('adm-usuarios');
        Route::get('/usuarios/cadastro', 'UsuarioController@cadastro')->name('adm-usuarios-cadastro');
        Route::post('/usuarios/cadastro', 'UsuarioController@cadastrar')->name('adm-usuarios-cadastrar');
        Route::get('/usuario/edicao/{id?}', 'UsuarioController@edicao')->name('adm-usuario-edicao');
        Route::post('/usuario/edicao', 'UsuarioController@editar')->name('adm-usuario-editar');
        Route::post('/usuario/deletar', 'UsuarioController@deletar')->name('adm-usuario-delete');
        
        Route::get('/bancos', 'BancoController@index')->name('adm-bancos');
        Route::post('/bancos/actions', 'BancoController@actions')->name('adm-bancos-actions');
    
        Route::get('/sindicatos', 'SindicatoController@index')->name('adm-sindicatos');
        Route::get('/sindicatos/cadastro', 'SindicatoController@cadastro')->name('adm-sindicatos-cadastro');
        Route::post('/sindicatos/cadastro', 'SindicatoController@cadastrar')->name('adm-sindicatos-cadastrar');
        Route::get('/sindicatos/edicao/{id?}', 'SindicatoController@edicao')->name('adm-sindicatos-edicao');
        Route::post('/sindicatos/edicao', 'SindicatoController@editar')->name('adm-sindicatos-editar');
        Route::post('/sindicatos/delete', 'SindicatoController@deletar')->name('adm-sindicatos-deletar');
        /**
         * Rota responsavel pela edição do simdicato escolhido
         * Quando entra na edição do sindicato de Porto Alegre por exemplo,
         * o sindicado de Porto Alegre apenas pode editar as informações
         */
        Route::get('/sindicato-atualizar', 'SindicatoController@edicaoSindicatoVigente')->name('adm-sindicatos-atualizar');

        Route::get('/institucional', 'InstituicaoController@index')->name('adm-instituicao');
        Route::post('/institucional', 'InstituicaoController@edicao')->name('adm-instituicao-edicao');
        Route::get('/servicos', 'ServicoController@index')->name('adm-servicos');
        Route::post('/servicos', 'ServicoController@edicao')->name('adm-servicos-edicao');
        Route::get('/contatos', 'ContatoController@index')->name('adm-contatos');
        Route::post('/contatos', 'ContatoController@edicao')->name('adm-contatos-edicao');
        
        Route::get('/info-portal', 'PortalController@index')->name('adm-portal');
        Route::post('/info-portal', 'PortalController@edicao')->name('adm-portal-edicao');
    });

    // Formulários de cadastros do ADM
    // Route::prefix('formularios')->namespace('Formularios')->group(function ()
    // {
    //     Route::match(['get', 'post'], '/noticia', 'NoticiaController@index')->name('adm-formularios-noticia');
    //     Route::match(['get', 'post'], '/noticia/castastrar', 'NoticiaController@cadastrarNoticia')->name('adm-formularios-noticia-cadastrar');
    // });
});



// Portal Bancários
Route::middleware([GetEntitiesForTemplate::class])->group(function()
{
    Route::get('/', 'WelcomeController@index')->name('welcome')->middleware(CheckSyndicate::class);
    Route::match(['get', 'post'], '/pagination', 'WelcomeController@ajax_pagination')->name('welcome-pagination')->middleware(CheckSyndicate::class);
    Route::get('/fetrafi-rs', 'WelcomeController@home')->name('fetrafi-rs');
    Route::get('/entidades-parceiras', 'EntidadesParceirasController@index')->name('entidades-parceiras');
    Route::match(['get', 'post'], '/busca', 'SearchController@index')->name('search');
    Route::get('/editais', 'EditaisController@index')->name('editais');
    Route::get('/editais/download/{id?}', 'EditaisController@download')->name('editais-download');
    Route::get('/acordos-e-convencoes', 'AcordosEConvencoesController@index')->name('acordos-e-convencoes');
    Route::get('/acordos-e-convencoes/download/{id?}', 'AcordosEConvencoesController@download')->name('acordos-e-convencoes-download');
    Route::get('/meu-sindicato', 'MeuSindicatoController@index')->name('meu-sindicato');
    Route::get('/noticia/{id?}/{title?}', 'NoticiasController@index')->name('noticia')->where('title', '.*');
    // Route::get('/noticia', 'NoticiasController@withImage')->name('noticias-with-image');
    Route::get('/noticia-destaque', 'NoticiasController@withImageDestaque')->name('noticias-with-image-destaque');
    Route::get('/noticia-video', 'NoticiasController@withVideo')->name('noticias-with-video');
    Route::get('/noticia-audio', 'NoticiasController@withAudio')->name('noticias-with-audio');
    Route::get('/noticia-texto', 'NoticiasController@withOnlyText')->name('noticias-only-text');

    // Sindicatos
    Route::prefix('sindicato')->middleware([CheckSyndicate::class])->group(function () {
        /**
         * Estão enviando para o mesmo controller do portal
         */
        //Route::get('/', 'SindicatoController@index')->name('sindicato');
        Route::get('/', 'WelcomeController@indexSindicato')->name('sindicato');
        //Route::get('/pagina-inicial', 'SindicatoController@home')->name('sindicato-home');
        Route::get('/noticia/{id?}/{title?}', 'NoticiasController@indexSindicato')->name('sindicato-noticia')->where('title', '.*');

        Route::get('/o-sindicato', 'Sindicatos\OSindicatoController@index')->name('sindicato-o-sindicato');
        Route::get('/servicos', 'Sindicatos\ServicosController@index')->name('sindicato-servicos');
        Route::get('/editais', 'Sindicatos\EditaisController@index')->name('sindicato-editais');
        Route::match(['get', 'post'], '/sindicalize-se', 'Sindicatos\SindicalizeSeController@index')->name('sindicato-sindicalize-se');    
        Route::match(['get', 'post'], '/contato', 'Sindicatos\ContatoController@index')->name('sindicato-contato');    
    });

    // Fetrafi-RS
    Route::prefix('fetrafi-rs')->namespace('FetrafiRS')->group(function () {
        //Route::get('/', 'FetrafiRSController@index')->name('fetrafi-rs');
        Route::get('/', 'FederacaoController@index')->name('fetrafi-rs');
        Route::get('/federacao', 'FederacaoController@index')->name('fetrafi-rs-federacao');
        Route::get('/servicos', 'ServicosController@index')->name('fetrafi-rs-servicos');
        Route::match(['get', 'post'], '/contato', 'ContatoController@index')->name('fetrafi-rs-contato');    
    });
    
    // Route::fallback(function () {
    //     // rota quando não encontrou no site
    // });
});


Auth::routes();
