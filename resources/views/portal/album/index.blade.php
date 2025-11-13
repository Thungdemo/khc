@extends('layouts.portal')
@section('content')

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="mb-1 fw-bold">Gallery</h2>
      <p class="text-muted mb-0">Browse through our collection of images</p>
    </div>
    {{-- <div class="btn-group" role="group" aria-label="View mode">
      <button type="button" class="btn btn-outline-secondary active" data-view="grid">
        <i class="bi bi-grid-3x3-gap"></i>
      </button>
      <button type="button" class="btn btn-outline-secondary" data-view="list">
        <i class="bi bi-list"></i>
      </button>
    </div> --}}
  </div>

  <!-- Gallery Grid -->
  <div class="row g-4" id="my-gallery">
    @foreach($galleryImages as $galleryImage)
      <div class="col-lg-4 col-sm-6 mb-4 chocolat-parent">
          <a class="figure chocolat-image text-decoration-none" href="{{ $galleryImage->imageUrl() }}" >
            <img src="{{ $galleryImage->imageUrl() }}" class="img-thumbnail" alt="{{ $galleryImage->title }}">
            
            <div class="gallery-caption mt-1">{{$galleryImage->title}}</div>
          </a>
      </div>
    @endforeach
  </div>
</div>
@endsection