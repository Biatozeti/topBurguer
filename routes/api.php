<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produtos/index',[ProdutoController::class, 'index']);
Route::post('/produtos/store',[ProdutoController::class, 'store']);
Route::post('/produtos',[ProdutoController::class, 'retornarTodos']);

Route::get('/clienteIndex',[ClienteController::class,'index']);
Route::post('/cliente', [ClienteController::class,'store']);