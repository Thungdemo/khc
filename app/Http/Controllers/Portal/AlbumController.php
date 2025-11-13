<?php

namespace App\Http\Controllers\Portal;

use App\Models\Album;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index()
    {
        return view('portal.album.index',[
            'albums' => Album::latest()->paginate(config('khc.pagination')),
        ]);
    }
}
