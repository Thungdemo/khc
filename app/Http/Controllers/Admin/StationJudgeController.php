<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StationJudgeController extends Controller
{
    public function index()
    {
        return view('admin.station-judge.index',[
            'stationJudges' => StationJudge::paginate(config('khc.pagination.per_page'))
        ]);
    }

    public function create()
    {
        return view('admin.station-judge.create');
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
            'description' => ['nullable', 'string', new Xss],
            'photo' => ['required', 'image', 'max:'.StationJudge::$photoSize,new Filetype(['jpg','jpeg','png'])],
        ]);

        $stationJudge = StationJudge::create([
            'full_name' => $request->full_name,
            'parent_court' => $request->parent_court,
            'dob' => $request->dob,
            'stream' => $request->stream,
            'elevation_date' => $request->elevation_date,
            'stationing' => $request->stationing,
            'description' => $request->description
        ]);

        return redirect()->route('admin.station-judge.index');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
