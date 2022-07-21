<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'codigo' => 'required',
            'nome' => 'required',
            'rg' => 'required',
            'cpf' => 'required',
            'contato' => 'required',
            'vencimento_id' => 'required',
            'cidade_id' => 'required',
            'plano_id' => 'required',
            'cobrador_id' => 'required',
            'rua' => 'required',
            'bairro' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'required' => 'Este campo é obrigatório',
        ];
    }
}
