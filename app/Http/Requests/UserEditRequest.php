<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserEditRequest extends FormRequest
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
        'last_name' =>['required','string','max:10'],
        'first_name' =>['required','string','max:10'],
        'zipcode' =>['required','string','alpha_dash','max:8'],
        'prefecture'=>['required','string','max:5'],
        'municipality' =>['required','string','max:10'],
        'address' =>['required','string','max:15'],
        'email' =>['email',Rule::unique('m_users')->ignore($this->id)],
        'phone_number'=>['required','string','alpha_dash','max:15'],
        ];
    }
}
