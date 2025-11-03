<?php

namespace App\Http\Controllers\Portal;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryImageController extends Controller
{
    public function index()
    {
        return view('portal.image.index',[
            'galleryImages' => GalleryImage::latest()->paginate(config('khc.pagination')),
        ]);
    }
}
