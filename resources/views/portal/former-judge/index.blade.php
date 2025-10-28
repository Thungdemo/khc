@extends('layouts.portal')
@section('content')

<div class="container site-main">
  <div class="mb-4">
    <h2 class="mb-1 fw-bold">Former Judges of Kohima Bench</h2>
    <p class="text-muted mb-0">Former Portfolio Judges in Chronological Order</p>
  </div>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($formerJudges as $formerJudge)
    <div class="col">
      <div class="card h-100 shadow-sm border-0">
        <div class="text-center pt-4">
          <img src="{{ $formerJudge->photo ? $formerJudge->photoUrl() : asset('images/blank-avatar.jpg') }}" alt="{{ $formerJudge->full_name }}" class="rounded" style="width: 140px; height: 175px; object-fit: cover;">
        </div>
        <div class="card-body text-center">
          <h5 class="card-title fw-semibold mb-2" style="font-size: 1rem;">{{ $formerJudge->full_name }}</h5>
          <p class="card-text text-muted small mb-0">
            <i class="bi bi-calendar me-1"></i>{{ $formerJudge->getTenure() }}
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection