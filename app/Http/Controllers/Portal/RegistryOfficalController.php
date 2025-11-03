<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Models\RegistryOfficial;
use App\Http\Controllers\Controller;

class RegistryOfficalController extends Controller
{
    public function index()
    {
        return view('portal.registry-official.index',[
            'levels' => RegistryOfficial::orderBy('level')->get()->groupBy('level'),
        ]);
    }
}
