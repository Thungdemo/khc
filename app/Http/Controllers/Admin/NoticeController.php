<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Models\Notice;
use App\Rules\Filetype;
use Illuminate\Http\Request;
use App\Models\NoticeCategory;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.notice.index',[
            'notices' => Notice::filter($request)->newest()->paginate(config('khc.pagination')),
            'noticeCategories' => NoticeCategory::pluck('name', 'id')
        ]);
    }

    public function create()
    {
        return view('admin.notice.create',[
            'noticeCategories' => NoticeCategory::pluck('name', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', new Xss],
            'published_at' => ['required_if:schedule,1','nullable','date'],
            'notice_category_id' => ['required', 'exists:notice_categories,id'],
            'document' => ['required', 'file', 'max:'.config('khc.max_upload_size'), new Filetype(['pdf'])],
        ]);

        $notice = Notice::create([
            'title' => $request->title,
            'published_at' => $request->schedule ? $request->published_at : now(),
            'notice_category_id' => $request->notice_category_id,
        ]);

        $notice->saveDocument($request->file('document'));

        return redirect()->route('admin.notice.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notice.edit',[
            'notice' => $notice,
            'noticeCategories' => NoticeCategory::pluck('name', 'id')
        ]);
    }

    public function update(Request $request, Notice $notice)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'published_at' => 'required|date',
            'notice_category_id' => 'required|exists:notice_categories,id',
            'document' => 'nullable|file|mimetypes:application/pdf|max:'.config('khc.max_upload_size'),
        ]);

        $notice->update([
            'title' => $validated['title'],
            'published_at' => $validated['published_at'],
            'notice_category_id' => $validated['notice_category_id'],
        ]);

        if ($request->hasFile('document')) {
            $notice->documentDelete();
            $notice->saveDocument($request->file('document'));
        }

        return redirect()->route('admin.notice.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('admin.notice.index')->with('success', 'Notice deleted successfully.');
    }
}
