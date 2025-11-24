@extends('layouts.portal')
@section('content')
<div class="container site-main">
    <div class="mb-4">
        <h2 class="mb-1 fw-bold">Activities</h2>
        <p class="text-muted mb-0">Recent activities and events</p>
    </div>
    <div class="row g-4">
        @forelse($activities as $activity)
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('portal.activity.show', $activity) }}" class="activity-card">
                <div class="activity-image">
                    <img src="{{ $activity->photoUrl() }}" alt="{{ $activity->title }}" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="p-3">
                    <div class="post-date mb-2">
                        <i class="bi bi-calendar3 me-2"></i>
                        {{ \App\Helpers\DateHelper::display($activity->published_at) }}
                    </div>
                    <h6 class="activity-title">{{ $activity->title }}</h6>
                    <p class="activity-description">
                        {{ Str::limit(strip_tags($activity->description), 100) }}
                    </p>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <div class="text-muted">
                    <i class="bi bi-calendar-event fs-1 mb-3 d-block"></i>
                    <p class="mb-0">No activities found.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $activities->withQueryString()->links() }}
    </div>
</div>
@endsection