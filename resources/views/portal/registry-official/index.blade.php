@extends('layouts.portal')
@section('content')
<div class="container site-main">
  <div class="mb-4">
    <h2 class="mb-1 fw-bold">Registry Officials</h2>
    {{-- <p class="text-muted mb-0">Former Portfolio Judges in Chronological Order</p> --}}
  </div>

    <!-- Level 1: Registrar General (Top Level) -->
    @foreach($levels as $registryOfficials)
    <div class="d-flex justify-content-center gap-3">
        @foreach($registryOfficials as $registryOfficial)
        <div class="card-wrap border" style="width: 260px;">
            <div class="text-center">
                <img src="{{ $registryOfficial->photo ? $registryOfficial->photoUrl() : asset('images/blank-avatar.jpg') }}" 
                     alt="Registrar General" 
                     class="rounded img-fluid mb-2"
                     style="width: 120px; height: 140px; object-fit: cover;">
                <div class="text-primary fw-semibold">{{ $registryOfficial->designation }}</div>
                <div class="fw-bold fs-6">{{ $registryOfficial->full_name }}</div>
            </div>
            <hr>
            <div class="hc-text-muted small">
                <div><span class="fw-bold">Date of Birth:</span> {{ $registryOfficial->dob }}</div>
                <div><span class="fw-bold">Qualification:</span> {{ $registryOfficial->qualification ?: 'N/A' }}</div>
                <div><span class="fw-bold">Email:</span> {{ $registryOfficial->email ?: 'N/A' }}</div>
                <div><span class="fw-bold">Phone:</span> {{ $registryOfficial->phone_no ?: 'N/A' }}</div>
            </div>
        </div>
        @endforeach
    </div>
    @if(!$loop->last)
    <hr class="border border-dark">
    @endif
    @endforeach
    
</div>
@endsection