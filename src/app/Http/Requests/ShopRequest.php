<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'name' => 'required|max:30',
            'category_id' => 'required',
            'place_id' => 'required',
            'comment' => 'required|max:120'
        ];
    }

    public function messages()
    {
        return [
            'name.max' => '名前は30文字以内で入力してください',
            'name.required' => '名前を入力してください',
            'category_id.required' => 'ジャンルを選択してください',
            'place_id.required' => 'エリアを選択してください',
            'comment.max' => 'コメントを120文字以内で入力してください',
            'comment.required' => 'コメントを入力してください'
        ];
    }
}