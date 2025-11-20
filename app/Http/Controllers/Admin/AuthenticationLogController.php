<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog;

class AuthenticationLogController
{
    /**
     * Display a listing of the authentication logs.
     */
    public function index(Request $request): View
    {
        $logs = AuthenticationLog::with('authenticatable')->latest('login_at')->paginate(30);
        return view('admin.authentication-log.index', compact('logs'));
    }
}
