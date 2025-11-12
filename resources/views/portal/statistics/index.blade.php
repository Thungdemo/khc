@extends('layouts.portal')
@section('content')
<div class="container site-main">
    <div class="mb-4">
		<h2 class="mb-1 fw-bold">Statement of Gauhati High Court Kohima Bench</h2>
	</div>

    <!-- Statistics Grid -->
    <div class="row g-4">
        @foreach($years as $year => $statistics)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
                <!-- Year Header -->
                <div class="card-header bg-dark text-white text-center py-2">
                    <h6 class="mb-0 fw-bold">
                        <i class="bi bi-calendar-year me-2"></i>{{ $year }}
                    </h6>
                </div>
                
                <!-- Statistics List -->
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach($statistics as $statistic)
                        <a href="{{ $statistic->documentUrl() }}" 
                           class="list-group-item list-group-item-action d-flex align-items-center justify-content-between py-2 px-3" 
                           target="_blank">
                            <span class="fw-medium">
                                <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                                {{ $statistic->month_name }}
                            </span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection