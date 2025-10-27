@extends('layouts.portal')
@section('content')

<div class="container site-main">
  <div class="mb-4">
    <h2 class="mb-1 fw-bold">Former Judges of Kohima Bench</h2>
    <p class="text-muted mb-0">Former Portfolio Judges in Chronological Order</p>
  </div>

  @php
    $formerJudges = [
      [
        'name' => 'Hon\'ble Mr. Justice Kakheto Sema',
        'tenure' => '13th October 2021 - 5th July 2025',
        'image' => 'https://kohimahighcourt.gov.in/JudgesProfile/KakhetoSema-1.jpg'
      ],
      [
        'name' => 'Hon\'ble Mr. Justice Budi Habung',
        'tenure' => '12th September 2023 - 30th July 2025',
        'image' => 'https://kohimahighcourt.gov.in/JudgesProfile/Budi_Habung-1.jpeg'
      ],
      [
        'name' => 'Hon\'ble Mr. Justice Kardak Ete',
        'tenure' => '13th March 2023 - 12th September 2023',
        'image' => 'https://kohimahighcourt.gov.in/JudgesProfile/Kardak-Ete2.jpg'
      ]
    ];
  @endphp

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach($formerJudges as $judge)
    <div class="col">
      <div class="card h-100 shadow-sm border-0">
        <div class="text-center pt-4">
          <img src="{{ $judge['image'] }}" alt="{{ $judge['name'] }}" class="rounded" style="width: 140px; height: 175px; object-fit: cover;">
        </div>
        <div class="card-body text-center">
          <h5 class="card-title fw-semibold mb-2" style="font-size: 1rem;">{{ $judge['name'] }}</h5>
          <p class="card-text text-muted small mb-0">
            <i class="bi bi-calendar-range me-1"></i>{{ $judge['tenure'] }}
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection