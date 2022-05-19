<?php

namespace App\Http\Requests\v1;

use App\Services\v1\Telegram\Service;
use Error;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class TranslatorConvertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'message.from.first_name' => 'required|string|min:2|max:250',
            'message.from.username' => 'required|string|min:2|max:250',
            'message.text' => 'required|string|min:5|max:250',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'message.from.first_name.required' => 'We are unable to respond to your transaction.',
            'message.from.first_name.string' => 'We are unable to respond to your transaction.',
            'message.from.first_name.min' => 'We are unable to respond to your transaction.',
            'message.from.first_name.max' => 'We are unable to respond to your transaction.',

            'message.from.username.required' => 'We are unable to respond to your transaction.',
            'message.from.username.string' => 'We are unable to respond to your transaction.',
            'message.from.username.min' => 'We are unable to respond to your transaction.',
            'message.from.username.max' => 'We are unable to respond to your transaction.',

            'message.text.required' => 'Please send the word you want to translate. Ex: /tr yes',
            'message.text.string' => 'The word you want to translate must be of string type.',
            'message.text.min' => 'The word you want to translate must be at least 5 characters.',
            'message.text.max' => 'The word you want to translate must be a maximum of 5000 characters.',
        ];
    }

    /**
     * @param Validator $validator
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function failedValidation(Validator $validator)
    {
        if ($validator->fails()) {
            throw new Error('asdasd');
        }
    }
}
