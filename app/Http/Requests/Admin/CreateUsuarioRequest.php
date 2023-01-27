<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuarioRequest extends FormRequest
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
        if( !$this->filled('is_master') ) {
            $this->merge(['is_master' => 0]);
        }
        if( !$this->filled('is_admin') ) {
            $this->merge(['is_admin' => 0]);
        }
        if( $this->filled('password') ) {
            $this->merge(['password' => bcrypt($this->password)]);
        }

        return [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'
                . ($this->usuario ? $this->usuario->id : null) . ',id',
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