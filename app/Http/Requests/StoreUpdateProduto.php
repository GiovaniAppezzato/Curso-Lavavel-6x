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
        $id = $this->segment(2);

        return [
            'nome' => "required|min:3|max:255|unique:produtos,nome,{$id},id",
            'descricao' => 'required|min:3|max:10000',
            'valor' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'imagem' => [
                'nullable', 'image'
            ]
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'nome.min' => 'Ops...o nome é preciso ter mais do que 3 caracteres',
            'nome.max' => 'Ops...o nome não é possivel ter mais do que 255 caracteres',
            'nome.unique' => 'Esse nome não está disponivel',
            'descricao.required' => 'Descrição é obrigatória',
            'descricao.min' => 'Ops...A descrição é preciso ter mais do que 3 caracteres',
            'descricao.max' => 'Ops...A descrição não é possivel ter mais do que 10000 caracteres',
            'valor.required' => 'Informar o valor é obrigatório',
            'valor.regex' => 'Esse valor não é permitido',
            'imagem.image' => 'O arquivo passado deve ser uma imagem'
        ];
    }
}
