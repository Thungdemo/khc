<?php

namespace App\Services;

use App\Models\Otp;
use Illuminate\Support\Carbon;

class OtpService
{
    public function generate(string $identifier): string
    {
        $length = config('otp.length', 6);
        $min = (int) str_pad('1', $length, '0');
        $max = (int) str_pad('', $length, '9');
        $otp = rand($min, $max);

        Otp::updateOrCreate(
            ['identifier' => $identifier],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(config('otp.expiry')),
                'attempts' => 0,
            ]
        );

        return $otp;
    }

    public function getOtpRecord(string $identifier)
    {
        return Otp::where('identifier', $identifier)->first();
    }

    public function deleteOtp(string $identifier): void
    {
        Otp::where('identifier', $identifier)->delete();
    }
}
