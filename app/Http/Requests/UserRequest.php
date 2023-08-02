<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
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
            'surname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'katakana'],
            'surame_kana' => ['required', 'string', 'max:255', 'katakana'],
            'phone_number' => ['required', 'tel'],
            'postal_code' =>[ 'required', 'zipcode', 'max:7'],
            'prefectures' =>[ 'required' ],
            'city' => [ 'required' ],
            'block' => [ 'required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
        ];
    }
    public function  attributes()
    {
        return [
            'surname' => '氏',
            'name' => '名前',
            'name_kana' => '名前(カナ)',
            'surame_kana' => '氏(カナ)',
            'phone_number' => '電話番号',
            'postal_code' => '郵便番号',
            'prefectures' => '市区町村',
            'city' => '街名',
            'block' => '番地等',
            'email' => 'メールアドレス'
        ];
    }
}
