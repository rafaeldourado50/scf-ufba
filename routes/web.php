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
Route::group(['middleware'=> 'web'], function(){
  Route::resource('plano','\App\Http\Controllers\PlanoController');
});

Route::get('import',  ['as'=>'import', 'uses'=>'ExcelController@import']);
Route::post('import', ['as'=>'import', 'uses'=>'ExcelController@store']);

/*aluno Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('aluno','\App\Http\Controllers\AlunoController');
  Route::post('aluno/{id}/update','\App\Http\Controllers\AlunoController@update');
  Route::get('aluno/{id}/registrar','\App\Http\Controllers\AlunoController@registrar');
  Route::get('aluno/{id}/desregistrar','\App\Http\Controllers\AlunoController@desregistrar');
  Route::get('aluno/{id}/delete','\App\Http\Controllers\AlunoController@destroy');
  Route::get('aluno/{id}/consulta','\App\Http\Controllers\AlunoController@consulta');
  Route::get('aluno/{id}/chamada','\App\Http\Controllers\AlunoController@chamada');
  Route::get('aluno/{id}/deleteMsg','\App\Http\Controllers\AlunoController@DeleteMsg');
});*/

/*aula Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('aula','\App\Http\Controllers\AulaController');
  Route::post('aula/{id}/update','\App\Http\Controllers\AulaController@update');
  Route::get('aula/{id}/delete','\App\Http\Controllers\AulaController@destroy');
  Route::get('aula/{id}/consulta','\App\Http\Controllers\AulaController@consulta');
  Route::get('aula/{id}/deleteMsg','\App\Http\Controllers\AulaController@DeleteMsg');
});*/

/*chamada Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('chamada','\App\Http\Controllers\ChamadaController');
  Route::post('chamada/{id}/update','\App\Http\Controllers\ChamadaController@update');
  Route::get('chamada/{id}/delete','\App\Http\Controllers\ChamadaController@destroy');
  Route::get('chamada/{id}/deleteMsg','\App\Http\Controllers\ChamadaController@DeleteMsg');
});*/
