<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyTweetRequest extends FormRequest
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
            'body' => ['required', 'max_length:140'],
            'parent_id' => ['required'],
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
            'body' => 'ツイート',
            'parent_id' => '親id',
        ];
    }
}
