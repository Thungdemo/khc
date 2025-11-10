<?php

namespace App\Http\Controllers\Portal;

use App\Models\Statistics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function index()
    {
        return view('portal.statistics.index',[
            'years' => Statistics::orderBy('year', 'desc')->orderBy('month')->get()->groupBy('year'),
        ]);
    }
}
