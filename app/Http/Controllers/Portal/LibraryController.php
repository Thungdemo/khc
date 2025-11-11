<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibraryController extends Controller
{
    public function index()
    {
        return view('portal.library.index');
    }
}