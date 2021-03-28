<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileImageRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,png,jpeg|file|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Favor incluir um arquivo para upload.',
            'image.mimes' => 'A extensão do arquivo deve ser JPG, JPEG ou PNG',
            'image.max' => 'O arquivo não pode ser maior que 2MB.'
        ];
    }
}
