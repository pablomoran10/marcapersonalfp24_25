<?php

use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'docentes'], function(){
    Route::get('/', [DocenteController::class, 'getIndex']);

    Route::get('/show/{id}', [DocenteController::class, 'getShow'])
    ->where('id', '[0-9]+');

    Route::get('/create', [DocenteController::class, 'getCreate']);

    Route::get('/edit/{id}', [DocenteController::class, 'getEdit'])->where('id', '[0-9]+');
});
