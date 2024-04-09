<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $cliente = Cliente::all();

        $clienteComImagem = $cliente->map(function($cliente){
            return [
                'nome' => $cliente->nome,
                'telefone'=> $cliente->telefone,
                'endereco' => $cliente->endereco,
                'email' => $cliente->email,
                'cpf'=> $cliente->cpf,
                'password' => $cliente->password,
                'foto'=> asset('storage/'.$cliente->foto),
            ];
        });
        return response()->json($clienteComImagem);
    }

    public function store(Request $request){
        $clienteData = $request->all();

        if($request->hasFile('imagem')){
            $image =$request->file('imagem');
            $nomeImage = time().'.'.$image->getClientOriginalExtension();
            $caminhoImagem = $image->storeAs('imagens/cliente', $nomeImage,'public');
            $clienteData['imagem']= $caminhoImagem;
        }
        $cliente = Cliente::create($clienteData);
        return response()->json(['cliente' =>$cliente], 201);

    }
}