<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\StationJudge;

class StationJudgeController extends Controller
{
    public function index()
    {
        $judges = StationJudge::all();

        return view('portal.station-judge.index', compact('judges'));
    }
}
