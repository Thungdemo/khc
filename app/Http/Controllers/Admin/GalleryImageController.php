<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Xss;
use App\Rules\Filetype;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryImageController extends Controller
{

    public function index()
    {
        return view('admin.gallery-image.index',[
            'images' => GalleryImage::latest()->paginate(config('khc.pagination')),
        ]);
    }

    public function create()
    {
        return view('admin.gallery-image.create',[
            'maxFileSize' => GalleryImage::$maxFileSize,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'filename' => ['required','image','max:' . GalleryImage::$maxFileSize,new Filetype(['jpg','png'])],
            'title' => ['required','string','max:255',new Xss],
        ]);
        $galleryImage = GalleryImage::create([
            'title' => $validated['title'],
        ]);
        $galleryImage->saveImage($request->file('filename'));
        return redirect()->route('admin.gallery-image.create')->with('success', 'Image uploaded successfully.');
    }

    public function destroy(GalleryImage $galleryImage)
    {
        $galleryImage->delete();
        return redirect()->route('admin.gallery-image.index')->with('success', 'Image deleted successfully.');
    }
}
