<?php

namespace App\Rules;

use App\Services\OtpService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidOtp implements ValidationRule
{
    public function __construct(
        protected string $identifier
    ) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $otpService = app(OtpService::class);
        $record = $otpService->getOtpRecord($this->identifier);

        if (!$record) {
            $fail('OTP not found.');
            return;
        }

        if ($record->expires_at->isPast()) {
            $fail('OTP expired.');
            return;
        }

        if ($record->attempts >= config('otp.max_attempts')) {
            $fail('Maximum OTP attempts reached.');
            return;
        }

        // Increment attempts
        $record->increment('attempts');

        if ($record->otp !== $value) {
            $fail('Wrong OTP.');
            return;
        }

        // OTP correct — clear OTP
        $otpService->deleteOtp($this->identifier);
    }
}
