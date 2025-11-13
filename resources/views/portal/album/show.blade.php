@extends('layouts.portal')
@section('content')

<div class="container py-4">
  <!-- Album Header -->
  <div class="mb-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('portal.album.index') }}">Albums</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $album->title }}</li>
      </ol>
    </nav>
    
    <div class="d-flex justify-content-between align-items-start">
      <div>
        <h2 class="mb-2 fw-bold">{{ $album->title }}</h2>
        @if($album->description)
          <p class="text-muted mb-3">{{ $album->description }}</p>
        @endif
        <div class="d-flex align-items-center text-muted">
          <i class="bi bi-images me-2"></i>
          <span>{{ $album->galleryImages->count() }} {{ Str::plural('photo', $album->galleryImages->count()) }}</span>
        </div>
      </div>
      <a href="{{ route('portal.album.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Back to Albums
      </a>
    </div>
  </div>

  <!-- Photos Grid -->
  @if($album->galleryImages->count() > 0)
    <div class="row g-3" id="album-gallery">
      @foreach($album->galleryImages as $image)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3 chocolat-parent">
          <a class="figure chocolat-image text-decoration-none" href="{{ $image->imageUrl() }}">
            <div class="position-relative">
              <img src="{{ $image->imageUrl() }}" class="img-fluid rounded" style="height: 200px; width: 100%; object-fit: cover;" alt="{{ $image->title ?: 'Gallery Image' }}">
              @if($image->cover_image)
                <span class="position-absolute top-0 end-0 m-2">
                  <i class="bi bi-star-fill text-warning" title="Album Cover"></i>
                </span>
              @endif
            </div>
            @if($image->title)
              <div class="text-center mt-2">
                <small class="text-muted">{{ $image->title }}</small>
              </div>
            @endif
          </a>
        </div>
      @endforeach
    </div>
  @else
    <div class="text-center py-5">
      <i class="bi bi-images display-1 text-muted mb-3"></i>
      <h4 class="text-muted">No Photos in This Album</h4>
      <p class="text-muted">This album is currently empty.</p>
      <a href="{{ route('portal.album.index') }}" class="btn btn-primary">Browse Other Albums</a>
    </div>
  @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize chocolat for image gallery
    if (typeof Chocolat !== 'undefined' && document.querySelector('.chocolat-image')) {
        Chocolat(document.querySelectorAll('.chocolat-image'), {
            loop: true,
            imageSize: 'contain',
            fullScreen: true
        });
    }
});
</script>
@endpush

@endsection