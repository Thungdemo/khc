<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Models\Notice;
use App\Rules\Filetype;
use App\Models\NoticeChild;
use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cms');
    }

    public function index(Request $request)
    {
        return view('admin.notice.index',[
            'notices' => Notice::filter($request)->newest()->paginate(config('khc.pagination')),
            'noticeCategories' => NoticeCategory::pluck('name', 'id'),
            'statuses' => Notice::FILTER_STATUSES,
        ]);
    }

    public function create()
    {
        return view('admin.notice.create',[
            'noticeCategories' => NoticeCategory::isParent()->pluck('name', 'id'),
            'maxFileSize' => Notice::$documentMaxSize,
            'noticeSubcategories' => NoticeCategory::where('parent_id',old('notice_category_id'))->pluck('name','id'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', new Xss],
            'published_at' => ['required_if:schedule,1','nullable','date'],
            'notice_category_id' => ['required', 'exists:notice_categories,id'],
            'notice_subcategory_id' => ['nullable', 'exists:notice_categories,id'],
            'document' => ['required', 'file', 'max:'.Notice::$documentMaxSize, new Filetype(['pdf'])],
            'notice_children' => ['nullable', 'array'],
            'notice_children.*.title' => ['required', 'string', 'max:255', new Xss],
            'notice_children.*.document' => ['required', 'file', 'max:'.NoticeChild::$documentMaxSize, new Filetype(['pdf'])],
        ]);

        $notice = Notice::create([
            'title' => $request->title,
            'published_at' => $request->schedule ? $request->published_at : now(),
            'notice_category_id' => $request->notice_category_id,
            'notice_subcategory_id' => $request->notice_subcategory_id,
        ]);

        $notice->saveDocument($request->file('document'));

        if($request->more_documents)
        {
            foreach($request->notice_children ?? [] as $child) {
                $noticeChild = $notice->noticeChildren()->create([
                    'title' => $child['title'],
                ]);
                $noticeChild->saveDocument($child['document']);
            }
        }

        return redirect()->route('admin.notice.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notice.edit',[
            'notice' => $notice,
            'noticeCategories' => NoticeCategory::pluck('name', 'id'),
            'noticeSubcategories' => NoticeCategory::where('parent_id',old('notice_category_id', $notice->notice_category_id))->pluck('name','id'),
        ]);
    }

    public function update(Request $request, Notice $notice)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', new Xss],
            'published_at' => ['required_if:schedule,1','nullable','date'],
            'notice_category_id' => ['required', 'exists:notice_categories,id'],
            'notice_subcategory_id' => ['nullable', 'exists:notice_categories,id'],
            'document' => ['nullable', 'file', 'max:'.Notice::$documentMaxSize, new Filetype(['pdf'])],
        ]);

        $notice->update([
            'title' => $validated['title'],
            'published_at' => $validated['published_at'],
            'notice_category_id' => $validated['notice_category_id'],
            'notice_subcategory_id' => $validated['notice_subcategory_id'],
        ]);

        if($request->hasFile('document')) 
        {
            $notice->documentDelete();
            $notice->saveDocument($request->file('document'));
        }
        
        if($request->more_documents)
        {
            $notice->noticeChildren()->whereNotIn('id', array_keys($request->notice_children ?? []))->each(function($child) {
                $child->delete();
            });
            foreach($request->notice_children ?? [] as $id => $child) 
            {
                $noticeChild = $notice->noticeChildren()->where('id',$id)->updateOrCreate(
                    ['title' => $child['title']]
                );
                isset($child['document']) and $noticeChild->saveDocument($child['document']);
            }
        }
        else
        {
            $notice->noticeChildren()->each(function($child) {
                $child->delete();
            });
        }

        return redirect()->route('admin.notice.edit',$notice)->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('admin.notice.index')->with('success', 'Notice deleted successfully.');
    }

    public function noticeSubcategory(Request $request)
    {
        $request->validate([
            'notice_category_id' => ['required', 'exists:notice_categories,id'],
        ]);

        return response()->json(
            NoticeCategory::where('parent_id', $request->notice_category_id)->get()
        );
    }
}
