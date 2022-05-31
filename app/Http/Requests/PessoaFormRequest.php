<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaFormRequest extends FormRequest
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
            'codigoPessoa' => 'required|min:11',
            'nomePessoa' => 'required|min:10',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'codigoPessoa.required' => "É necessário informar o campo 'CPF'!",
            'codigoPessoa.min' => "O campo 'CPF' precisar ter no mínimo 11 caracteres!",
            'nomePessoa.required' => "O campo 'Nome' é obrigatório!",
            'nomePessoa.min' => "O campo 'Nome' precisa ter mais de 10 letras!",
            'email.required' => "O campo 'E-mail' é obrigatório!",
        ];
    }
}
