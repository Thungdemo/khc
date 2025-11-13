@extends('layouts.portal')
@section('content')

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="mb-1 fw-semibold">Gallery</h2>
      {{-- <p class="text-muted mb-0">Browse through our photo albums</p> --}}
    </div>
  </div>

  <!-- Albums Grid -->
  <div class="row g-4">
    @forelse($albums as $album)
      <div class="col-lg-4 col-md-6 mb-4">
        <a class="card h-100 text-decoration-none" href="{{ route('portal.album.show', $album) }}">
          <div class="" style="height: 250px; overflow: hidden;">
            @if($album->coverImage)
              <img src="{{ $album->coverImage->imageUrl() }}" class="card-img-top h-100 w-100" style="object-fit: cover;" alt="{{ $album->title }}">
            @elseif($album->galleryImages->count() > 0)
              <img src="{{ $album->galleryImages->first()->imageUrl() }}" class="card-img-top h-100 w-100" style="object-fit: cover;" alt="{{ $album->title }}">
            @else
              <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                <i class="bi bi-images text-muted" style="font-size: 3rem;"></i>
              </div>
            @endif
          </div>
          <div class="card-body">
            <h6 class="card-title">{{ $album->title }}</h6>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">
                <i class="bi bi-images me-1"></i>{{ $album->galleryImages->count() }} {{ Str::plural('photo', $album->galleryImages->count()) }}
              </small>
            </div>
          </div>
        </a>
      </div>
    @empty
      <div class="col-12">
        <div class="text-center py-5">
          <i class="bi bi-collection display-1 text-muted mb-3"></i>
          <h4 class="text-muted">No Albums Found</h4>
          <p class="text-muted">There are currently no photo albums to display.</p>
        </div>
      </div>
    @endforelse
  </div>

  <!-- Pagination -->
  @if($albums->hasPages())
    <div class="d-flex justify-content-center mt-4">
      {{ $albums->links() }}
    </div>
  @endif
</div>
@endsection