<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateLeadCategoryRequest extends FormRequest
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
        if( !$this->filled('is_fixed') ) {
            $this->merge(['is_fixed' => 0]);
        }

        return [
            'name'  => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'O nome é obrigatório',
            'name.max'       => 'O nome precisa conter no máximo 255 caracteres',
        ];
    }
}