<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsers extends FormRequest
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
            'name' => 'required|max:191|min:5',
            'email' => 'required|unique:users|max:191|email',
            'password' => 'required|max:191|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de usuario es obligatorio',
            'name.max'  => 'Excediste el número de caracteres del nombre de usuario',
            'name.min'  => 'El mínimo de caracteres del nombre de usuario es de 5',
            'email.required' => 'El correo es obligatorio',
            'email.max'  => 'Excediste el número de caracteres del correo',
            'email.email'  => 'El correo es inválido',
            'email.unique'  => 'El correo ya existe',
            'password.required'  => 'La contraseña es obligatoria',
            'password.max'  => 'Excediste el número de caracteres de la contraseña',
            'password.min'  => 'El mínimo de caracteres de la contraseña es 8',
        ];
    }
}
