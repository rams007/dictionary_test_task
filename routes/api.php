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

Route::resource('words', \App\Http\Controllers\WordController::class)->only([
    'index', 'show', 'destroy'
]);

Route::resource('dictionaries', \App\Http\Controllers\DictionaryController::class)->only([
    'index', 'store', 'show', 'destroy'
]);

Route::resource('words', \App\Http\Controllers\WordController::class)->only([
    'store'
])->middleware('checkMaximumWordsInDictionary');

