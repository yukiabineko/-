<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'title' => 'required|max:255',
            'email' => 'required|email',
            'context' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'email' => 'メールアドレス',
            'context' => '質問内容'
        ];
    }
}
