<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/funcionarios', 'FuncionarioController@index')->name('funcionario.index');
Route::get('/funcionarios/edit/{id}', 'FuncionarioController@edit')->name('funcionario.edit');
Route::post('/funcionarios/create', 'FuncionarioController@store')->name('funcionario.store');
Route::delete('/funcionarios/destroy/{id}', 'FuncionarioController@destroy')->name('funcionario.destroy');