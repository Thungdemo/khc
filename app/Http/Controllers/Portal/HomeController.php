<?php

namespace App\Http\Controllers\Portal;

use App\Models\Notice;
use App\Models\Activity;
use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('portal.home',[
            'noticeCategories' => NoticeCategory::sort()->get(),
            'latestNews' => Notice::published()->newest()->limit(6)->get(),
            'activities' => Activity::latest()->limit(2)->get(),
            'calendarEvents' => Calendar::recentHolidays()->get(),
        ]);
    }
}
