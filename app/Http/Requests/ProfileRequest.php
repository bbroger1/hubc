<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'cpf' => ['required', 'cpf', 'unique:profile_adms,cpf,' . $id . ',users_id'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'birthday' => ['date_format:d/m/Y']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'birthday.date_format' => 'Favor informar data de nascimento válida (dd/mm/AAAA)'
        ];
    }
}
