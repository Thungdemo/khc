<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Rules\Filetype;
use App\Models\LegalCommittee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LegalCommitteeController extends Controller
{
    const PHOTO_MAX_SIZE = 1000; // in KB

    public function index()
    {
        return view('admin.legal-committee.index',[
            'legalCommittees' => LegalCommittee::paginate(config('khc.pagination')),
        ]);
    }

    public function create()
    {
        return view('admin.legal-committee.create',[
            'photoSize' => LegalCommittee::$photoSize,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255', new Xss],
            'designation' => ['required', 'string', 'max:255', new Xss],
            'photo' => ['required','file','max:'.LegalCommittee::$photoSize, new Filetype(['jpg','png'])]
        ]);

        $legalCommittee = LegalCommittee::create([
            'full_name' => $validated['full_name'],
            'designation' => $validated['designation'],
        ]);

        $legalCommittee->savePhoto($request->file('photo'));

        return redirect()->route('admin.legal-committee.create')->with('success', 'Record created successfully.');
    }

    public function edit(LegalCommittee $legalCommittee)
    {
        return view('admin.legal-committee.edit',[
            'legalCommittee' => $legalCommittee,
            'photoSize' => LegalCommittee::$photoSize,
        ]);
    }

    public function update(Request $request, LegalCommittee $legalCommittee)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255', new Xss],
            'designation' => ['required', 'string', 'max:255', new Xss],
            'photo' => ['nullable','file','max:'.LegalCommittee::$photoSize, new Filetype(['jpg','png'])]
        ]);

        $legalCommittee->update([
            'full_name' => $validated['full_name'],
            'designation' => $validated['designation'],
        ]);

        if ($request->hasFile('photo')) {
            $legalCommittee->savePhoto($request->file('photo'));
        }

        return redirect()->route('admin.legal-committee.edit', $legalCommittee)->with('success', 'Record updated successfully.');
    }

    public function destroy(LegalCommittee $legalCommittee)
    {
        $legalCommittee->delete();
        return redirect()->route('admin.legal-committee.index')->with('success', 'Record deleted successfully.');
    }
}