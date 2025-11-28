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
		<header class="site-header sticky-top" style="z-index: 10">
			<div class="container py-1">
				<div class="logo-row">
					<div class="d-flex align-items-center">
						<a href="{{ url('/') }}" class="logo-link">
						<img src="{{ asset('images/logo.png') }}" alt="logo" class="logo-img" />
						</a>
						<div>
							<div class="logo-title">{{config('app.full_name')}}</div>
						</div>
					</div>

					<div class="dropdown">
						<button class="btn text-white" type="button" id="accessibility" data-bs-toggle="dropdown"  data-bs-auto-close="outside">
							<i class="bi bi-universal-access-circle fs-4" aria-hidden="true"></i>
							<span class="visually-hidden">Accessibility </span>
						</button>
						<ul class="dropdown-menu dropdown-menu-end accessibility-panel" aria-labelledby="accessibility" style="min-width: 250px;">
							
							<div class="p-3">
								<div class="mb-3">
									<div class="fw-bold mb-2">Contrast Options</div>
									<button class="btn btn-light border themeToggle" id="themeLight" data-theme="light" type="button" aria-label="Toggle theme">
										<i class="bi bi-brightness-high" aria-hidden="true"></i> Light
									</button>
									<button class="btn btn-light border themeToggle" id="themeDark" data-theme="dark" type="button" aria-label="Toggle theme">
										<i class="bi bi bi-moon-fill" aria-hidden="true"></i> Dark
									</button>
								</div>
								<hr class="dropdown-divider">
								<div>
									<div class="fw-bold mb-2">Text Size</div>
									<button class="btn btn-light border" id="fontInc" type="button" aria-label="Increase font size">A+</button>
									<button class="btn btn-light border" id="fontReset" type="button" aria-label="Reset font size">A</button>
									<button class="btn btn-light border" id="fontDec" type="button" aria-label="Decrease font size">A-</button>
								</div>
							</div>
						</ul>
					</div>
				</div>
			</div>
			<!-- Navbar in its own container so it sits separately from the logo row -->
			<div class="container">
				<div class="nav-row py-2">
					<nav class="navbar navbar-expand-lg p-0">
						<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-center d-none d-lg-block" id="navMenu">
							<ul class="navbar-nav align-items-center gap-3 mx-auto">
								<li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
								{{-- <li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="court-tools-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Court Tools</a>
									<ul class="dropdown-menu" aria-labelledby="court-tools-menu">
										<li><a class="dropdown-item" href="{{config('links.live_streaming')}}" target="_blank">Live Streaming</a></li>
										<li><a class="dropdown-item" href="{{url('board/display')}}" target="_blank">Display Board</a></li>
										<li><a class="dropdown-item" href="{{config('links.eservices_portal')}}" target="_blank">eServices Portal</a></li>
									</ul>
								</li> --}}
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="profile-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
									<ul class="dropdown-menu" aria-labelledby="profile-menu">
										{{-- <li><a class="dropdown-item" href="{{route('portal.history')}}">History</a></li> --}}
										<li><a class="dropdown-item" href="{{route('portal.about')}}">About</a></li>
										<li><a class="dropdown-item" href="{{route('portal.station-judge.index')}}">Station Judges</a></li>
										<li><a class="dropdown-item" href="{{route('portal.former-judge.index')}}">Former Judges of Kohima Bench</a></li>
										<li><a class="dropdown-item" href="{{route('portal.registry-official.index')}}">Registry Officials</a></li>
										<li><a class="dropdown-item" href="{{route('portal.advocate-general.index')}}">Advocate General</a></li>
										<li><a class="dropdown-item" href="{{route('portal.legal-committee.index')}}">Legal Committee</a></li>
									</ul>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="services-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
									<ul class="dropdown-menu" aria-labelledby="services-menu">
										<li><a class="dropdown-item" href="#">Cause List</a></li>
										<li><a class="dropdown-item ps-4" href="{{config('links.causelist_national')}}" target="_blank">National Server</a></li>
										<li><a class="dropdown-item ps-4" href="{{config('links.causelist_local')}}" target="_blank">Local Server</a></li>
										<li><a class="dropdown-item" href="{{config('links.case_status')}}" target="_blank">Case Status</a></li>
										<li><a class="dropdown-item" href="{{config('links.neutral_citation')}}" target="_blank">Neutral Citation</a></li>
										<li><a class="dropdown-item" href="{{url('board/display')}}" target="_blank">Display Board</a></li>
										<li><a class="dropdown-item" href="{{route('portal.statistics.index')}}">Statistics</a></li>
										<li><a class="dropdown-item" href="{{route('portal.library.index')}}">Library</a></li>
										<li><a class="dropdown-item" href="{{route('portal.form-download.index')}}">Downloads</a></li>
										<li><a class="dropdown-item" href="{{config('links.justice_clock')}}" target="_blank">Virtual Justice Clock</a></li>
										<li><a class="dropdown-item" href="#">eCommittee Newsletters</a></li>
										<li><a class="dropdown-item" href="{{route('portal.mact.index')}}" target="_blank">MACT Dashboard</a></li>
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
								<li class="nav-item"><a class="nav-link" href="{{route('portal.activity.index')}}">Activities</a></li>
								<li class="nav-item"><a class="nav-link" href="{{route('portal.album.index')}}">Gallery</a></li>
								<li class="nav-item"><a class="nav-link" href="{{route('portal.contact.index')}}">Contact</a></li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="ict-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">ICT Milestones</a>
									<ul class="dropdown-menu" aria-labelledby="ict-menu">
										<li><a class="dropdown-item" href="https://hcnlservices.in/ict_milestone_2024/main.html" target="_blank">View from Desktop</a></li>
										<li><a class="dropdown-item" href="https://hcnlservices.in/pdf/" target="_blank">View from Mobile</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
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
								<li><a class="nav-link" href="{{route('portal.registry-official.index')}}">Registry Officials</a></li>
								<li><a class="nav-link" href="{{route('portal.advocate-general.index')}}">Advocate General</a></li>
								<li><a class="nav-link" href="{{route('portal.legal-committee.index')}}">Legal Committee</a></li>
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
								<li><a class="nav-link" href="{{config('links.njdg')}}" target="_blank">NJDG</a></li>
								<li><a class="nav-link" href="{{config('links.ecourts')}}" target="_blank">eCourts</a></li>
								<li><a class="nav-link" href="{{config('links.neutral_citation')}}" target="_blank">Neutral Citation</a></li>
								<li><a class="nav-link" href="{{url('board/display')}}" target="_blank">Display Board</a></li>
								<li><a class="nav-link" href="{{route('portal.statistics.index')}}">Statistics</a></li>
								<li><a class="nav-link" href="{{route('portal.library.index')}}">Library</a></li>
								<li><a class="nav-link" href="{{route('portal.form-download.index')}}">Downloads</a></li>
								<li><a class="nav-link" href="{{config('links.justice_clock')}}" target="_blank">Virtual Justice Clock</a></li>
								<li><a class="nav-link" href="#">eCommittee Newsletters</a></li>
								<li><a class="nav-link" href="{{route('portal.mact.index')}}" target="_blank">MACT Dashboard</a></li>
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
								@foreach($item->children as $child)
								<li class="ps-4"><a class="nav-link" href="{{route('portal.notice.index',$child)}}">{{$child->name}}</a></li>
								@endforeach
								@endforeach
							</ul>
						</div>
					</li>
					<li class="nav-item"><a class="nav-link" href="{{route('portal.activity.index')}}">Activities</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('portal.album.index')}}">Gallery</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('portal.contact.index')}}">Contact</a></li>
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
			<div class="container" style="font-size:0.9em">
				<div class="row text-md-start">
					<div class="col-md-3 mb-3">
						<h6>Contact & Info</h6>
						<div class="footer-contact">
							<p class="mb-1">Gauhati High Court Kohima Bench,<br>Old Minister's Hill, Kohima, Nagaland - 797001</p>
							<p class="mb-1">Site last updated: {{$lastUpdatedAt}}</p>
							<p class="mb-1">Visitor count: <span id="visitorCount">2,34,567</span></p>
							<p class="mb-0">
								<a href="https://www.youtube.com/@ecourtsnagaland" target="_blank" class="text-white me-2" aria-label="YouTube channel"><i class="bi bi-youtube fs-5"></i></a>
								<a href="#" class="text-white me-2" aria-label="Twitter"><i class="bi bi-twitter fs-5"></i></a>
								<a href="#" class="text-white" aria-label="Facebook"><i class="bi bi-facebook fs-5"></i></a>
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
						<h6>Site Links</h6>
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ route('portal.about') }}">About</a></li>
							<li><a href="{{ route('portal.album.index')}}">Gallery</a></li>
							<li><a href="{{ route('portal.contact.index') }}">Contact</a></li>
							<li><a target="_blank" href="{{ asset('sitemap.xml') }}">Sitemap</a></li>
						</ul>
					</div>
					<div class="col-md-3 mb-3">
						<h6>External Links</h6>
						<ul>
							<li><a class="external-link" href="https://www.india.gov.in/" target="_blank" rel="noopener noreferrer"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Government of India</a></li>
							<li><a class="external-link" href="https://www.nagaland.gov.in" target="_blank" rel="noopener noreferrer"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Government of Nagaland</a></li>
							<li><a class="external-link" href="https://main.sci.gov.in/" target="_blank" rel="noopener noreferrer"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Supreme Court of India</a></li>
							<li><a class="external-link" href="http://www.sclsc.nic.in" target="_blank" rel="noopener noreferrer"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Supreme Court Legal Services Committee</a></li>
							<li><a class="external-link" href="https://ghconline.gov.in/" target="_blank" rel="noopener noreferrer"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Gauhati High Court</a></li>
							<li><a class="external-link" href="https://ghcazlbench.nic.in/" target="_blank" rel="noopener noreferrer"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Gauhati High Court Aizawl Bench</a></li>
							<li><a class="external-link" href="http://ghcitanagar.gov.in/" target="_blank" rel="noopener noreferrer"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Gauhati High Court Itanagar Bench</a></li>
							<li><a class="external-link" href="https://nslsa.nagaland.gov.in/" target="_blank" rel="noopener noreferrer"><i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>Nagaland State Legal Services Authority</a></li>
						</ul>
					</div>
				</div>
				<div class="footer-bottom">
					<p>© 2025 Government Portal. All rights reserved.<br>Site Designed by Gauhati High Court Kohima Bench.</p>
				</div>
			</div>
		</footer>

		<div class="modal" id="external-link-modal" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">External Link Warning</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						You are being redirected to an external website not maintained by us. Do you wish to continue?
					</div>
					<div class="modal-footer d-flex justify-content-between">
						<button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<a href="#" class="btn btn-primary ok-btn">OK</a>
					</div>
				</div>
			</div>
		</div>
		@vite('resources/js/portal.js')
	</body>
</html>