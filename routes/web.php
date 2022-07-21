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

/* Route::get('/', function () {
    return view('welcome');
})->name('home'); */


Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        Route::resource('cidades', CidadeController::class)->except(['show']);
        Route::resource('planos', PlanoController::class)->except(['show']);
        Route::resource('cobradores', CobradorController::class)->except(['show']);
        Route::resource('vendedores', VendedorController::class)->except(['show']);
        Route::resource('clientes', ClienteController::class);
        Route::resource('cobrancas', CobrancaController::class);
        Route::resource('vencimentos', VencimentoController::class);
        Route::resource('relatorios', RelatorioController::class);

    Route::get('admin/clientes/lista-clientes', 'ClienteController@lista_clientes')->name('clientes.lista-clientes');
    Route::get('admin/cobrancas/lista-aberto', 'CobrancaController@cobrancas_aberto')->name('cobrancas.cobranca-aberto');
    Route::get('admin/cobrancas/lista-recibo-aberto', 'CobrancaController@cobrancas_recibo_aberto')->name('cobrancas.cobranca-recibo-aberto');
    Route::get('admin/vendedores/relatorio', 'VendedorController@relatorio')->name('vendedores.relatorio');

        /* Route::prefix('clientes')->name('clientes.')->group(function(){

            Route::get('/', 'ClientController@index')->name('index');
            Route::get('/cadastro', 'ClientController@create')->name('create');
            Route::post('/store', 'ClientController@store')->name('store');
            Route::get('/{client}/editar', 'ClientController@edit')->name('edit');
            Route::post('/atualizar/{client}', 'ClientController@update')->name('update');
            Route::get('/excluir/{client}', 'ClientController@destroy')->name('destroy');

        });

        Route::prefix('vendedores')->name('vendedores.')->group(function(){
            Route::get('/', 'SellerController@index')->name('index');
            Route::get('/cadastro', 'SellerController@create')->name('create');
            Route::post('/store', 'SellerController@store')->name('store');
            Route::get('/{seller}/editar', 'SellerController@edit')->name('edit');
            Route::post('/atualizar/{seller}', 'SellerController@update')->name('update');
            Route::get('/excluir/{seller}', 'SellerController@destroy')->name('destroy');
        });

        Route::prefix('cobradores')->name('cobradores.')->group(function(){
            Route::get('/', 'CollectorController@index')->name('index');
            Route::get('/cadastro', 'CollectorController@create')->name('create');
            Route::post('/store', 'CollectorController@store')->name('store');
            Route::get('/{collector}/editar', 'CollectorController@edit')->name('edit');
            Route::post('/atualizar/{collector}', 'CollectorController@update')->name('update');
            Route::get('/excluir/{collector}', 'CollectorController@destroy')->name('destroy');
        });

        Route::prefix('planos')->name('planos.')->group(function(){
            Route::get('/', 'PlanController@index')->name('index');
            Route::get('/cadastro', 'PlanController@create')->name('create');
            Route::post('/store', 'PlanController@store')->name('store');
            Route::get('/{plan}/editar', 'PlanController@edit')->name('edit');
            Route::post('/atualizar/{plan}', 'PlanController@update')->name('update');
            Route::get('/excluir/{plan}', 'PlanController@destroy')->name('destroy');
        });

        Route::prefix('vencimentos')->name('vencimentos.')->group(function(){
            Route::get('/', 'DueDateController@index')->name('index');
            Route::get('/cadastro', 'DueDateController@create')->name('create');
            Route::post('/store', 'DueDateController@store')->name('store');
            Route::get('/{due_date}/editar', 'DueDateController@edit')->name('edit');
            Route::post('/atualizar/{due_date}', 'DueDateController@update')->name('update');
            Route::get('/excluir/{due_date}', 'DueDateController@destroy')->name('destroy');
        });

        Route::prefix('cobrancas')->name('cobrancas.')->group(function(){
            Route::get('/', 'ReceiveController@index')->name('index');
            Route::get('/cadastro', 'ReceiveController@create')->name('create');
            Route::post('/store', 'ReceiveController@store')->name('store');
            Route::get('/{due_date}/editar', 'ReceiveController@edit')->name('edit');
            Route::post('/atualizar/{due_date}', 'ReceiveController@update')->name('update');
            Route::get('/excluir/{due_date}', 'ReceiveController@destroy')->name('destroy');
        }); */

    });
});




Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

