<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddress extends FormRequest
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
            'street' => 'required|min:5',
            'between_streets' => 'required| ',
            'postal_code' => 'required|max:5|min:5',
            'neighborhood' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required'
        ];
    }

    public function messages(){
        return [
            'street.required' => 'La calle es requerida',
            'street.min' => 'El mínimo de caracteres de la calle es de 5',
            'between_streets.required' => 'El campo entre calles es requerido',
            'postal_code.required' => 'El códigp postal es requerido',
            'postal_code.max' => 'Excediste el número de caracteres del código postal',
            'postal_code.min' => 'El mínimo de caracteres del código postal es de 10',
            'neighborhood.required' => 'La colonia es requerida',
            'country.required' => 'La ciudad es requerida',
            'state.required' => 'El estado es requerido',
            'city.required' => 'La ciudad es requerida',

        ];
    }
}
