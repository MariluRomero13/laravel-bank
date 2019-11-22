<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsers extends FormRequest
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
            'name' => 'required|max:191|min:5'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de usuario es obligatorio',
            'name.max'  => 'Excediste el número de caracteres del nombre de usuario',
            'name.min'  => 'El mínimo de caracteres del nombre de usuario es de 5'
        ];
    }
}
