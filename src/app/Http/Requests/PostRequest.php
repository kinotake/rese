<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'score' => 'required',
            'comment' => 'required|max:400',
            'shop_id' => 'required',
            'post_header' => 'required|max:15',
        ];
    }

    public function messages()
    {
        return [
            'score.required' => 'スコアを入力してください',
            'comment.required' => 'コメントを入力してください',
            'comment.max' => 'コメントを400文字以内で入力してください',
            'post_header.required' => '見出しを入力してください',
            'post_header.max' => '見出しは15文字以内で入力してください',
        ];
    }
}
