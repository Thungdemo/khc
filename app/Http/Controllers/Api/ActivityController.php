<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of activities.
     */
    public function index(Request $request)
    {
        return ActivityResource::collection(Activity::orderBy('published_at','desc')->paginate(
            config('khc.pagination'))
        );
    }

    /**
     * Display the specified activity.
     */
    public function show(Activity $activity)
    {
        return new ActivityResource($activity);
    }

    public function latest()
    {
        $latestActivity = Activity::orderBy('published_at', 'desc')->first();

        return new ActivityResource($latestActivity);
    }
}
