<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;


/**
 * Class Xss
 *
 * A custom Laravel validation rule to detect and block common XSS (Cross-Site Scripting) attack patterns in user input.
 *
 * Usage:
 *   use App\Rules\Xss;
 *   $request->validate(['field' => [new Xss]]);
 *
 * This rule checks for script tags, event handlers, and dangerous URLs in the input value.
 */
class Xss implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/(<\s*script\b|<\s*(?:iframe|object|embed|svg|img|form)\b|\bon\w+\s*=|(?:href|src)\s*=\s*[\'"]\s*(?:javascript:|vbscript:|data:)|expression\s*\(|url\s*\(\s*javascript:|%3[cC]|&#x?0*3[cC];?)/is';
        if(preg_match($pattern, $value)) {
            $fail('The :attribute contains disallowed script tags.');
        }
    }
}
