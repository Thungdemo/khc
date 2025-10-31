<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>{{config('app.name')}}</title>
		@vite('resources/sass/portal.scss')
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	</head>
	<body>
		<header class="site-header">
			<div class="container py-2">
				<div class="logo-row">
					<div class="d-flex align-items-center">
						<a href="{{ url('/') }}" class="logo-link">
						<img src="{{ asset('images/logo.png') }}" alt="logo" class="logo-img" />
						</a>
						<div>
							<div class="logo-title">{{config('app.full_name')}}</div>
							{{-- 
							<div class="logo-sub">Ministry of Digital Services</div>
							--}}
						</div>
					</div>
					<div class="controls">
						<button class="control-btn" id="fontInc">A+</button>
						<button class="control-btn" id="fontReset">A</button>
						<button class="control-btn" id="fontDec">A-</button>
						<button class="control-btn" id="themeToggle"><i class="bi bi-brightness-high"></i></button>
					</div>
				</div>
			</div>
			<!-- Navbar in its own container so it sits separately from the logo row -->
			<div class="container">
				<div class="nav-row py-2">
					<nav class="navbar navbar-expand-lg p-0">
						<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"><span class="navbar-toggler-icon"></span></button>
						<div class="collapse navbar-collapse justify-content-center d-none d-lg-block" id="navMenu">
							<ul class="navbar-nav align-items-center gap-3 mx-auto">
								<li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="profile-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
									<ul class="dropdown-menu" aria-labelledby="profile-menu">
										{{-- <li><a class="dropdown-item" href="{{route('portal.history')}}">History</a></li> --}}
										<li><a class="dropdown-item" href="{{route('portal.about')}}">About</a></li>
										<li><a class="dropdown-item" href="{{route('portal.station-judge.index')}}">Station Judges</a></li>
										<li><a class="dropdown-item" href="{{route('portal.former-judge.index')}}">Former Judges of Kohima Bench</a></li>
										<li><a class="dropdown-item" href="#">Registry Officials</a></li>
										<li><a class="dropdown-item" href="#">Advocate General</a></li>
										<li><a class="dropdown-item" href="#">High Court Legal Services Committee</a></li>
									</ul>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="services-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
									<ul class="dropdown-menu" aria-labelledby="services-menu">
										<li><a class="dropdown-item" href="{{config('links.causelist_national')}}" target="_blank">Cause List (National Server)</a></li>
										<li><a class="dropdown-item" href="{{config('links.causelist_local')}}" target="_blank">Cause List (Local Server)</a></li>
										<li><a class="dropdown-item" href="{{config('links.case_status')}}" target="_blank">Case Status</a></li>
										<li><a class="dropdown-item" href="{{config('links.neutral_citation')}}" target="_blank">Neutral Citation</a></li>
										<li><a class="dropdown-item" href="{{config('links.display_board')}}" target="_blank">Display Board</a></li>
										<li><a class="dropdown-item" href="#">Statistics</a></li>
										<li><a class="dropdown-item" href="#">Library</a></li>
										<li><a class="dropdown-item" href="#">Downloads</a></li>
										<li><a class="dropdown-item" href="{{config('links.justice_clock')}}" target="_blank">Virtual Justice Clock</a></li>
										<li><a class="dropdown-item" href="#">eCommittee Newsletters</a></li>
										<li><a class="dropdown-item" href="{{config('links.mact_dashboard')}}" target="_blank">MACT Dashboard</a></li>
										<li><a class="dropdown-item" href="{{config('links.mact')}}" target="_blank">MACT Information Portal</a></li>
										<li><a class="dropdown-item" href="#">RTI</a></li>
										<li><a class="dropdown-item" href="{{config('links.escr')}}" target="_blank">eSCR Judgements & Orders</a></li>
										<li><a class="dropdown-item" href="#">Court Vc Links</a></li>
										<li><a class="dropdown-item" href="#">eFiling</a></li>
										<li><a class="dropdown-item" href="#">ePay</a></li>
										<li><a class="dropdown-item" href="#">Virtual Courts</a></li>
									</ul>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="notice-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Notice Board</a>
									<ul class="dropdown-menu" aria-labelledby="notice-menu">
										@foreach($navbarNotices as $item)
										<li><a class="dropdown-item" href="{{route('portal.notice.index',$item)}}">{{$item->name}}</a></li>
										@endforeach
									</ul>
								</li>
								<li class="nav-item"><a class="nav-link" href="{{route('portal.image.index')}}">Gallery</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="ict-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">ICT Milestones</a>
									<ul class="dropdown-menu" aria-labelledby="ict-menu">
										<li><a class="dropdown-item" href="#">View from Desktop</a></li>
										<li><a class="dropdown-item" href="#">View from Mobile</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			</div>
		</header>

		<!-- Offcanvas Menu -->
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title">Menu</h5>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="collapse" href="#profileSubmenu" role="button">Profile</a>
						<div class="collapse" id="profileSubmenu">
							<ul class="list-unstyled ps-3">
								{{-- <li><a class="nav-link" href="{{route('portal.history')}}">History</a></li> --}}
								<li><a class="nav-link" href="{{route('portal.about')}}">About</a></li>
								<li><a class="nav-link" href="{{route('portal.station-judge.index')}}">Station Judges</a></li>
								<li><a class="nav-link" href="{{route('portal.former-judge.index')}}">Former Judges of Kohima Bench</a></li>
								<li><a class="nav-link" href="#">Registry Officials</a></li>
								<li><a class="nav-link" href="#">Advocate General</a></li>
								<li><a class="nav-link" href="#">High Court Legal Services Committee</a></li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="collapse" href="#servicesSubmenu" role="button">Services</a>
						<div class="collapse" id="servicesSubmenu">
							<ul class="list-unstyled ps-3">
								<li><a class="nav-link" href="{{config('links.causelist_national')}}" target="_blank">Cause List (National Server)</a></li>
								<li><a class="nav-link" href="{{config('links.causelist_local')}}" target="_blank">Cause List (Local Server)</a></li>
								<li><a class="nav-link" href="{{config('links.case_status')}}" target="_blank">Case Status</a></li>
								<li><a class="nav-link" href="{{config('links.neutral_citation')}}" target="_blank">Neutral Citation</a></li>
								<li><a class="nav-link" href="{{config('links.display_board')}}" target="_blank">Display Board</a></li>
								<li><a class="nav-link" href="#">Statistics</a></li>
								<li><a class="nav-link" href="#">Library</a></li>
								<li><a class="nav-link" href="#">Downloads</a></li>
								<li><a class="nav-link" href="{{config('links.justice_clock')}}" target="_blank">Virtual Justice Clock</a></li>
								<li><a class="nav-link" href="#">eCommittee Newsletters</a></li>
								<li><a class="nav-link" href="{{config('links.mact_dashboard')}}" target="_blank">MACT Dashboard</a></li>
								<li><a class="nav-link" href="{{config('links.mact')}}" target="_blank">MACT Information Portal</a></li>
								<li><a class="nav-link" href="#">RTI</a></li>
								<li><a class="nav-link" href="{{config('links.escr')}}" target="_blank">eSCR Judgements & Orders</a></li>
								<li><a class="nav-link" href="#">Court Vc Links</a></li>
								<li><a class="nav-link" href="#">eFiling</a></li>
								<li><a class="nav-link" href="#">ePay</a></li>
								<li><a class="nav-link" href="#">Virtual Courts</a></li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="collapse" href="#noticeSubmenu" role="button">Notice Board</a>
						<div class="collapse" id="noticeSubmenu">
							<ul class="list-unstyled ps-3">
								@foreach($navbarNotices as $item)
								<li><a class="nav-link" href="{{route('portal.notice.index',$item)}}">{{$item->name}}</a></li>
								@endforeach
							</ul>
						</div>
					</li>
					<li class="nav-item"><a class="nav-link" href="{{route('portal.image.index')}}">Gallery</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="collapse" href="#ictSubmenu" role="button">ICT Milestones</a>
						<div class="collapse" id="ictSubmenu">
							<ul class="list-unstyled ps-3">
								<li><a class="nav-link" href="#">View from Desktop</a></li>
								<li><a class="nav-link" href="#">View from Mobile</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<!-- Full-width banner with overlapping profile card -->
		@yield('content')
		<footer>
			<div class="container" style="font-size:0.85em">
				<div class="row text-center text-md-start">
					<div class="col-md-3 mb-3">
						<h6>Contact & Info</h6>
						<div class="footer-contact">
							<p class="mb-1">Gauhati High Court Kohima Bench,<br>Old Minister's Hill, Kohima, Nagaland - 797001</p>
							<p class="mb-1">Site last updated: 10-10-2025</p>
							<p class="mb-1">Visitor count: <span id="visitorCount">2,34,567</span></p>
							<p class="mb-0">
								<a href="#" class="text-white me-2" aria-label="YouTube channel"><i class="bi bi-youtube"></i></a>
								<a href="#" class="text-white me-2" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
								<a href="#" class="text-white" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
							</p>
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<h6>Services</h6>
						<ul>
							<li><a href="https://hcservices.ecourts.gov.in/ecourtindiaHC/cases/highcourt_causelist.php?state_cd=6&dist_cd=1&court_code=2&stateNm=Assam">Cause List</a></li>
							<li><a href="https://hcservices.ecourts.gov.in/ecourtindiaHC/index_highcourt.php?state_cd=6&dist_cd=1&court_code=2&stateNm=Assam">Case Status</a></li>
							<li><a href="#">Statistics</a></li>
							<li><a href="https://ecourts.gov.in/ecourts_home">eCourts Services</a></li>
							<li><a href="https://justiceclock.ecourts.gov.in/justiceClock/?p=home/state&fstate_code=34">Virtual Justice Clock</a></li>
							<li><a href="https://ghcservices.assam.gov.in/mact/">MACT Information Portal</a></li>
							<li><a href="https://judgments.ecourts.gov.in/pdfsearch/index.php">eSCR- Judgements & Orders</a></li>
							<li><a href="#">Right to Information</a></li>
							<li><a href="#">Court VC Link</a></li>
						</ul>
					</div>
					<div class="col-md-3 mb-3">
						<h6>Resources</h6>
						<ul>
							<li><a href="#">Downloads</a></li>
							<li><a href="#">Circulars</a></li>
							<li><a href="#">Tenders</a></li>
							<li><a href="#">Recruitment</a></li>
						</ul>
					</div>
					<div class="col-md-3 mb-3">
						<h6>External Links</h6>
						<ul>
							<li><a class="external-link" href="https://www.india.gov.in/" target="_"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Government of India</a></li>
							<li><a class="external-link" href="https://www.nagaland.gov.in" target="_"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Government of Nagaland</a></li>
							<li><a class="external-link" href="https://main.sci.gov.in/" target="_"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Supreme Court of India</a></li>
							<li><a class="external-link" href="http://www.sclsc.nic.in" target="_"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Supreme Court Legal Services Committee</a></li>
							<li><a class="external-link" href="https://ghconline.gov.in/" target="_"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Gauhati High Court</a></li>
							<li><a class="external-link" href="https://ghcazlbench.nic.in/" target="_"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Gauhati High Court Aizawl Bench</a></li>
							<li><a class="external-link" href="http://ghcitanagar.gov.in/" target="_"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Gauhati High Court Itanagar Bench</a></li>
							<li><a class="external-link" href="https://nslsa.nagaland.gov.in/" target="_"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Nagaland State Legal Services Authority</a></li>
						</ul>
					</div>
				</div>
				<div class="footer-bottom">
					<p>© 2025 Government Portal. All rights reserved.<br>Site Designed by Gauhati High Court Kohima Bench.</p>
				</div>
			</div>
		</footer>
		@vite('resources/js/portal.js')
	</body>
</html>