<?php

namespace App\Http\Requests;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CarrinhoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'clientes_id'=>'required',
            'produtos_id'=>'required',
            'status'=>'required|max:100|min:50',
            'total'=>'required\decimal:2'
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
        'clientes_id.required'=> 'o campo é obrigatório',
        'produtos_id.required'=> 'o campo é obrigatorio',
        'status.required'=> 'o campo é obrigatório',
        'status.max'=>'o status deve conter no maximo 100 caracteres',
        'status.min'=>'o status deve conter no minimo 50',
        'total.required'=>'o campo é obrigatório',
        'total.decimal'=> 'o campo total só aceita decimais'
         ];
}
}
  