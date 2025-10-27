<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormerJudgeController extends Controller
{
    public function index()
    {
        return view('portal.former-judge.index');
    }
}
