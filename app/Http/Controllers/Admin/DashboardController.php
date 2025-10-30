<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[
            'totalNotices' => Notice::count(),
            'totalUsers' => User::count(),
        ]);
    }
}
