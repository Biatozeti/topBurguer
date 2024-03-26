<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoController extends Model
{
    public function index(){
        $produtos = Produto::all();

        $produtosComImagem = $produtos->map(function($produto){
            return [
                'nome' => $produto->nome,
                'preco'=> $produto->preco,
                'ingredientes' => $produto->ingredientes,
                'imagem'=> asset('storage/'.$produto->imagem),
            ];
        });
        return response()->json($produtosComImagem);
    }
}
