@extends('layouts.portal')
@section('content')
<div class="bg-band">
    <div class="container site-main">
        <div class="mb-4">
            <h2 class="mb-1 fw-bold">Registry Officials</h2>
            {{-- <p class="text-muted mb-0">Former Portfolio Judges in Chronological Order</p> --}}
        </div>

        @foreach($levels as $registryOfficials)
        <div class="d-flex flex-wrap justify-content-evenly justify-content-lg-center gap-4">
            @foreach($registryOfficials as $registryOfficial)
            <div class="card-wrap" style="width: 240px;background: rgba(var(--card-bg-rgb, 255,255,255), 0.8);">
                <div class="text-center">
                    <img src="{{ $registryOfficial->photo ? $registryOfficial->photoUrl() : asset('images/blank-avatar.jpg') }}" 
                        alt="Registrar General" 
                        class="rounded img-fluid mb-2"
                        style="width: 120px; height: 140px; object-fit: cover;">
                    <div class="hc-text-muted fw-semibold">{{ $registryOfficial->designation }}</div>
                    <div class="fw-bold fs-6">{{ $registryOfficial->full_name }}</div>
                </div>
                <hr>
                <div class="hc-text-muted small">
                    <div><span class="fw-bold">Date of Birth:</span> {{ $registryOfficial->dob }}</div>
                    <div><span class="fw-bold">Qualification:</span> {{ $registryOfficial->qualification ?: 'N/A' }}</div>
                    <div>
                        <span class="fw-bold">Email:</span>
                        <span style="word-break: break-all;">
                            {{ str_replace(['@', '.'], ['[at]', '[dot]'], $registryOfficial->email) ?: 'N/A' }}
                        </span>
                    </div>
                    <div><span class="fw-bold">Phone:</span> {{ $registryOfficial->phone_no ?: 'N/A' }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @if(!$loop->last)
        <hr style="border: 1px solid var(--border-color)">
        @endif
        @endforeach
    </div>
</div>
@endsection