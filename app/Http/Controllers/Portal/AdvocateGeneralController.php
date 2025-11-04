<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\AgCategory;
use App\Models\AdvocateGeneral;
use Illuminate\Http\Request;

class AdvocateGeneralController extends Controller
{
    public function index()
    {
        // Get all categories with their advocate generals
        $categories = AgCategory::with(['advocateGenerals' => function($query) {
            $query->orderBy('doj', 'asc');
        }])->orderBy('id')->get();

        return view('portal.advocate-general.index', compact('categories'));
    }
}