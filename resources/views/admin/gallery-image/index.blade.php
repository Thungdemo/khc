@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Gallery</h4>
        <a class="btn btn-primary btn-sm" href="{{route('admin.gallery-image.create')}}">Add</a>
    </div>
    <div class="row">
        @forelse ($images as $image)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $image->imageUrl() }}" class="card-img-top" alt="{{ $image->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $image->title }}</h5>
                        <form action="{{ route('admin.gallery-image.destroy', $image) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm float-end">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No images found.</p>
            </div>
        @endforelse
    </div>
    {{ $images->withQueryString()->links() }}
@endsection