<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreatePaginaRequest extends FormRequest
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
        if ( $this->filled('periodo_inicio') ) {
            $date = Carbon::createFromFormat('d/m/Y', $this->get('periodo_inicio'));
            $this->merge(['periodo_inicio' => $date->format('Y-m-d')]);
        }
        if ( $this->filled('periodo_fim') ) {
            $date = Carbon::createFromFormat('d/m/Y', $this->get('periodo_fim'));
            $this->merge(['periodo_fim' => $date->format('Y-m-d')]);
        }

        return [
            'titulo' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'O título é obrigatório',
            'titulo.max'      => 'O título precisa conter no máximo 255 caracteres',
        ];
    }
}