<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog;

class AuthenticationLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:security');
    }
    /**
     * Display a listing of the authentication logs.
     */
    public function index(Request $request): View
    {
        $logs = AuthenticationLog::with('authenticatable')->latest('login_at')->paginate(30);
        return view('admin.authentication-log.index', compact('logs'));
    }
}
