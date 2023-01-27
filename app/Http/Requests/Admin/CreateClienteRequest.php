<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreateClienteRequest extends FormRequest
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
        if( !$this->filled('active') ) {
            $this->merge(['active' => 0]);
        }

        return [
            'nome'  => 'required|string|max:255',
            'email' => 'required|email',
            'senha' => 'required|string|min:3',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max'      => 'O nome precisa conter no máximo 255 caracteres',
            'email.*'       => 'O e-mail não é válido',
            'senha.*'       => 'A senha é inválida e precisa ter pelo menos 3 caracteres',
        ];
    }
}