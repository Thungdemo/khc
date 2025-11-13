@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Add Images to Album: {{ $album->title }}</h4>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.album.gallery-images.store', $album) }}" class="confirm-submit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Image *</label>
                            <div class="imgp-preview">
                                <img id="image-preview" style="max-height: 200px;">
                            </div>
                            <input type="file" class="form-control imgp-input" data-target="#image-preview" name="filename" accept="image/*" required>
                            <span class="text-danger small">@error('filename') {{ $message }} @enderror</span>
                            <span class="form-text small text-muted">Allowed files: jpg, png, webp. Max size: {{ $maxFileSize }} KB</span>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cover_image" name="cover_image" value="1">
                                <label class="form-check-label" for="cover_image">
                                    Set as album cover
                                </label>
                            </div>
                            <div class="form-text small text-muted">This image will be used as the main cover for this album</div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.album.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <div class="row chocolat-parent">
                @forelse ($images as $image)
                <div class="col-md-3 mb-4">
                    <div class="position-relative">
                        <a class="chocolat-image" href="{{ $image->imageUrl() }}">
                            <img src="{{ $image->imageUrl() }}" class="img-thumbnail w-100" style="height: 200px; object-fit: cover;">
                        </a>
                        @if($image->cover_image)
                            <span class="position-absolute top-0 end-0 badge bg-primary">Album Cover</span>
                        @endif
                    </div>
                    <div class="d-flex gap-2 mt-2">
                        @if(!$image->cover_image)
                            <form action="{{ route('admin.album.gallery-images.set-cover', [$album, $image]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-primary btn-sm">Set Cover</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.album.gallery-images.destroy', [$album, $image]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center">No images found.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection