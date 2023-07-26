<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            'date' => ['required', 'date|after:today'],
            'time' => 'required',
            'num_of_guest' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',
            'date.after' => '日付は今日より後の日付を入力してください',
            'time.required' => '時間を入力してください',
            'num_of_guest.required' => '人数を入力してください',
        ];
    }
}
