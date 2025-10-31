@extends('layouts.portal')
@section('content')
<div class="banner-full-width">
	<div class="banner-row">
		<!-- Banner section - 80% width -->
		<div class="banner-section">
			<img src="{{asset('images/banner.png')}}" alt="banner" class="banner-image">
		</div>
		
		<!-- Profile section - 20% width -->
		<div class="profile-section">
			<div class="profile-card">
				<div class="profile-image-container">
					<img src="https://kohimahighcourt.gov.in/JudgesProfile/Rajesh_Mazumdar1.jpg" alt="judge" class="profile-image">
				</div>
				<div class="profile-info">
					<div class="profile-name">Sri Justice Dhiraj Singh Thakur</div>
					<div class="profile-title">The Hon'ble The Chief Justice</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Navigation buttons at bottom of banner -->
	<div class="banner-nav-buttons">
		<div class="nav-buttons-row">
				<a href="{{config('links.causelist_local')}}" class="nav-button" target="_blank">
					<div class="nav-button-icon">
						<i class="bi bi-journal-text"></i>
					</div>
					<span class="nav-button-text">Cause List</span>
				</a>
				<a href="{{config('links.display_board')}}" class="nav-button" target="_blank">
					<div class="nav-button-icon">
						<i class="bi bi-display"></i>
					</div>
					<span class="nav-button-text">Display Board</span>
				</a>
				<a href="#" class="nav-button">
					<div class="nav-button-icon">
						<i class="bi bi-people"></i>
					</div>
					<span class="nav-button-text">Roster</span>
				</a>
				<a href="{{route('portal.notice.index')}}" class="nav-button">
					<div class="nav-button-icon">
						<i class="bi bi-bell"></i>
					</div>
					<span class="nav-button-text">Notice</span>
				</a>
				<a href="{{config('links.case_status')}}" class="nav-button" target="_blank">
					<div class="nav-button-icon">
						<i class="bi bi-search"></i>
					</div>
					<span class="nav-button-text">APHC Case Status</span>
				</a>
				<a href="{{config('links.njdg')}}" class="nav-button" target="_blank">
					<div class="nav-button-icon">
						<i class="bi bi-grid-3x3-gap"></i>
					</div>
					<span class="nav-button-text">NJDG Case Status</span>
				</a>
			</div>
	</div>
</div>
<main class="container site-main">

	<div class="card-wrap p-3">
		<div class="d-flex justify-content-between align-items-start">
			<h4 class="mb-3 fw-bold">Latest News & Updates</h4>
		</div>
		<div id="newsCarousel" class="carousel slide news-carousel" data-bs-ride="carousel">
			<div class="carousel-inner">
				@foreach($latestNews->chunk(3) as $items)
				<div class="carousel-item {{$loop->first?'active':''}}">
					<div class="row g-3">
						@foreach($items as $item)
						<div class="col-md-4">
							<div class="news-item">
								<div class="small text-muted mb-1">
									<i class="bi bi-calendar3 me-2"></i>{{\App\Helpers\DateHelper::display($item->published_at)}}
								</div>
								<div class="fw-bold"><a class="notif-link" href="{{$item->documentUrl()}}" target="_blank">{{$item->title}}</a></div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				@endforeach
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
	<div class="card-wrap p-3">
		<h4 class="fw-bold">Notice Board</h4>
		<ul class="nav nav-tabs mt-3 mb-2" role="tablist">
			@foreach($noticeCategories as $noticeCategory)
			<li class="nav-item"><button class="nav-link {{$loop->first?'active':''}}" data-bs-toggle="tab" data-bs-target="#{{$noticeCategory->id}}-tab">{{$noticeCategory->name}}</button></li>
			@endforeach
		</ul>
		<div class="tab-content">
			@foreach($noticeCategories as $noticeCategory)
			<div class="tab-pane {{$loop->first?'show active':''}}" id="{{$noticeCategory->id}}-tab">
				<ul class="list-group list-notif">
					@forelse($noticeCategory->notices()->published()->newest()->limit(5)->get() as $notice)
					<li class="list-group-item d-flex align-items-center">
						<div class="icon"><i class="bi bi-file-earmark-text-fill"></i></div>
						<div class="flex-grow-1">
							<a class="notif-link" href="{{$notice->documentUrl()}}" target="_blank">{{$notice->title}}</a>
						</div>
						<div class="text-muted">{{\App\Helpers\DateHelper::display($notice->published_at)}}</div>
					</li>
					@empty
					@endforelse
				</ul>
				<div class="text-end mt-2">
					<a href="{{route('portal.notice.index',$noticeCategory)}}" class="link-primary small">View more</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- Videos section (added below Notifications) -->
	
	<div class="card-wrap p-3">
		<h4 class="fw-bold mb-3">Youtube Channel</h4>
		<div class="row g-3">
			<div class="col-md-4">
				<div class="video-card">
					<div class="video-embed">
						<!-- Replace the video ID below with the desired YouTube video -->
						<iframe src="https://www.youtube.com/embed/v-ZbzsO3Grc" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="video-card">
					<div class="video-embed">
						<iframe src="https://www.youtube.com/embed/WdwKDzIsKj8" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="video-card">
					<div class="video-embed">
						<iframe src="https://www.youtube.com/embed/Qf3_IMV_4A8" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- App download callout -->
	<section class="app-downloads mt-4 mb-4">
		<div class="card-wrap">
			<div class="download-box d-flex align-items-center justify-content-between gap-3">
				<div class="download-text text-start">
					<div class="small text-muted">Download</div>
					<div class="h5 mb-0 fw-bold">eCourts services app</div>
					<div class="text-muted" style="font-size:0.9rem;">Get the mobile app for case status, cause lists and notifications</div>
				</div>
				<div class="download-buttons d-flex gap-2">
					<a class="btn btn-store btn-play d-inline-flex align-items-center" href="#" aria-label="Get it on Google Play">
						<i class="bi bi-phone me-2"></i>
						<div class="d-none d-sm-block">Get it on<br><strong>Google Play</strong></div>
					</a>
					<a class="btn btn-store btn-apple d-inline-flex align-items-center" href="#" aria-label="Download on the App Store">
						<i class="bi bi-apple me-2"></i>
						<div class="d-none d-sm-block">Download on the<br><strong>App Store</strong></div>
					</a>
				</div>
			</div>
		</div>
	</section>
</main>
@endsection