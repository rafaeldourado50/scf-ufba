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

//plano Routes
Route::group(['middleware'=> 'web'], function() {
    Route::resource('plano','\App\Http\Controllers\PlanoController');
});

Route::get('import',  ['as'=>'import', 'uses'=>'ExcelController@import']);
Route::post('import', ['as'=>'import', 'uses'=>'ExcelController@store']);

//aluno Routes
Route::group(['middleware'=> 'web'],function() {
    Route::get('plano/{plano}/aluno', ['as' => 'aluno.index', 'uses' => 'AlunoController@index']);
    Route::get('plano/{plano}/aluno/create', ['as' => 'aluno.create', 'uses' => 'AlunoController@create']);
    Route::post('plano/{plano}/aluno', ['as' => 'aluno.store', 'uses' => 'AlunoController@store']);
    Route::get('plano/{plano}/aluno/{aluno}', ['as' => 'aluno.show', 'uses' => 'AlunoController@show']);
    Route::get('plano/{plano}/aluno/{aluno}/edit', ['as' => 'aluno.edit', 'uses' => 'AlunoController@edit']);
    Route::patch('plano/{plano}/aluno/{aluno}', ['as' => 'aluno.update', 'uses' => 'AlunoController@update']);
    Route::delete('plano/{plano}/aluno/{aluno}', ['as' => 'aluno.destroy', 'uses' => 'AlunoController@destroy']);
});

//aula Routes
Route::group(['middleware'=> 'web'],function() {
    Route::get('plano/{plano}/aula', ['as' => 'aula.index', 'uses' => 'AulaController@index']);
    Route::get('plano/{plano}/aula/create', ['as' => 'aula.create', 'uses' => 'AulaController@create']);
    Route::post('plano/{plano}/aula', ['as' => 'aula.store', 'uses' => 'AulaController@store']);
    Route::delete('plano/{plano}/aula/{aula}', ['as' => 'aula.destroy', 'uses' => 'AulaController@destroy']);
});

//chamada Routes
Route::group(['middleware'=> 'web'],function() {
    Route::resource('chamada','\App\Http\Controllers\ChamadaController');
});
