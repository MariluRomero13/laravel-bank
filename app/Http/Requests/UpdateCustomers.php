<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomers extends FormRequest
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
            'name_customer' => 'required|max:191|min:5',
            'first_last_name' => 'required|max:191',
            'second_last_name' => 'required|max:191',
            'curp' => 'required|max:18|min:18',
            'rfc' => 'required|max:13|min:13',
            'birthdate' => 'required',
            'phone' => 'required|max:10|min:10'
        ];
    }

    public function messages()
    {
        return [
            'name_customer.required' => 'El nombre es obligatorio',
            'name_customer.max'  => 'Excediste el número de caracteres del nombre',
            'name_customer.min'  => 'El mínimo de caracteres del nombre es de 5',
            'first_last_name.required' => 'El apellido paterno es obligatorio',
            'first_last_name.max'  => 'Excediste el número de caracteres del apellido paterno',
            'first_last_name.min'  => 'El mínimo de caracteres del apellido paterno es de 5',
            'second_last_name.required' => 'El apellido materno es obligatorio',
            'second_last_name.max'  => 'Excediste el número de caracteres del apellido materno',
            'second_last_name.min'  => 'El mínimo de caracteres del apellido materno es de 5',
            'curp.required' => 'La CURP es obligatoria',
            'curp.max' => 'Excediste el número de la CURP de caracteres',
            'curp.min' => 'El mínimo de caracteres de la CURP es de 18',
            'rfc.required' => 'El RFC es obligatorio',
            'rfc.max' => 'Excediste el número del RFC caracteres',
            'rfc.min' => 'El mínimo de caracteres del RFC es de 13',
            'birthdate.required' => 'La fecha de nacimiento es obligatoria',
            'phone.required' => 'El telefono es obligatorio',
            'phone.max' => 'Excediste el número de caracteres del telefono',
            'phone.min' => 'El mínimo de caracteres del telefono es de 10'
        ];
    }
}
