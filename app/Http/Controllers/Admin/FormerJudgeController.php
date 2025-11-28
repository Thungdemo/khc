<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Rules\Filetype;
use App\Models\FormerJudge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormerJudgeController extends Controller
{
    const PHOTO_MAX_SIZE = 1000; // in KB
    public function __construct()
    {
        $this->middleware('can:cms');
    }

    public function index()
    {
        return view('admin.former-judge.index',[
            'formerJudges' => FormerJudge::paginate(config('khc.pagination')),
        ]);
    }

    public function create()
    {
        return view('admin.former-judge.create',[
            'photoSize' => FormerJudge::$photoSize,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255',new Xss],
            'start' => ['required', 'date'],
            'end' => ['nullable', 'date','after_or_equal:start'],
            'photo' => ['required','file','max:'.FormerJudge::$photoSize,new Filetype(['jpg','png'])]
        ]);

        $formerJudge = FormerJudge::create([
            'full_name' => $validated['full_name'],
            'start' => $validated['start'],
            'end' => $validated['end'],
        ]);

        $formerJudge->savePhoto($request->file('photo'));

        return redirect()->route('admin.former-judge.create')->with('success', 'Record created successfully.');
    }

    public function edit(FormerJudge $formerJudge)
    {
        return view('admin.former-judge.edit',[
            'formerJudge' => $formerJudge,
            'photoSize' => FormerJudge::$photoSize,
        ]);
    }

    public function update(Request $request, FormerJudge $formerJudge)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255',new Xss],
            'start' => ['required', 'date'],
            'end' => ['nullable', 'date','after_or_equal:start'],
            'photo' => ['nullable','file','max:'.FormerJudge::$maxFileSize,new Filetype(['jpg','png'])]
        ]);

        $formerJudge->update([
            'full_name' => $validated['full_name'],
            'start' => $validated['start'],
            'end' => $validated['end'],
        ]);

        if ($request->hasFile('photo')) {
            $formerJudge->savePhoto($request->file('photo'));
        }

        return redirect()->route('admin.former-judge.edit', $formerJudge)->with('success', 'Record updated successfully.');
    }

    public function destroy(FormerJudge $formerJudge)
    {
        $formerJudge->delete();
        return redirect()->route('admin.former-judge.index')->with('success', 'Record deleted successfully.');
    }
}
