<?php

namespace App\Http\Controllers\Portal;

use App\Models\FormDownload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormDownloadController extends Controller
{
    public function index()
    {
        return view('portal.form-downloads.index', [
            'formDownloads' => FormDownload::whereNotNull('filename')->newest()->get(),
        ]);
    }
}