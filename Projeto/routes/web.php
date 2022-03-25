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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin/', 'middleware' => ['role:administrador']], function(){
    Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');

    Route::get('gerenciar/user/index', 'AdminController@userIndex')->name('userIndex');
    Route::get('gerenciar/user/cadastrar', 'AdminController@cadastrarUser')->name('cadastrarUser');
    Route::post('gerenciar/user/store', 'AdminController@userStore')->name('userStore');
    Route::get('gerenciar/user/details/{id}', 'AdminController@userDetails')->name('userDetails');
    Route::get('gerenciar/user/edit/{id}', 'AdminController@userEdit')->name('userEdit');
    Route::post('gerenciar/user/update/{id}', 'AdminController@userUpdate')->name('userUpdate');
    Route::delete('gerenciar/user/delete/{id}', 'AdminController@userdelete')->name('userDelete');
    Route::get('gerenciar/user/generate-pdf','adminController@pdf')->name('generatePDF');   
    Route::get('gerenciar/user/buscarUser', 'AdminController@buscarUser')->name('buscarUser');
    Route::get('gerenciar/user/emprestimos', 'AdminController@emprestimos')->name('emprestimos');
    
});

Route::group(['prefix' => 'bibliotecario/', 'middleware' => ['role:bibliotecario']], function(){
    Route::get('dashboard', 'BibliotecarioController@dashboard')->name('bibliotecarioDashboard');

    Route::get('gerenciar/user/criar', 'BibliotecarioController@criarLivro')->name('criarLivro');
    Route::post('gerenciar/user/store', 'BibliotecarioController@livroStore')->name('livroStore');
    Route::get('gerenciar/user/details/{id}', 'BibliotecarioController@livroDetails')->name('livroDetails');
    Route::get('gerenciar/user/edit/{id}', 'BibliotecarioController@livroEdit')->name('livroEdit');
    Route::post('gerenciar/user/update/{id}', 'BibliotecarioController@livroUpdate')->name('livroUpdate');
    Route::delete('gerenciar/user/delete/{id}', 'BibliotecarioController@livroDelete')->name('livroDelete');
    Route::get('gerenciar/user/show', 'BibliotecarioController@userShow')->name('userShow');
    Route::get('gerenciar/user/detalhes/{id}', 'BibliotecarioController@userDetalhes')->name('userDetalhes');
    Route::get('gerenciar/user/search', 'BibliotecarioController@search')->name('search');
    Route::get('gerenciar/user/index', 'BibliotecarioController@acervoIndex')->name('acervoIndex');
    Route::get('gerenciar/user/aprovarEmprestimo/{id}', 'BibliotecarioController@aprovarEmprestimo')->name('aprovarEmprestimo');
    Route::get('gerenciar/user/negarEmprestimo/{id}', 'BibliotecarioController@negarEmprestimo')->name('negarEmprestimo');
    Route::get('gerenciar/user/renovacao', 'BibliotecarioController@livroRenovacao')->name('livroRenovacao');
    Route::get('gerenciar/user/autorizarRenovacao/{id}', 'BibliotecarioController@autorizarRenovacao')->name('autorizarRenovacao');
    Route::get('gerenciar/user/negarRenovacao/{id}', 'BibliotecarioController@negarRenovacao')->name('negarRenovacao');
    Route::get('gerenciar/user/devolucao', 'BibliotecarioController@livroDevolucao')->name('livroDevolucao');
    Route::get('gerenciar/user/autorizarDevolucao/{id}', 'BibliotecarioController@autorizarDevolucao')->name('autorizarDevolucao');
    Route::get('gerenciar/user/buscar', 'BibliotecarioController@buscar')->name('buscar');
    Route::get('gerenciar/user/emprestimosAtuais', 'BibliotecarioController@emprestimosAtuais')->name('emprestimosAtuais');
});

Route::group(['prefix' => 'user/', 'middleware' => ['role:usuario']], function(){
    Route::get('dashboard', 'UserController@dashboard')->name('userDashboard');
    Route::get('gerenciar/user/detalhe/{id}', 'UserController@livroDetalhe')->name('livroDetalhe');
    Route::get('gerenciar/user/busca', 'UserController@busca')->name('busca');
    Route::get('gerenciar/user/meusEmprestimos', 'UserController@meusEmprestimos')->name('meusEmprestimos');
    Route::post('gerenciar/user/emprestimo/{id}', 'UserController@emprestimo')->name('emprestimo');
    Route::get('gerenciar/user/renovarEmprestimo/{id}', 'UserController@renovarEmprestimo')->name('renovarEmprestimo');
    Route::get('gerenciar/user/devolverEmprestimo/{id}', 'UserController@devolverEmprestimo')->name('devolverEmprestimo');
    //Route::get('gerenciar/user/emprestimo','UserController@emprestimoLivro')->name('emprestimoLivro'); 
});