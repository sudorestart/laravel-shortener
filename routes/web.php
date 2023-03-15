<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\shortController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['middleware' => ['web']], function () 
{
    Route::get('/', function () 
    {
        return view('shortenLink');
    });
    Route::get('generate-short-link', 'App\Http\Controllers\shortController@index');
    Route::post('generate-short-link', 'App\Http\Controllers\shortController@store')->name('generate.short.link.post'); 
    Route::get('{code}', 'App\Http\Controllers\shortController@shortenLink')->name('shorten.link');
    Route::post('expand-link', 'App\Http\Controllers\shortController@expand')->name('expand.link'); 
    Route::post('custom-link', 'App\Http\Controllers\shortController@custom')->name('custom.link'); 



    //routes here
});