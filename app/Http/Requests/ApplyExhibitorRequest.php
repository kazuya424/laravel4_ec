<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApplyExhibitorRequest extends FormRequest
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
            'email' =>['required','string','max:255','email', 'unique:m_users', 'unique:m_applicants'],
        ];
    }

    /**
     * メッセージのカスタマイズ
     */
    public function messages()
    {
        return [
            'email.unique' => '入力された:attributeは使用されているので、別のメールアドレスをご利用ください。',
        ];
    }
}
