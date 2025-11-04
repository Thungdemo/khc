@extends('layouts.portal')
@section('content')
<div class="container site-main">
	<div class="row g-4">
		<!-- Main Content -->
		<div class="col-lg-8">
			<article class="card shadow-sm border-0">
				@if($activity->photoUrl())
				<div class="activity-featured-image">
					<img src="{{ $activity->photoUrl() }}" alt="{{ $activity->title }}" class="card-img-top" style="height: 400px; object-fit: cover;">
				</div>
				@endif
				<div class="card-body p-4">
					<div class="post-date mb-3">
						<i class="bi bi-calendar3 me-1"></i>
						{{ \App\Helpers\DateHelper::display($activity->published_at) }}
					</div>
					<h3 class="mb-3 fw-bold">{{ $activity->title }}</h3>
					<div class="activity-content mb-4">
						{!! $activity->description !!}
					</div>
				</div>
			</article>
		</div>
		<!-- Sidebar -->
		<div class="col-lg-4">
			<!-- Related Activities -->
			@if($relatedActivities->count() > 0)
			<div class="card shadow-sm border-0">
				<div class="card-body p-4">
					<h6 class="fw-semibold mb-3">Related Activities</h6>
					<div class="list-group list-group-flush">
						@foreach($relatedActivities as $related)
						<a href="{{ route('portal.activity.show', $related) }}" class="list-group-item list-group-item-action border-0 px-0 py-3">
							<div class="d-flex">
								@if($related->photoUrl())
								<img src="{{ $related->photoUrl() }}" alt="{{ $related->title }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
								@endif
								<div class="flex-grow-1">
									<h6 class="mb-1 fw-semibold">{{ Str::limit($related->title, 60) }}</h6>
									<div class="post-date ">
									<i class="bi bi-calendar3 me-1"></i>
									{{ \App\Helpers\DateHelper::display($related->published_at) }}
									</div>
								</div>
							</div>
						</a>
						@endforeach
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection