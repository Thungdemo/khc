@extends('layouts.portal')
@section('content')
<div class="container site-main">
    <div class="mb-4">
        <h2 class="mb-1 fw-bold">Station Judges</h2>
        <p class="hc-text-muted mb-0">Gauhati High Court Kohima Bench</p>
    </div>
    
    @foreach($judges as $judge)
    <div class="card-wrap mb-4 p-4">
        <div class="row g-4">

            <div class="col-md-3 col-lg-2">
                <div class="judge-photo-wrap">
                    <img src="{{ $judge->photoUrl() }}" 
                         alt="{{ $judge->full_name }}" 
                         class="judge-photo">
                </div>
            </div>

            <div class="col-md-9 col-lg-10">

                <div class="judge-header mb-3">
                    <h5 class="fw-bold mb-1">{{ $judge->full_name }}</h5>
                    <div class="hc-text-muted">{{ $judge->parent_court }}</div>
                </div>

                <table class="table table-sm judge-table">
                    <tbody>

                        @if($judge->dob)
                        <tr>
                            <td class="label-col"><i class="bi bi-calendar3 me-2"></i>Date of Birth</td>
                            <td>{{ $judge->dob }}</td>
                        </tr>
                        @endif

                        <tr>
                            <td class="label-col"><i class="bi bi-briefcase me-2"></i>Date of Elevation</td>
                            <td>{{ $judge->elevation_date }}</td>
                        </tr>

                        <tr>
                            <td class="label-col"><i class="bi bi-geo-alt me-2"></i>Stationing</td>
                            <td>{{ $judge->stationing }}</td>
                        </tr>

                        <tr>
                            <td class="label-col"><i class="bi bi-check-circle me-2"></i>Stream</td>
                            <td>{{ $judge->stream }}</td>
                        </tr>

                    </tbody>
                </table>

                @if($judge->biography)
                <div class="judge-bio">
                    <h6 class="fw-semibold mb-2">Biography</h6>
                    <p class="hc-text-muted mb-0">{{ $judge->biography }}</p>
                </div>
                @endif

            </div>

        </div>
    </div>
    @endforeach
</div>
@endsection
