@extends('layouts.portal')
@section('content')
<div class="row g-0">
	<div class="col-md-2 banner-menu-sidebar">
<div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
    Left-aligned but right aligned when large screen
  </button>
  <ul class="dropdown-menu dropdown-menu-lg-dropend">
    <li><button class="dropdown-item" type="button">Action</button></li>
    <li><button class="dropdown-item" type="button">Another action</button></li>
    <li><button class="dropdown-item" type="button">Something else here</button></li>
  </ul>
</div>
		
		<div class="quick-menu-vertical h-100 bg-dark">
			<div class="quick-menu-header text-center py-3 border-bottom border-secondary">
				<h6 class="text-white mb-0 fw-bold">Quick Access</h6>
			</div>
			<nav class="quick-menu-nav">
				<div class="quick-menu-item-wrapper">
					<a href="#" class="quick-menu-link">
						<i class="bi bi-search"></i>
						<span>Case Status</span>
						<i class="bi bi-chevron-left submenu-arrow"></i>
					</a>
					<div class="submenu-popup">
						<div class="submenu-header">Case Services</div>
						<a href="{{ config('links.case_status') }}" target="_blank">Search by Case Number</a>
						<a href="{{ config('links.case_status') }}" target="_blank">Search by Party Name</a>
						<a href="{{ config('links.case_status') }}" target="_blank">Case History</a>
						<a href="{{ config('links.case_status') }}" target="_blank">Next Date of Hearing</a>
					</div>
				</div>
				<div class="quick-menu-item-wrapper">
					<a href="{{ config('links.causelist_local') }}" class="quick-menu-link" target="_blank">
						<i class="bi bi-journal-text"></i>
						<span>Cause List</span>
						<i class="bi bi-chevron-left submenu-arrow"></i>
					</a>
					<div class="submenu-popup">
						<div class="submenu-header">Daily Lists</div>
						<a href="{{ config('links.causelist_local') }}" target="_blank">Today's Cause List</a>
						<a href="{{ config('links.causelist_local') }}" target="_blank">Tomorrow's List</a>
						<a href="{{ config('links.causelist_local') }}" target="_blank">Weekly Schedule</a>
						<a href="{{ config('links.causelist_local') }}" target="_blank">Court Calendar</a>
					</div>
				</div>
				
				<div class="quick-menu-item-wrapper">
					<a href="{{ config('links.display_board') }}" class="quick-menu-link" target="_blank">
						<i class="bi bi-display"></i>
						<span>Display Board</span>
						<i class="bi bi-chevron-left submenu-arrow"></i>
					</a>
					<div class="submenu-popup">
						<div class="submenu-header">Court Information</div>
						<a href="{{ config('links.display_board') }}" target="_blank">Live Court Status</a>
						<a href="{{ config('links.display_board') }}" target="_blank">Judge Availability</a>
						<a href="{{ config('links.display_board') }}" target="_blank">Court Timings</a>
						<a href="{{ config('links.display_board') }}" target="_blank">Important Notices</a>
					</div>
				</div>
				
				<div class="quick-menu-item-wrapper">
					<a href="{{ config('links.njdg') }}" class="quick-menu-link" target="_blank">
						<i class="bi bi-grid"></i>
						<span>NJDG</span>
						<i class="bi bi-chevron-left submenu-arrow"></i>
					</a>
					<div class="submenu-popup">
						<div class="submenu-header">Data & Analytics</div>
						<a href="{{ config('links.njdg') }}" target="_blank">Case Statistics</a>
						<a href="{{ config('links.njdg') }}" target="_blank">Performance Dashboard</a>
						<a href="{{ config('links.njdg') }}" target="_blank">Monthly Reports</a>
						<a href="{{ config('links.njdg') }}" target="_blank">Judicial Data</a>
					</div>
				</div>
				
				<div class="quick-menu-item-wrapper">
					<a href="{{ config('links.ecourts') }}" class="quick-menu-link" target="_blank">
						<i class="bi bi-globe"></i>
						<span>eCourts</span>
						<i class="bi bi-chevron-left submenu-arrow"></i>
					</a>
					<div class="submenu-popup">
						<div class="submenu-header">Online Services</div>
						<a href="{{ config('links.ecourts') }}" target="_blank">Case Filing</a>
						<a href="{{ config('links.ecourts') }}" target="_blank">Payment Gateway</a>
						<a href="{{ config('links.ecourts') }}" target="_blank">Document Upload</a>
						<a href="{{ config('links.ecourts') }}" target="_blank">Virtual Hearing</a>
					</div>
				</div>
				
				<div class="quick-menu-item-wrapper">
					<a href="{{ config('links.live_streaming') }}" class="quick-menu-link" target="_blank">
						<i class="bi bi-camera-video"></i>
						<span>Live Stream</span>
						<i class="bi bi-chevron-left submenu-arrow"></i>
					</a>
					<div class="submenu-popup">
						<div class="submenu-header">Live Proceedings</div>
						<a href="{{ config('links.live_streaming') }}" target="_blank">Current Hearings</a>
						<a href="{{ config('links.live_streaming') }}" target="_blank">Scheduled Streams</a>
						<a href="{{ config('links.live_streaming') }}" target="_blank">Recorded Sessions</a>
						<a href="{{ config('links.live_streaming') }}" target="_blank">Stream Guidelines</a>
					</div>
				</div>
			</nav>
		</div>
	</div>
	
	<div class="col-md-8 banner-full-width">
		<div class="banner-hero">
			<div class="hero-inner">
				<h1 class="hero-title">Gauhati High Court Kohima Bench</h1>
				<p class="hero-sub">Access case status, cause lists, notices and eServices in one place.</p>
				{{-- <div class="hero-cta">
					<a href="#" class="btn btn-hero">About</a>
					<a href="#" class="btn btn-outline-hero">Latest Notices</a>
				</div> --}}
			</div>
		</div>
		<img src="{{asset('images/banner.webp')}}" alt="Gauhati High Court Kohima Bench" class="h-100 object-fit-cover">
	</div>
	<div class="col-md-2">
		{{-- <div class="text-center banner-judge-profile">
			<div class="swiper judges-slider">
				<div class="swiper-wrapper">
					@foreach($judges as $judge)
					<div class="swiper-slide">
						<img src="{{ $judge['image'] }}" alt="{{ $judge['name'] }}" class="mb-2">
						<div class="h5 fw-semibold">{{ $judge['name'] }}</div>
						<div>{{ $judge['position'] }}</div>
					</div>
					@endforeach
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div> --}}
		<div class="card text-center h-100 pt-3 banner-judge">
			<div class="card-body">
				<div class="swiper judges-slider">
					<div class="swiper-wrapper">
						@foreach($judges as $judge)
						<div class="swiper-slide">
							<img src="{{ $judge['image'] }}" alt="{{ $judge['name'] }}" style="width: 200px;border-radius: 5px;" class="mb-3">
							<div class="h5 fw-bold px-4">{{ $judge['name'] }}</div>
							<div>{{ $judge['position'] }}</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>
