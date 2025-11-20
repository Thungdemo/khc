<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GHCKB</title>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
		@vite('resources/sass/admin.scss')
	</head>
	<body>
		<div class="layout-wrapper">
			<!-- Sidebar -->
			<aside class="sidebar p-3" id="sidebar">
				<div class="mb-4 text-center">
					<img class="sidebar-logo" src="{{asset('images/logo.png')}}"/>
					<h6 class="mt-2 text-white mb-0">GHCKB</h6>
					<small class="text-secondary">Dashboard</small>
				</div>
				<nav class="nav flex-column">
					<a class="nav-link active" href="{{route('admin.dashboard.index')}}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
					@can('cms')
					<div class="sidemenu-divider text-secondary fw-semibold">
						Content Management
					</div>
					<a class="nav-link" href="{{route('admin.notice.index')}}"><i class="bi bi-bell me-2"></i>Notices</a>
					<a class="nav-link" href="{{route('admin.activity.index')}}"><i class="bi bi-calendar-event me-2"></i>Activities</a>
					<a class="nav-link" href="{{route('admin.calendar.index')}}"><i class="bi bi-calendar-date me-2"></i>Calendar</a>
					<a class="nav-link" href="{{route('admin.statistics.index')}}"><i class="bi bi-bar-chart me-2"></i>Statistics</a>
					<a class="nav-link" href="{{route('admin.station-judge.index')}}"><i class="bi bi-person-badge me-2"></i>Station Judges</a>
					<a class="nav-link" href="{{route('admin.former-judge.index')}}"><i class="bi bi-person-check me-2"></i>Former Judges</a>
					<a class="nav-link" href="{{route('admin.registry-official.index')}}"><i class="bi bi-person-workspace me-2"></i>Registry Officials</a>
					<a class="nav-link" href="{{route('admin.advocate-general.index')}}"><i class="bi bi-briefcase me-2"></i>Advocate General</a>
					<a class="nav-link" href="{{route('admin.legal-committee.index')}}"><i class="bi bi-people me-2"></i>Legal Committee</a>
					<a class="nav-link" href="{{route('admin.album.index')}}"><i class="bi bi-collection me-2"></i>Albums</a>
					<a class="nav-link" href="{{route('admin.form-download.index')}}"><i class="bi bi-file-earmark-pdf me-2"></i>Form Downloads</a>
					@endcan
					<div class="sidemenu-divider text-secondary fw-semibold">
						Administration
					</div>
					@can('user')
					<a class="nav-link" href="{{route('admin.user.index')}}"><i class="bi bi-people me-2"></i>Users</a>
					@endcan
					@can('security')
					<a class="nav-link" href="{{route('admin.authentication-log.index')}}"><i class="bi bi-lock me-2"></i>Authentication Logs</a>
					@endcan
				</nav>
			</aside>
			<!-- Main Content -->
			<main class="content">
				<nav class="navbar navbar-light px-4">
					<div class="d-flex align-items-center">
						<button class="btn btn-outline-dark d-lg-none" id="btnToggle"><i class="bi bi-list"></i></button>
					</div>
					<div class="dropdown ms-auto py-2 d-flex align-items-center">
						<a href="{{url('/')}}" class="text-decoration-none text-dark me-3" title="Visit Website">
						<i class="bi bi-globe"></i>
						</a>
						<a href="#" class="text-decoration-none text-dark" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
						<span class="fw-semibold me-2">{{auth()->user()->name}}</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="adminDropdown">
							<li><a class="dropdown-item" href="#">Profile</a></li>
							<li><a class="dropdown-item" href="#">Settings</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
						</ul>
					</div>
				</nav>
				<div class="container-fluid p-4">
					<!-- Breadcrumbs -->
					@yield('breadcrumbs')
					@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<i class="bi bi-check-circle me-2"></i>{{ session('success') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					@if(session('error'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{{ session('error') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					@yield('content')
				</div>
			</main>
		</div>
		@vite('resources/js/admin.js')
		@stack('scripts')
		<!-- Logout Modal -->
		<div class="modal" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Are you sure you want to logout?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
							@csrf
							<button type="submit" class="btn btn-danger">Logout</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>