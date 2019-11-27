<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCredit extends FormRequest
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
            'client_id' => 'required',
            'place_id' => 'required',
            'credit_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'El cliente es obligatorio',
            'place_id.required' => 'La institución es obligatoria',
            'credit_type.required' => 'El tipo de crédito es obligatorio'
        ];
    }
}
