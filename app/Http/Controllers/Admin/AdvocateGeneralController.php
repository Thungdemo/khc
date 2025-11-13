<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Models\AgCategory;
use Illuminate\Http\Request;
use App\Models\AdvocateGeneral;
use App\Http\Controllers\Controller;

class AdvocateGeneralController extends Controller
{
    public function index()
    {
        $advocateGenerals = AdvocateGeneral::with('agCategory')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.advocate-general.index', [
            'advocateGenerals' => $advocateGenerals,
        ]);
    }

    public function create()
    {
        return view('admin.advocate-general.create',[
            'agCategories' => AgCategory::pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255', new Xss],
            'doj' => ['required', 'date'],
            'served_till' => ['nullable', 'date', 'after_or_equal:doj'],
            'ag_category_id' => ['required', 'exists:ag_categories,id'],
        ]);
        AdvocateGeneral::create([
            'full_name' => $request->full_name,
            'doj' => $request->doj,
            'served_till' => $request->served_till,
            'ag_category_id' => $request->ag_category_id,
        ]);
        return redirect()->route('admin.advocate-general.create')->with('success', 'Advocate General created successfully.');
    }

    public function edit(AdvocateGeneral $advocateGeneral)
    {
        return view('admin.advocate-general.edit',[
            'advocateGeneral' => $advocateGeneral,
            'agCategories' => AgCategory::pluck('name', 'id'),
        ]);
    }

    public function update(Request $request, AdvocateGeneral $advocateGeneral)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255', new Xss],
            'doj' => ['required', 'date'],
            'served_till' => ['nullable', 'date', 'after_or_equal:doj'],
            'ag_category_id' => ['required', 'exists:ag_categories,id'],
        ]);
        $advocateGeneral->update([
            'full_name' => $request->full_name,
            'doj' => $request->doj,
            'served_till' => $request->served_till,
            'ag_category_id' => $request->ag_category_id,
        ]);
        return redirect()->route('admin.advocate-general.edit', $advocateGeneral)->with('success', 'Advocate General updated successfully.');
    }

    public function destroy(AdvocateGeneral $advocateGeneral)
    {
        $advocateGeneral->delete();
        return redirect()->route('admin.advocate-general.index')->with('success', 'Advocate General deleted successfully.');
    }
}
