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
            'noticeCategories' => NoticeCategory::isParent()->sort()->get(),
            'latestNews' => Notice::published()->newest()->limit(6)->get(),
            'activities' => Activity::latest()->limit(2)->get(),
            'calendarEvents' => Calendar::recentHolidays()->toFullCalendar()->get()->toArray(),
            'judges' => [
                ['name' => "Hon'ble Mr. Justice Ashutosh Kumar", 'position' => 'Chief Justice', 'image' => asset('images/judges/chief-justice.jpg')],
                ['name' => "Hon’ble Mrs. Justice Yarenjungla Longkumer", 'position' => 'Station Judge', 'image' => asset('images/judges/station-judge-1.jpg')],
                ['name' => "Hon’ble Mr. Justice Rajesh Mazumdar", 'position' => 'Station Judge', 'image' => asset('images/judges/station-judge-2.jpg')],
            ]
        ]);
    }
}
