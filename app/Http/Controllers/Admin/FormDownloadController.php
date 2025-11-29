<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Rules\Filetype;
use App\Models\FormDownload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormDownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cms');
    }
    public function index(Request $request)
    {
        return view('admin.form-download.index', [
            'formDownloads' => FormDownload::filter($request)->newest()->paginate(config('khc.pagination'))
        ]);
    }

    public function create()
    {
        return view('admin.form-download.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', new Xss],
            'document' => ['required', 'file', 'max:' . FormDownload::$documentMaxSize, new Filetype(['pdf'])],
        ]);

        $formDownload = FormDownload::create([
            'title' => $request->title,
        ]);

        $formDownload->saveDocument($request->file('document'));

        return redirect()->route('admin.form-download.index')->with('success', 'Form download created successfully.');
    }

    public function edit(FormDownload $formDownload)
    {
        return view('admin.form-download.edit', [
            'formDownload' => $formDownload
        ]);
    }

    public function update(Request $request, FormDownload $formDownload)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', new Xss],
            'document' => ['nullable', 'file', 'max:' . FormDownload::$documentMaxSize, new Filetype(['pdf'])],
        ]);

        $formDownload->update([
            'title' => $validated['title'],
        ]);

        if ($request->hasFile('document')) {
            $formDownload->documentDelete();
            $formDownload->saveDocument($request->file('document'));
        }

        return redirect()->route('admin.form-download.edit', $formDownload)->with('success', 'Form download updated successfully.');
    }

    public function destroy(FormDownload $formDownload)
    {
        $formDownload->delete();
        return redirect()->route('admin.form-download.index')->with('success', 'Form download deleted successfully.');
    }
}
