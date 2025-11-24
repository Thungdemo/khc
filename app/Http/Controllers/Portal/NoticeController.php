<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    public function index(NoticeCategory $noticeCategory,Request $request)
    {
        return view('portal.notice.index', [
            'noticeCategories' => NoticeCategory::isParent()->sort()->get(),
            'noticeCategory' => $noticeCategory,
            'notices' => $noticeCategory->notices()->filter($request)->published()->newest()->paginate(config('khc.pagination')),
            'noticeSubCategories' => $noticeCategory->children()->pluck('name', 'id'),
        ]);
    }
}
