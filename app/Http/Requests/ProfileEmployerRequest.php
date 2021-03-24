<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEmployerRequest extends FormRequest
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
        $id = $this->segment(3);

        return [
            'cnpj' => ['required', 'cnpj', 'unique:profile_employers,cnpj,' . $id . ',users_id'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'representative_name' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo razão social é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.unique' => 'O CNPJ informado já esta cadastrado.',
            'representative_name.required' => 'O campo representante é obrigatório.',
        ];
    }
}
