<?php

namespace App\Http\Controllers\Portal;

use App\Models\LegalCommittee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LegalCommitteeController extends Controller
{
    public function index()
    {
        return view('portal.legal-committee.index',[
            'legalCommittees' => LegalCommittee::orderBy('created_at','desc')->get(),
        ]);
    }
}