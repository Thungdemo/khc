@extends('layouts.portal')
@section('content')
	<div class="container site-main">
		<div class="mb-4">
			<h2 class="mb-1 fw-bold">Notice Board</h2>
			<p class="text-muted mb-0">Browse official notices, circulars, tenders and announcements</p>
		</div>
		<!-- Filter Section -->
		<div class="mb-4">
			<form method="GET" action="{{ route('portal.notice.index',$noticeCategory) }}">
				<div class="row align-items-end g-2">
					<div class="col-12 col-md-4">
						<input type="text" name="title" id="search" class="form-control" placeholder="Search by title or keywords..." value="{{request('title')}}">
					</div>
					@if(count($noticeSubCategories) > 0)
					<div class="col-12 col-md-3">
						<x-select :options="$noticeSubCategories" name="notice_subcategory_id" class="form-select" placeholder="All Categories" :selected="request('notice_subcategory_id')" />
					</div>
					@endif
					<div class="col-12 col-md-4">
						<button type="submit" class="btn btn-primary">
							<i class="bi bi-search"></i> Search
						</button>
						<a class="btn btn-secondary" href="{{route('portal.notice.index',$noticeCategory)}}">
							<i class="bi bi-arrow-counterclockwise"></i> Clear
						</a>
					</div>
				</div>
			</form>
		</div>
		<!-- Tabbed Notice Layout -->
		<div class="card-wrap p-3">
			{{-- 
			<h4 class="fw-bold">Notice Board</h4>
			--}}
			<ul class="nav nav-tabs mt-3 mb-2" role="tablist">
				@foreach($noticeCategories as $item)
					<li class="nav-item">
						<a class="nav-link {{$item->id==$noticeCategory->id ? 'active' : ''}}" href="{{route('portal.notice.index',$item)}}">{{$item->name}}</a>
					</li>
				@endforeach
			</ul>
			<div class="tab-content">
				<div class="tab-pane show active" id="content-general" role="tabpanel">
					<ul class="list-group list-notif">
						@forelse($notices as $notice)
							<li class="list-group-item d-flex align-items-start py-1">
								{{-- <div class="pe-2">
									<img src="{{asset('images/pdf.svg')}}" alt="PDF" class="pdf-icon">
								</div> --}}
								{{-- <div class="icon"><i class="bi bi-file-earmark-pdf-fill"></i></div> --}}
								<div class="flex-grow-1">
									<div class="d-flex justify-content-between align-items-start">
										<div class="flex-grow-1 me-3">
											<a class="notif-link" href="{{ $notice->noticeUrl() }}" target="_blank">
												<div class="icon"><i class="bi {{$notice->url ? 'bi-link-45deg' : 'bi-file-pdf'}}"></i></div>
												{{ $notice->title }}
											</a>
											@foreach($notice->noticeChildren as $child)
												<span class="text-muted">&nbsp;•&nbsp;</span>
												<a class="notif-link" href="{{ $child->documentUrl() }}" target="_blank">{{ $child->title }}</a>
											@endforeach
											<div class="post-date mt-1 mb-0">{{ \App\Helpers\DateHelper::display($notice->published_at) }}</div>
										</div>
										@if($notice->noticeSubcategory)
											<span class="badge bg-light text-dark border">{{ $notice->noticeSubcategory->name }}</span>
										@endif
									</div>
								</div>
							</li>
						@empty
							<li class="list-group-item text-center py-5">
								<div class="text-muted">
									<i class="bi bi-file-text fs-1 mb-3 d-block"></i>
									No notices found.
								</div>
							</li>
						@endforelse
					</ul>
					<div class="text-end mt-4">
						{{ $notices->withQueryString()->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
