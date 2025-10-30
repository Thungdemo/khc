<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Rules\Filetype;
use App\Models\StationJudge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StationJudgeController extends Controller
{
    public function index()
    {
        return view('admin.station-judge.index',[
            'stationJudges' => StationJudge::paginate(config('khc.pagination'))
        ]);
    }

    public function create()
    {
        return view('admin.station-judge.create',[
            'photoSize' => StationJudge::$photoSize
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255', new Xss],
            'parent_court' => ['required', 'string', 'max:255', new Xss],
            'dob' => ['required', 'date'],
            'stream' => ['required', 'string', 'max:255', new Xss],
            'elevation_date' => ['required', 'date'],
            'stationing' => ['required', 'string', 'max:255', new Xss],
            'biography' => ['nullable', 'string', new Xss],
            'photo' => ['required', 'image', 'max:'.StationJudge::$photoSize,new Filetype(['jpg','jpeg','png'])],
        ]);

        $stationJudge = StationJudge::create([
            'full_name' => $request->full_name,
            'parent_court' => $request->parent_court,
            'dob' => $request->dob,
            'stream' => $request->stream,
            'elevation_date' => $request->elevation_date,
            'stationing' => $request->stationing,
            'biography' => $request->biography
        ]);

        $stationJudge->savePhoto($request->file('photo'));

        return redirect()->route('admin.station-judge.index')->with('success','Station Judge created successfully.');
    }

    public function edit(StationJudge $stationJudge)
    {
        return view('admin.station-judge.edit',[
            'stationJudge' => $stationJudge,
            'photoSize' => StationJudge::$photoSize
        ]);
    }

    public function update(Request $request, StationJudge $stationJudge)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255', new Xss],
            'parent_court' => ['required', 'string', 'max:255', new Xss],
            'dob' => ['required', 'date'],
            'stream' => ['required', 'string', 'max:255', new Xss],
            'elevation_date' => ['required', 'date'],
            'stationing' => ['required', 'string', 'max:255', new Xss],
            'biography' => ['nullable', 'string', new Xss],
            'photo' => ['nullable', 'image', 'max:'.StationJudge::$photoSize,new Filetype(['jpg','jpeg','png'])],
        ]);

        $stationJudge->update([
            'full_name' => $request->full_name,
            'parent_court' => $request->parent_court,
            'dob' => $request->dob,
            'stream' => $request->stream,
            'elevation_date' => $request->elevation_date,
            'stationing' => $request->stationing,
            'biography' => $request->biography
        ]);

        if ($request->hasFile('photo')) {
            $stationJudge->savePhoto($request->file('photo'));
        }

        return redirect()->route('admin.station-judge.edit',$stationJudge)->with('success','Station Judge updated successfully.');
    }

    public function destroy(StationJudge $stationJudge)
    {
        $stationJudge->delete();
        return redirect()->route('admin.station-judge.index')->with('success','Station Judge deleted successfully.');
    }
}
