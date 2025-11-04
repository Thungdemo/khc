<?php

namespace App\Http\Controllers\Portal;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function index()
    {
        return view('portal.activity.index', [
            'activities' => Activity::orderBy('published_at', 'desc')->paginate(10),
        ]);
    }

    public function show(Activity $activity)
    {
        return view('portal.activity.show', [
            'activity' => $activity,
            'relatedActivities' => Activity::where('id', '!=', $activity->id)
                ->orderBy('published_at', 'desc')
                ->limit(3)
                ->get(),
        ]);
    }
}