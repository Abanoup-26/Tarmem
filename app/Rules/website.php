<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class website implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the URL starts with "http://" or "https://"
        if (strpos($value, 'http://') !== 0 && strpos($value, 'https://') !== 0) {
            $fail("The $attribute must start with 'http://' or 'https://'.");
        }
    }
}
