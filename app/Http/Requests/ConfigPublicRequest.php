<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigPublicRequest extends FormRequest
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
            'is_public' => ['required', 'boolean'],
        ];
    }

    /**
     * Attribute.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'is_public' => 'ツイート公開設定',
        ];
    }
}
