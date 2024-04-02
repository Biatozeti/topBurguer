<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
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

    public function store(Request $request){
        $produtoData = $request->$request->all();

        if($request->hasFile('imagem')){
            $image =$request->file('imagem');
            $nomeImage = time().'.'.$image->getClienteOriginalExtension();
            $caminhoImagem = $image->storeAs('imagens/produtos', $nomeImage,'public');
            $produtoData['imagem']= $caminhoImagem;
        }
        $produto = Produto::create($produtoData);
        return response()->json(['produto' =>$produto], 201);

    }
}
