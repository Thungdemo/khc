<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Mail\OtpMail;
use App\Rules\ValidOtp;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Lockout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    private OtpService $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $this->ensureIsNotRateLimited($request);

        $user = Auth::guard('web')->getProvider()->retrieveByCredentials($request->only('email', 'password'));

        if(!Auth::guard('web')->getProvider()->validateCredentials($user, $request->only('password')))
        {
            RateLimiter::hit($this->throttleKey($request));
            
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        if(config('khc.2fa'))
        {
            $this->sendOtp($user);
            $request->session()->put('2fa:user:id', $user->id);
            return redirect()->route('admin.otp-form');
        }
        
        Auth::guard('web')->login($user, $request->boolean('remember'));

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard.index', absolute: false));
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function ensureIsNotRateLimited(LoginRequest $request): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        event(new Lockout($request));

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    private function throttleKey(LoginRequest $request): string
    {
        return Str::transliterate(Str::lower($request->input('email')).'|'.$request->ip());
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function sendOtp($user)
    {
        $otp = $this->otpService->generate($user->email);
        
        Mail::to($user->email)->send(new OtpMail($otp));
    }

    public function showOtpForm(): View
    {
        return view('admin.auth.otp-form');
    }

    public function verifyOtp(Request $request): RedirectResponse
    {
        $userId = $request->session()->get('2fa:user:id');
        if (!$userId) {
            return redirect()->route('admin.login')->withErrors(['email' => 'Session expired. Please login again.']);
        }

        $user = Auth::guard('web')->getProvider()->retrieveById($userId);
        if (!$user) {
            return redirect()->route('admin.login')->withErrors(['email' => 'User not found. Please login again.']);
        }

        $request->validate([
            'otp' => ['required', 'string', new ValidOtp($user->email)],
        ]);

        Auth::guard('web')->login($user);

        $request->session()->forget('2fa:user:id');

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard.index', absolute: false));
    }
}