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
				<div class="d-flex gap-2 align-items-end">
					<div class="flex-grow-1">
						<label for="search" class="form-label small fw-semibold mb-1">Search Notices</label>
						<input type="text" name="title" id="search" class="form-control" placeholder="Search by title or keywords..." value="{{request('title')}}">
					</div>
					<button type="submit" class="btn btn-primary">
						<i class="bi bi-search"></i> Search
					</button>
					<a class="btn btn-secondary" href="{{route('portal.notice.index',$noticeCategory)}}">
						<i class="bi bi-arrow-counterclockwise"></i> Clear
					</a>
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
					<table class="table table-bordered mt-4" style="font-size: 0.95rem">
						<thead class="table-light">
							<tr>
								<th>Title</th>
								<th>Category</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							@forelse($notices as $notice)
								<tr>
									<td>
											<div>
												<a class="notif-link" href="{{ $notice->documentUrl() }}" target="_blank">{{ $notice->title }}</a>
												@foreach($notice->noticeChildren as $child)
													<span class="text-muted">&nbsp;•&nbsp;</span>
													<a class="notif-link" href="{{ $child->documentUrl() }}" target="_blank">{{ $child->title }}</a>
												@endforeach
											</div>
									</td>
									<td>{{ $notice->noticeSubcategory?->name }}</td>
									<td class="text-nowrap"><span class="hc-text-muted">{{ \App\Helpers\DateHelper::display($notice->published_at) }}</span></td>
								</tr>
							@empty
								<tr>
									<td colspan="3" class="text-center">No notices found.</td>
								</tr>
							@endforelse
						</tbody>
					</table>
					<div class="text-end mt-4">
						{{ $notices->withQueryString()->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
