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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('import', ['as'=>'import', 'uses'=>'ExcelController@import']);
Route::post('import', ['as'=>'import', 'uses'=>'ExcelController@store']);

//plano Routes
Route::group(['middleware'=> 'web'], function() {
    Route::resource('plano', '\App\Http\Controllers\PlanoController');
});

//aluno Routes
Route::group(['middleware'=> 'web'], function() {
    Route::get('plano/{plano}/aluno', ['as' => 'aluno.index', 'uses' => 'AlunoController@index']);
    Route::get('plano/{plano}/aluno/create', ['as' => 'aluno.create', 'uses' => 'AlunoController@create']);
    Route::post('plano/{plano}/aluno', ['as' => 'aluno.store', 'uses' => 'AlunoController@store']);
    Route::get('plano/{plano}/aluno/{aluno}', ['as' => 'aluno.show', 'uses' => 'AlunoController@show']);
    Route::get('plano/{plano}/aluno/{aluno}/edit', ['as' => 'aluno.edit', 'uses' => 'AlunoController@edit']);
    Route::patch('plano/{plano}/aluno/{aluno}', ['as' => 'aluno.update', 'uses' => 'AlunoController@update']);
    Route::delete('plano/{plano}/aluno/{aluno}', ['as' => 'aluno.destroy', 'uses' => 'AlunoController@destroy']);
});

//aula Routes
Route::group(['middleware'=> 'web'], function() {
    Route::get('plano/{plano}/aula', ['as' => 'aula.index', 'uses' => 'AulaController@index']);
    Route::get('plano/{plano}/aula/create', ['as' => 'aula.create', 'uses' => 'AulaController@create']);
    Route::post('plano/{plano}/aula', ['as' => 'aula.store', 'uses' => 'AulaController@store']);
    Route::get('plano/{plano}/aula/{aula}', ['as' => 'aula.show', 'uses' => 'AulaController@show']);
    Route::get('plano/{plano}/aula/{aula}/edit', ['as' => 'aula.edit', 'uses' => 'AulaController@edit']);
    Route::patch('plano/{plano}/aula/{aula}', ['as' => 'aula.update', 'uses' => 'AulaController@update']);
    Route::delete('plano/{plano}/aula/{aula}', ['as' => 'aula.destroy', 'uses' => 'AulaController@destroy']);
});

//frequencia Routes
Route::group(['middleware'=> 'web'], function() {
    Route::get('plano/{plano}/aula/{aula}/frequencia', ['as' => 'frequencia.index', 'uses' => 'FrequenciaController@index']);
    Route::get('plano/{plano}/aula/{aula}/frequencia/create', ['as' => 'frequencia.create', 'uses' => 'FrequenciaController@create']);
    Route::post('plano/{plano}/aula/{aula}/frequencia', ['as' => 'frequencia.store', 'uses' => 'FrequenciaController@store']);
    Route::get('plano/{plano}/aula/{aula}/frequencia/{frequencia}', ['as' => 'frequencia.show', 'uses' => 'FrequenciaController@show']);
    Route::get('plano/{plano}/aula/{aula}/frequencia/{frequencia}/edit', ['as' => 'frequencia.edit', 'uses' => 'FrequenciaController@edit']);
    Route::patch('plano/{plano}/aula/{aula}/frequencia/{frequencia}', ['as' => 'frequencia.update', 'uses' => 'FrequenciaController@update']);
    Route::delete('plano/{plano}/aula/{aula}/frequencia/{frequencia}', ['as' => 'frequencia.destroy', 'uses' => 'FrequenciaController@destroy']);
});

//chamada Routes
Route::group(['middleware'=> 'web'], function() {
    Route::get('plano/{plano}/aula/{aula}/aluno', ['as' => 'chamada.index', 'uses' => 'ChamadaController@index']);
    Route::post('plano/{plano}/aula/{aula}/aluno/{aluno}/check', ['as' => 'chamada.check', 'uses' => 'ChamadaController@check']);
    Route::post('plano/{plano}/aula/{aula}/aluno/{aluno}/uncheck', ['as' => 'chamada.uncheck', 'uses' => 'ChamadaController@uncheck']);
});
