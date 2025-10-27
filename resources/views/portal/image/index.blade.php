@extends('layouts.portal')
@section('content')

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="mb-1 fw-bold">Gallery</h2>
      <p class="text-muted mb-0">Browse through our collection of images</p>
    </div>
    <div class="btn-group" role="group" aria-label="View mode">
      <button type="button" class="btn btn-outline-secondary active" data-view="grid">
        <i class="bi bi-grid-3x3-gap"></i>
      </button>
      <button type="button" class="btn btn-outline-secondary" data-view="list">
        <i class="bi bi-list"></i>
      </button>
    </div>
  </div>

  <!-- Gallery Grid -->
  <div class=row g-3" id="my-gallery">
    @php
      // Sample gallery data with stock images
      $images = [
        ['id' => 1, 'title' => 'High Court Building', 'date' => 'Oct 20, 2025', 'url' => 'https://kohimahighcourt.gov.in/gallery/album47_1.png'],
        ['id' => 2, 'title' => 'Court Room Session', 'date' => 'Oct 18, 2025', 'url' => 'https://kohimahighcourt.gov.in/gallery/album46_1.png'],
      ];
    @endphp

    @foreach($images as $image)
      <div class="col-lg-4 col-md-4 col-sm-6 chocolat-parent">
          <a class="figure chocolat-image" href="{{ $image['url'] }}" >
            <img src="{{ $image['url'] }}" class="img-thumbnail" alt="{{ $image['title'] }}">
            
            <div class="text-center text-muted mt-2">{{$image['title']}}</div>
          </a>
      </div>
    @endforeach
  </div>
</div>
@endsection