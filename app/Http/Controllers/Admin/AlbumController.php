<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Rules\Filetype;
use Illuminate\View\View;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AlbumController extends Controller
{
    /**
     * Display a listing of the albums.
     */
    public function index(): View
    {
        $albums = Album::withCount('galleryImages')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new album.
     */
    public function create(): View
    {
        return view('admin.album.create');
    }

    /**
     * Store a newly created album in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Album::create($validated);

        return redirect()
            ->route('admin.album.index')
            ->with('success', 'Album created successfully.');
    }

    /**
     * Show the form for editing the specified album.
     */
    public function edit(Album $album): View
    {
        return view('admin.album.edit', compact('album'));
    }

    /**
     * Update the specified album in storage.
     */
    public function update(Request $request, Album $album): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $album->update($validated);

        return redirect()
            ->route('admin.album.index')
            ->with('success', 'Album updated successfully.');
    }

    /**
     * Remove the specified album from storage.
     */
    public function destroy(Album $album): RedirectResponse
    {
        // Check if album has images
        if ($album->galleryImages()->count() > 0) {
            return redirect()
                ->route('admin.album.index')
                ->with('error', 'Cannot delete album that contains images. Please remove all images first.');
        }

        $album->delete();

        return redirect()
            ->route('admin.album.index')
            ->with('success', 'Album deleted successfully.');
    }

    public function galleryImagesCreate(Album $album): View
    {
        return view('admin.album.gallery-image-create', [
            'album' => $album,
            'images' => $album->galleryImages()->orderBy('created_at', 'desc')->get(),
            'maxFileSize' => GalleryImage::$maxFileSize,
        ]);
    }

    public function galleryImageStore(Request $request, Album $album)
    {
        $validated = $request->validate([
            'filename' => ['required','image','max:' . GalleryImage::$maxFileSize,new Filetype(['jpg','png','webp'])],
            'cover_image' => 'nullable|boolean',
        ]);
        
        $galleryImage = $album->galleryImages()->create();
        $galleryImage->saveImage($request->file('filename'));
        
        if ($request->has('cover_image') && $request->cover_image) {
            $album->galleryImages()->where('cover_image', true)->update(['cover_image' => false]);
            $galleryImage->update(['cover_image' => true]);
        }
        
        return redirect()->route('admin.album.gallery-images.create', $album)->with('success', 'Image uploaded successfully.');
    }

    public function galleryImageDestroy(Album $album, GalleryImage $galleryImage)
    {
        $galleryImage->delete();
        return redirect()->route('admin.album.gallery-images.create', $album)->with('success', 'Image deleted successfully.');
    }

    public function setCover(Album $album, GalleryImage $galleryImage)
    {
        $album->galleryImages()->update(['cover_image' => false]);
        
        $galleryImage->update(['cover_image' => true]);
        
        return redirect()->route('admin.album.gallery-images.create', $album)->with('success', 'Cover image updated successfully.');
    }
}
