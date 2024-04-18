<?php

namespace App\Http\Controllers;
use App\Http\Requests\CarrinhoFormRequest;
use App\Http\Requests\CarrinhoRequest;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = Carrinho::all();
        return[
            'cliente_id' => $carrinho->cliente_id,
            'produto_id'=>$carrinho->produto_id,
            'status'=> $carrinho->status,
            'total'=>$carrinho->total
        ]; 
    }
    public function store(CarrinhoRequest $request){
        $carrinho = Carrinho::where('clientes_id', $request->clientes_id);
        if(!$carrinho){
            return response()->json([
                "status"=>false,
                "message"=> "cliente não encontrado"
            ],400);
        }
        $carrinho = Carrinho::create([
            'status'=>request->status,
            'cliente_id'=>$request->cliente_id,
            'total'=>$request->total,
        ]);
        return response()->json([
            "status"=>true,
            "message"=>"pedido feito com sucesso",
            "data"=>$carrinho
        ],200);
    }
}
