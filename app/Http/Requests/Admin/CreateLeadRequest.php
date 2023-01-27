<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateLeadRequest extends FormRequest
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
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email,'
                . ($this->lead ? $this->lead->id : null) . ',id',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'O nome é obrigatório',
            'name.max'       => 'O nome precisa conter no máximo 255 caracteres',
            'email.required' => 'O e-mail é obrigatório',
            'email.unique'   => 'O e-mail já pertence a outro usuário',
            'email.email'    => 'O e-mail não é um e-mail válido',
        ];
    }
}