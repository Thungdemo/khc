@extends('layouts.portal')
@section('content')

<div class="container site-main">
  <div class="mb-4">
    <h2 class="mb-1 fw-bold">Station Judges</h2>
    <p class="text-muted mb-0">Gauhati High Court Kohima Bench</p>
  </div>

  <!-- Judges Cards -->
  @php
    $judges = [
      [
        'name' => 'Hon\'ble Mrs. Justice Yarenjungla Longkumer',
        'title' => 'Station Judge',
        'image' => 'https://kohimahighcourt.gov.in/JudgesProfile/Yarenjungla-Longkumer.jpg',
        'born' => '15th January, 1968',
        'appointed' => '17th February, 2025',
        'portfolio' => 'Dimapur, Kiphire, Kohima, Mon, Phek & Zunheboto Districts of Nagaland',
        'bio' => 'Born on 15th January, 1968 at Kohima, Nagaland. Did her matriculation in the year 1983 from Little Flower School, Kohima, obtained BA (Hons) from Lady Shri Ram College, New Delhi in the year 1988. After completing LLB from Campus Law Center Delhi in the year 1992, she enrolled in the Bar Council of North East on 03.11.1992 under Gauhati High Court. Joined Government panel as Junior Govt. Advocate in the year 1996, worked as Jr. Govt. Advocate, Additional Sr. Govt. Advocate and Sr. Govt. Advocate. She was recruited as District and Session Judge Kohima on 10.04.2013, and thereafter, served as Special Judge Lokayukta, Sessions Judge Dimapur (twice), Registrar Kohima Bench and Secretary Judicial Law Department Govt. of Nagaland. Appointed as Additional Judge of the Gauhati High Court on 17th February, 2025. She is the first Lady amongst the Nagas to be appointed as the Judge of the High Court.',
      ],
      [
        'name' => 'Hon\'ble Mr. Justice Rajesh Mazumdar',
        'title' => 'Station Judge',
        'image' => 'https://kohimahighcourt.gov.in/JudgesProfile/Rajesh_Mazumdar1.jpg',
        'born' => null,
        'appointed' => '30th July, 2025',
        'portfolio' => 'Longleng, Mokokchung, Peren, Tuensang & Wokha Districts of Nagaland',
        'bio' => null,
        'highlight' => null
      ]
    ];
  @endphp

  <div class="judges-list">
    @foreach($judges as $judge)
    <div class="judge-card mb-4">
      <div class="row g-4">
        <div class="col-md-3 col-lg-2">
          <div class="judge-photo-wrap">
            <img src="{{ $judge['image'] }}" alt="{{ $judge['name'] }}" class="judge-photo">
          </div>
        </div>
        <div class="col-md-9 col-lg-10">
          <div class="judge-header mb-3">
            <h4 class="judge-name mb-1">{{ $judge['name'] }}</h4>
            <div class="judge-title">{{ $judge['title'] }}</div>
          </div>

          <table class="table table-sm judge-table">
            <tbody>
              @if($judge['born'])
              <tr>
                <td class="label-col"><i class="bi bi-calendar3 me-2"></i>Date of Birth</td>
                <td>{{ $judge['born'] }}</td>
              </tr>
              @endif
              <tr>
                <td class="label-col"><i class="bi bi-briefcase me-2"></i>Date of Appointment</td>
                <td>{{ $judge['appointed'] }}</td>
              </tr>
              <tr>
                <td class="label-col"><i class="bi bi-geo-alt me-2"></i>District Portfolio</td>
                <td>{{ $judge['portfolio'] }}</td>
              </tr>
            </tbody>
          </table>

          @if($judge['bio'])
          <div class="judge-bio">
            <h6 class="fw-semibold mb-2">Biography</h6>
            <p class="text-muted mb-0">{{ $judge['bio'] }}</p>
          </div>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection