<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileAddressRequest extends FormRequest
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
            'zip_code' => ['required', 'string'],
            'address' => ['required', 'string'],
            'number' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string', 'max:2']
        ];
    }

    public function messages()
    {
        return [
            'zip_code.required' => 'O campo CEP é obrigatório.',
            'address.required' => 'O campo endereço é obrigatório.',
            'number.required' => 'O campo número é obrigatório.',
            'city.required' => 'O campo cidade é obrigatório.',
            'state.required' => 'O campo estado é obrigatório.',
            'state.max' => 'Informe a sigla do estado com dois dígitos (Ex.: DF)'
        ];
    }
}
