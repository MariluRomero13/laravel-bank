<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomers extends FormRequest
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
            'password' => 'required|max:191|min:8',
            'name_customer' => 'required|max:191|min:5',
            'first_last_name' => 'required|max:191',
            'second_last_name' => 'required|max:191',
            'curp' => 'required|unique:customers|max:18|min:18',
            'rfc' => 'required|unique:customers|max:13|min:13',
            'birthdate' => 'required',
            'phone' => 'required|unique:customers|max:10|min:10'
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
            'name_customer.required' => 'El nombre es obligatorio',
            'name_customer.max'  => 'Excediste el número de caracteres del nombre',
            'name_customer.min'  => 'El mínimo de caracteres del nombre es de 5',
            'first_last_name.required' => 'El apellido paterno es obligatorio',
            'first_last_name.max'  => 'Excediste el número de caracteres del apellido paterno',
            'second_last_name.required' => 'El apellido materno es obligatorio',
            'second_last_name.max'  => 'Excediste el número de caracteres del apellido materno',
            'curp.required' => 'La CURP es obligatoria',
            'curp.unique' => 'La CURP ya existe',
            'curp.max' => 'Excediste el número de la CURP de caracteres',
            'curp.min' => 'El mínimo de caracteres de la CURP es de 18',
            'rfc.required' => 'El RFC es obligatorio',
            'rfc.unique' => 'El RFC ya existe',
            'rfc.max' => 'Excediste el número del RFC caracteres',
            'rfc.min' => 'El mínimo de caracteres del RFC es de 13',
            'birthdate.required' => 'La fecha de nacimiento es obligatoria',
            'phone.required' => 'El telefono es obligatorio',
            'phone.unique' => 'El telefono ya existe',
            'phone.max' => 'Excediste el número de caracteres del telefono',
            'phone.min' => 'El mínimo de caracteres del telefono es de 10'
        ];
    }
}
