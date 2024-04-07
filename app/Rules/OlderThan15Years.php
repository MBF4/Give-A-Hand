<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OlderThan15Years implements Rule
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
        // Check if the user is older than 15 years
        return now()->diff(new \DateTime($value))->y >= 15;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be older than 15 years.';
    }
}
