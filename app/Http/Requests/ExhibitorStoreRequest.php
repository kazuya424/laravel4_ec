<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneRule;
use App\Rules\ZipcodeRule;
use App\Rules\MailCheck;

class ExhibitorStoreRequest extends FormRequest
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
            'company_name'=>['required','string','max:30'],
            'last_name' =>['required','string','max:10'],
            'first_name' =>['required','string','max:10'],
            'zipcode' =>['required','string','min:7','max:7', new ZipcodeRule()],
            'prefecture'=>['required','string','max:5'],
            'municipality' =>['required','string','max:10'],
            'address' =>['required','string','max:15'],
            'email' =>['required','email','string','max:255','unique:m_users',new MailCheck($this->auth_code)],
            'phone_number'=>['required','string','min:8','max:14', new PhoneRule()],
            'password'=>['string','confirmed','min:6','max:15'],
            'auth_code'=>['required','max:16','min:16','string','exists:m_applicants,auth_code']
        ];
    }
}
