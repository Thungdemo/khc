<?php

namespace App\Http\Controllers\Portal;

use App\Models\FormerJudge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormerJudgeController extends Controller
{
    public function index()
    {
        return view('portal.former-judge.index',[
            'formerJudges' => FormerJudge::orderBy('start')->get(),
        ]);
    }
}
