<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:5',
            'telefone' => 'required|max:11|min:11|unique:usuarios,telefone',
            'endereco' => 'required|max:70|min:10',
            'email' => 'required|email|unique:usuarios,email',
            'cpf'=> 'required|max:11|min:11|unique:usuarios,cpf',
            'password' => 'required|',
            'imagem' => 'required|'

        ];

    }
    public function  failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'nome.required' => 'o campo nome é obrigatorio',
            'nome.max' => 'o campo nome deve conter no maximo 80 caracteres',
            'nome.min' => 'o campo nome deve conter no minimo 5 caracteres',
            'nome.unique' => 'nome ja cadastrado',
            'telefone.required' => 'celular obrigatorio',
            'telefone.max' => 'o celular  deve conter no maximo 11 caracteres',
            'telefone.min' => 'o celular deve conter no minimo 11 caracteres',
            'endereco.required' => 'endereco obrigatorio',
            'endereco.max' => 'o campo endereco deve conter no maximo 70 caracteres',
            'endereco.min' => 'o campo endereco deve conter no minimo 10 caracteres',
            'email.required' => 'o campo email é obrigatorio',
            'email.unique' => 'email ja cadastrado no sistema',
            'cpf.required' =>'o campo cpf é obrigatorio',
            'cpf.max'=> 'o campo cpf deve conter no maximo 11 caracteres',
            'cpf.min'=> 'o campo cpf deve conter no minimo 11 caracteres',
            'cpf.unique'=> 'o campo cpf ja cadastrado', 
            'senha.required' => 'o campo senha é obrigatorio',
            'imagem.required' =>'imagem',


        ];
    }
}
