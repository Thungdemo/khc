<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dark Sidebar Admin Dashboard - Bootstrap 5</title>
        @vite(['resources/js/app.js', 'resources/sass/app.scss'])
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.4/font/bootstrap-icons.css" rel="stylesheet">
	</head>
	<body>
		<div class="layout-wrapper">
			<aside class="sidebar p-3" id="sidebar">
				<div class="d-flex align-items-center mb-4">
					<div class="me-2 bg-light text-dark rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px">A</div>
					<div>
						<h6 class="mb-0 text-white">Acme Admin</h6>
						<small class="text-secondary">Dashboard</small>
					</div>
				</div>
				<nav class="nav flex-column">
					<a class="nav-link active" href="#"><i class="bi bi-speedometer2 me-2"></i>Overview</a>
					<a class="nav-link" href="#"><i class="bi bi-people me-2"></i>Users</a>
                    {{-- <button class="btn btn-toggle align-items-center rounded collapsed nav-link text-start text-light w-100" data-bs-toggle="collapse" data-bs-target="#reportsSubmenu" aria-expanded="false">
                        <i class="bi bi-card-list me-2"></i>Notices
                    </button>
                    <div class="collapse submenu" id="reportsSubmenu">
                        <a href="#" class="nav-link small">Daily Reports</a>
                        <a href="#" class="nav-link small">Monthly Reports</a>
                        <a href="#" class="nav-link small">Custom Reports</a>
                    </div> --}}
					<a class="nav-link" href="{{route('admin.notice.index')}}"><i class="bi bi-gear me-2"></i>General Notices</a>
					<a class="nav-link" href="#"><i class="bi bi-gear me-2"></i>Settings</a>
				</nav>
				<hr>
				{{-- <small class="text-secondary">Quick actions</small>
				<div class="d-grid gap-2 mt-2">
					<button class="btn btn-outline-light btn-sm">New user</button>
					<button class="btn btn-outline-secondary btn-sm">Export</button>
				</div> --}}
			</aside>
			<main class="content">
				<nav class="navbar navbar-light bg-white border-bottom shadow-sm">
					<div class="container-fluid">
						<button class="btn btn-dark d-lg-none" id="btnToggle"><i class="bi bi-list"></i></button>
						<form class="d-flex ms-2" style="max-width:420px; width:100%">
							<input class="form-control form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">
						</form>
						<div class="d-flex align-items-center">
							<div class="me-3 text-end d-none d-sm-block">
								<div class="fw-semibold">Hello, Admin</div>
								<small class="text-muted">acme@example.com</small>
							</div>
							<div class="dropdown">
								<a href="#" class="d-inline-block link-dark text-decoration-none dropdown-toggle" id="avatarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="https://api.dicebear.com/6.x/initials/svg?seed=Admin" alt="avatar" width="40" height="40" class="rounded-circle">
								</a>
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="avatarDropdown">
									<li><a class="dropdown-item" href="#">Profile</a></li>
									<li><a class="dropdown-item" href="#">Settings</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="#">Sign out</a></li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
                @yield('content')
			</main>
		</div>
		<script>
			const btn = document.getElementById('btnToggle');
			const sidebar = document.getElementById('sidebar');
			btn && btn.addEventListener('click', () => sidebar.classList.toggle('show'));
		</script>
	</body>
</html>