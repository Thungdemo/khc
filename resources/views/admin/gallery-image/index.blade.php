@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Gallery</h4>
        <a class="btn btn-primary" href="{{route('admin.gallery-image.create')}}">Add</a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row chocolat-parent">
                @forelse ($images as $image)
                <div class="col-md-3 mb-4">
                    <a class="chocolat-image" href="{{ $image->imageUrl() }}" title="{{$image->title}}">
                        <img src="{{ $image->imageUrl() }}" class="img-thumbnail w-100" alt="{{ $image->title }}" style="height: 200px; object-fit: cover;">
                    </a>
                    <div class="mt-2">{{ $image->title }}</div>
                    <form action="{{ route('admin.gallery-image.destroy', $image) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-end">Delete</button>
                    </form>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center">No images found.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    {{ $images->withQueryString()->links() }}
@endsection