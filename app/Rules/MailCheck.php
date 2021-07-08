<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Applicant;

class MailCheck implements Rule
{
    private $auth_code;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($auth_code)
    {
        $this->auth_code = $auth_code;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $applicant = Applicant::where('auth_code', $this->auth_code)->first();
        return $applicant['email'] == $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '出品者申請時に入力したメールアドレスを入力してください。';
    }
}
