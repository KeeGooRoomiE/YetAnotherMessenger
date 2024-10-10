<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NumberController;


Route::post('/messages', [MessageController::class, 'sendMessage']);
Route::get('/messages/{pseudonym}', [MessageController::class, 'getMessages']);

Route::get('/number', [NumberController::class, 'getCurrentNumber']);
Route::post('/number/increment', [NumberController::class, 'incrementNumber']);
