<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TelRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match("/^(0)[6-7]{1}[0-9]{8}$/", $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.regex',['phone']);
    }
}