<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduto extends FormRequest
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
            'nome' => 'required|min:3|max:255',
            'descricao' => 'nullable|min:3:|max:10000',
            'imagem' => [
                'required', 'image'
            ]
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'nome.min' => 'Ops...o nome é preciso ter mais do que 3 caracteres',
            'nome.max' => 'Ops...o nome não é possivel ter mais do que 255 caracteres',
            'descricao.min' => 'Ops...A descrição é preciso ter mais do que 3 caracteres',
            'descricao.max' => 'Ops...A descrição não é possivel ter mais do que 10000 caracteres',
            'imagem' => 'O arquivo passado deve ser uma imagem'
        ];
    }
}
