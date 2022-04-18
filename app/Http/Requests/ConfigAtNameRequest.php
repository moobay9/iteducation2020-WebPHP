<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigAtNameRequest extends FormRequest
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
            'at_name' => ['required', 'max_length:255'],
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
            'at_name' => 'ユーザー名',
        ];
    }
}
