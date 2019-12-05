<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCards extends FormRequest
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
            'card' => 'required',
            'card_type' => 'required',
            'expiration_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'card.required' => 'La tarjeta es obligatoria',
            'card_type.required' => 'El tipo de tarjeta es obligatoria',
            'expiration_date.required' => 'La fecha de expiraciòn es obligatorio'
        ];
    }
}
