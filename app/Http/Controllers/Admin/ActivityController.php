<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Rules\Richtext;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cms');
    }
    
    public function index()
    {
        return view('admin.activity.index',[
            'activities' => Activity::paginate(config('khc.pagination'))
        ]);
    }

    public function create()
    {
        return view('admin.activity.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', new Xss],
            'description' => ['required', 'string', new Richtext],
            'published_at' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:' . Activity::$photoSize],
        ]);

        DB::beginTransaction();

        $activity = Activity::create([
            'title' => $request->title,
            'description' => $request->description,
            'published_at' => $request->published_at,
        ]);

        if($request->hasFile('image'))
        {
            $activity->savePhoto($request->file('image'));
        }

        DB::commit();

        return redirect()->route('admin.activity.index')->with('success','Activity created successfully.');
    }

    public function edit(Activity $activity)
    {
        return view('admin.activity.edit',[
            'activity' => $activity,
        ]);
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', new Xss],
            'description' => ['required', 'string', new Richtext],
            'published_at' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:' . Activity::$photoSize],
        ]);

        $activity->update([
            'title' => $request->title,
            'description' => $request->description,
            'published_at' => $request->published_at,
        ]);

        if($request->hasFile('image'))
        {
            $activity->savePhoto($request->file('image'));
        }

        return redirect()->route('admin.activity.index')->with('success','Activity updated successfully.');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.activity.index')->with('success','Activity deleted successfully.');
    }
}