</div>

{{-- <div class="banner-full-width">
	<img src="{{asset('images/banner.png')}}" alt="banner" class="banner-image">
	<div class="banner-hero">
		<div class="container">
			<div class="hero-inner">
				<h1 class="hero-title">Gauhati High Court Kohima Bench</h1>
				<p class="hero-sub">Access case status, cause lists, notices and eServices in one place.</p>
			</div>
		</div>
	</div>
	<div class="profile-card profile-overlay d-none d-md-block">
		<div>
			<img src="https://kohimahighcourt.gov.in/JudgesProfile/Rajesh_Mazumdar1.jpg" alt="judge" class="">
		</div>
		<div class="mb-1 text-center fw-bold">Hon’ble Mr. Justice Rajesh Mazumdar</div>
		<div class="text-muted small text-center">Station Judge</div>
	</div>
</div> --}}

<main class="container site-main">
	<section class="services-section mb-4">
		<div class="services-row d-flex align-items-stretch justify-content-center flex-nowrap">
		@foreach([
			['title'=>'Case Status','icon'=>'bi bi-search service-icon','url'=>config('links.case_status')],
			['title'=>'Cause List','icon'=>'bi bi-journal-text service-icon','url'=>config('links.causelist_local')],
			['title'=>'Display Board','icon'=>'bi bi-display service-icon','url'=>config('links.display_board')],
			['title'=>'NJDG','icon'=>'bi bi-grid service-icon','url'=>config('links.njdg')],
			['title'=>'eCourts','icon'=>'bi bi bi-globe service-icon','url'=>config('links.ecourts')],
			['title'=>'Live Streaming','icon'=>'bi bi-camera-video service-icon','url'=>config('links.live_streaming')]
		] as $service)
		<div class="service-tile d-flex">
			<a href="{{$service['url']}}" class="service-card" target="_blank external-link">
				<i class="{{$service['icon']}}"></i>
				<h5 class="fw-bold">{{$service['title']}}</h5>
				{{-- 
				<p class="text-muted mb-0">Track your case status easily</p>
				--}}
			</a>
		</div>
		@endforeach
	</section>

	<div class="card-wrap p-3 mb-4">
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
								<div class="post-date mb-1">
									<i class="bi bi-calendar3 me-2"></i>{{\App\Helpers\DateHelper::display($item->published_at)}}
								</div>
								<div><a class="notif-link" href="{{$item->documentUrl()}}" target="_blank">{{$item->title}}</a></div>
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

	<!-- Activities Section -->
	<div class="row g-4 mb-4">
		<!-- Notice Board - Left Side (Larger) -->
		<div class="col-lg-8">
			<div class="card-wrap p-3 mb-4">
				<div class="d-flex justify-content-between align-items-center mb-3">
					<h4 class="mb-0 fw-bold">Recent Activities</h4>
					<a href="{{ route('portal.activity.index') }}" class="link-primary small">View all</a>
				</div>
				<div class="row g-3">
					@foreach($activities as $activity)
					<div class="col-sm-12 col-md-6">
						<a class="activity-card" href="{{ route('portal.activity.show', $activity) }}">
							<div class="activity-image">
								<img src="{{ $activity->photoUrl() }}" alt="{{ $activity->title }}" class="w-100 h-100 object-fit-cover">
							</div>
							<div class="p-3">
								<div class="post-date">
									<i class="bi bi-calendar3 me-2"></i>
									{{ $activity->published_at }}
								</div>
								<h6 class="activity-title">{{ $activity->title }}</h6>
								<p class="activity-description">
									{{ Str::limit(strip_tags($activity->description),100) }}
								</p>
							</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card-wrap p-3">
				<h5 class="fw-bold mb-3">Calendar</h5>
				<div id="portalCalendar" data-events='@json($calendarEvents)'></div>
				<div class="calendar-legend mt-2">
					<div class="d-flex align-items-center gap-1">
						<div class="calendar-legend-color legend-national"></div>
						<span>National</span>
					</div>
					<div class="d-flex align-items-center gap-1">
						<div class="calendar-legend-color legend-restricted"></div>
						<span>Restricted</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card-wrap p-3 mb-4">
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
					<li class="list-group-item d-flex align-items-start py-1">
						<div class="icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
						<div class="flex-grow-1">
							<a class="notif-link" href="{{$notice->documentUrl()}}" target="_blank">{{$notice->title}}</a>
							<div class="post-date mt-1 mb-0">{{\App\Helpers\DateHelper::display($notice->published_at)}}</div>
						</div>
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
	
	<div class="card-wrap p-3 mb-4">
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
					<a class="store-badge" href="https://play.google.com/store/apps/details?id=in.gov.ecourts.eCourtsServices" aria-label="Get it on Google Play">
						<img src="{{asset('images/google-play.png')}}" alt="Get it on Google Play">
					</a>
					<a class="store-badge" href="https://apps.apple.com/in/app/ecourts-services/id1260905816?mt=8" aria-label="Download on the App Store">
						<img src="{{asset('images/app-store.png')}}" alt="Download on the App Store" style="height: 50px; width: auto;">
					</a>
				</div>
			</div>
		</div>
	</section>
</main>
@endsection