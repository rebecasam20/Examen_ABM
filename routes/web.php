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
Route::resource('/persona', 'PersonaController');
/*Route::get('/persona', 'PersonaController@index');
Route::get('/persona/create','PersonaController@create');
Route::get('/persona/edit', 'PersonaController@edit');*/

