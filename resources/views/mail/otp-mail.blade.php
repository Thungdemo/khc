<x-mail::message>
# OTP Verification

Dear user,

**{{ $code }}** is your One-Time Password (OTP) for verification.

Please enter this OTP to complete your verification process. This code is valid for a limited time.

If you did not request this, please ignore this email.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
