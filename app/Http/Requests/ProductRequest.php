<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|min:0',
            'category' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'name' => '商品名',
            'price' => '価格',
            'category' => 'カテゴリー'
        ];
    }
}
