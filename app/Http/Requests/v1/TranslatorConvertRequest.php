<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class TranslatorConvertRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'keyword' => 'required|string|min:2|max:5000',
        ];
    }
}
