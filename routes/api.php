<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('produtosIndex',[ProdutoController::class, 'index']);
Route::post('produtos',[ProdutoController::class, 'store']);
Route::get('clienteIndex',[ClienteController::class,'index']);
Route::post('cliente', [ClienteController::class,'store']);