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
        $albums = Album::has('galleryImages')
            ->with(['coverImage', 'galleryImages'])
            ->latest()
            ->paginate(config('khc.pagination'));

        return view('portal.album.index', compact('albums'));
    }

    public function show(Album $album)
    {
        $album->load('galleryImages');
        return view('portal.album.show', compact('album'));
    }
}
