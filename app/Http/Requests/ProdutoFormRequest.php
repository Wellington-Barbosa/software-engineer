<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigoBarras' => 'required|min:13',
            'descProduto' => 'required|min:2',
            'valorUnitario' => 'required',
            'quantidade' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'codigoBarras.required' => "É necessário informar o campo 'Código de Barras'!",
            'codigoBarras.min' => "O campo 'Código de Barras' precisa ter no mínino 13 caracteres!",
            'descProduto.required' => "É necessário informar o campo 'Descrição'!",
            'descProduto.min' => "O campo 'Descrição' precisa ter no mínino 2 caracteres!",
            'valorUnitario.required' => "É necessário informar o campo 'Valor Unitário'!",
            'quantidade.required' => "É necessário informar o campo 'Quantidade'!",
        ];
    }
}
