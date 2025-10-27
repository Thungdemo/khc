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
  <div class="gallery-grid row g-3">
    @php
      // Sample gallery data with stock images
      $images = [
        ['id' => 1, 'title' => 'High Court Building', 'date' => 'Oct 20, 2025', 'url' => 'https://picsum.photos/800/600?random=1'],
        ['id' => 2, 'title' => 'Court Room Session', 'date' => 'Oct 18, 2025', 'url' => 'https://picsum.photos/800/600?random=2'],
        ['id' => 3, 'title' => 'Justice Ceremony', 'date' => 'Oct 15, 2025', 'url' => 'https://picsum.photos/800/600?random=3'],
        ['id' => 4, 'title' => 'Legal Conference', 'date' => 'Oct 12, 2025', 'url' => 'https://picsum.photos/800/600?random=4'],
        ['id' => 5, 'title' => 'Judicial Oath Taking', 'date' => 'Oct 10, 2025', 'url' => 'https://picsum.photos/800/600?random=5'],
        ['id' => 6, 'title' => 'Court Library', 'date' => 'Oct 8, 2025', 'url' => 'https://picsum.photos/800/600?random=6'],
        ['id' => 7, 'title' => 'Annual Function', 'date' => 'Oct 5, 2025', 'url' => 'https://picsum.photos/800/600?random=7'],
        ['id' => 8, 'title' => 'Judges Meeting', 'date' => 'Oct 3, 2025', 'url' => 'https://picsum.photos/800/600?random=8'],
        ['id' => 9, 'title' => 'Court Premises', 'date' => 'Sep 28, 2025', 'url' => 'https://picsum.photos/800/600?random=9'],
        ['id' => 10, 'title' => 'Inauguration Event', 'date' => 'Sep 25, 2025', 'url' => 'https://picsum.photos/800/600?random=10'],
        ['id' => 11, 'title' => 'Bar Association Event', 'date' => 'Sep 20, 2025', 'url' => 'https://picsum.photos/800/600?random=11'],
        ['id' => 12, 'title' => 'Republic Day Celebration', 'date' => 'Sep 15, 2025', 'url' => 'https://picsum.photos/800/600?random=12'],
      ];
    @endphp

    @foreach($images as $image)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="gallery-item">
          <div class="gallery-img-wrap">
            <img src="{{ $image['url'] }}" alt="{{ $image['title'] }}" class="gallery-img">
            <div class="gallery-overlay">
              <i class="bi bi-zoom-in"></i>
            </div>
          </div>
          <div class="gallery-caption">
            <h6 class="mb-1">{{ $image['title'] }}</h6>
            <small class="text-muted">{{ $image['date'] }}</small>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Pagination -->
  <nav aria-label="Gallery pagination" class="mt-4">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
</div>

<style>
  .gallery-item {
    cursor: pointer;
    transition: transform 0.2s ease;
  }
  .gallery-item:hover {
    transform: translateY(-4px);
  }
  .gallery-img-wrap {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    background: #f0f4f8;
    aspect-ratio: 4/3;
  }
  .gallery-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
  }
  .gallery-item:hover .gallery-img {
    transform: scale(1.05);
  }
  .gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(7, 23, 50, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }
  .gallery-overlay i {
    color: #fff;
    font-size: 2rem;
  }
  .gallery-item:hover .gallery-overlay {
    opacity: 1;
  }
  .gallery-caption {
    padding: 12px 8px 8px;
  }
  .gallery-caption h6 {
    font-size: 0.95rem;
    font-weight: 600;
    color: #0b1e2f;
    margin-bottom: 4px;
  }
  @media (max-width: 576px) {
    .gallery-img-wrap {
      aspect-ratio: 1;
    }
  }
</style>

@endsection