@extends('layouts.portal')
@section('content')

<div class="container site-main">
  <div class="mb-4">
    <h2 class="mb-1 fw-bold">Legal Committee</h2>
    <p class="text-muted mb-0">Legal Committee Members of Gauhati High Court Kohima Bench</p>
  </div>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($legalCommittees as $legalCommittee)
    <div class="col">
      <div class="card h-100 shadow-sm border-0">
        <div class="text-center pt-4">
          <img src="{{ $legalCommittee->photo ? $legalCommittee->photoUrl() : asset('images/blank-avatar.jpg') }}" alt="{{ $legalCommittee->full_name }}" class="rounded" style="width: 140px; height: 175px; object-fit: cover;">
        </div>
        <div class="card-body text-center">
          <h5 class="card-title fw-semibold mb-2" style="font-size: 1rem;">{{ $legalCommittee->full_name }}</h5>
          <p class="card-text text-muted small mb-0">
            <i class="bi bi-briefcase me-1"></i>{{ $legalCommittee->designation }}
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  @if($legalCommittees->isEmpty())
  <div class="text-center py-5">
    <div class="text-muted">
      <i class="bi bi-people fs-1 mb-3 d-block"></i>
      <p>No legal committee members found.</p>
    </div>
  </div>
  @endif
</div>

@endsection