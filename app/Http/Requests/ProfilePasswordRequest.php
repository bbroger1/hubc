<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePasswordRequest extends FormRequest
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
            'password' => ['required', 'string', 'min:8', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d X])(?=.*[@*!$#%]).*$/', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'A senha deve conter 8 caracteres incluindo números, letras maiúsculas, minúsculas e carácter especial'
        ];
    }
}
