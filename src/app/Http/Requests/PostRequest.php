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
            'comment' => 'required|max:115',
       ];
    }

    public function messages()
    {
        return [
            'score.required' => 'スコアを入力してください',
            'comment.required' => 'コメントを入力してください',
            'comment.max' => 'コメントを115文字以内で入力してください',
        ];
    }
}
