<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\ValidationRule;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('khc.recaptcha.secret_key'),
                'response' => $value,
                'remoteip' => request()->ip()
            ]
        );
        $data = $response->json();
        dd($data);
        if($data['success'] != true || $data['score'] < config('khc.recaptcha.min_score')) {
            $fail('ReCAPTCHA verification failed. Please try again.');
        }
    }
}
