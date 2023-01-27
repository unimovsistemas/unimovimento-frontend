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


Route::group( ['middleware' => ['web', 'auth', 'permission']], function() {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    // Route::get('/sair', 'DashboardController@logout')->name('admin.logout');

    Route::resource('configuracoes', 'ConfiguracaoController', ['names'=>'admin.config']);
    Route::resource('usuarios', 'UsuarioController', ['names'=>'admin.usuarios']);
    Route::resource('modulos', 'ModuloController', ['names'=>'admin.modulos']);
    Route::resource('contatos/departamentos', 'ContatosDepartamentosController', ['names'=>'admin.contatosdepartamentos']);
    Route::post('contatos/markAsRead/{contato}', ['as'=>'admin.contatos.setstatus', 'uses'=>'ContatosController@setStatus']);
    Route::resource('contatos', 'ContatosController', ['names'=>'admin.contatos']);

    Route::get('banners/reordem', 'BannerController@reordem')->name('admin.banners.reordem');
    Route::resource('banners', 'BannerController', ['names'=>'admin.banners']);

    Route::get('paginas/reordem', 'PaginaController@reordem')->name('admin.paginas.reordem');
    Route::resource('paginas', 'PaginaController', ['names'=>'admin.paginas']);

    Route::get('paginas/{pagina}/conteudo/reordem', 'PaginaConteudoController@reordem')->name('admin.paginas.conteudos.reordem');
    Route::resource('paginas/{pagina}/conteudo', 'PaginaConteudoController', ['names'=>'admin.paginas.conteudos']);

    Route::post('clientes/pastas/deletefile', ['as'=>'admin.clientespastas.deletefile', 'uses'=>'ClientesPastasController@deletefile']);
    Route::resource('clientes/pastas', 'ClientesPastasController', ['names'=>'admin.clientespastas']);
    Route::resource('clientes', 'ClientesController', ['names'=>'admin.clientes']);

    Route::resource('leads/categories', 'LeadsCategoriesController', ['names'=>'admin.leadscategories']);
    Route::post('leads/export', ['as'=>'admin.leads.export', 'uses'=>'LeadsController@export']);
    Route::resource('leads', 'LeadsController', ['names'=>'admin.leads']);
});

Auth::routes();