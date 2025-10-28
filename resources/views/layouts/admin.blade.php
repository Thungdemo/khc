<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GHCKB</title>
	  @vite('resources/sass/admin.scss')
  </head>
  <body>

    <div class="layout-wrapper">
      <!-- Sidebar -->
      <aside class="sidebar p-3" id="sidebar">
        <div class="mb-4 text-center">
          <div class="bg-white text-dark rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width:50px;height:50px;font-weight:bold;">A</div>
          <h6 class="mt-2 text-white mb-0">GHCKB</h6>
          <small class="text-secondary">Dashboard</small>
        </div>
        <nav class="nav flex-column">
          <a class="nav-link active" href="#"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
          <a class="nav-link" href="{{route('admin.notice.index')}}"><i class="bi bi-file-text me-2"></i>Notices</a>
          <a class="nav-link" href="{{route('admin.registry-official.index')}}"><i class="bi bi-file-text me-2"></i>Registry Officials</a>
          <a class="nav-link" href="{{route('admin.former-judge.index')}}"><i class="bi bi-file-text me-2"></i>Former Judges</a>
          <a class="nav-link" href="#"><i class="bi bi-people me-2"></i>Users</a>
          <a class="nav-link" href="#"><i class="bi bi-gear me-2"></i>Settings</a>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="content">
        <nav class="navbar navbar-light px-4">
          <button class="btn btn-outline-dark d-lg-none" id="btnToggle"><i class="bi bi-list"></i></button>
          <div class="dropdown ms-auto d-flex align-items-center gap-2">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="fw-semibold me-2">{{auth()->user()->name}}</span>
              <img src="https://api.dicebear.com/6.x/initials/svg?seed=Admin" width="40" height="40" class="rounded-circle">
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="adminDropdown">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
            </ul>
          </div>
        </nav>

        <div class="container-fluid p-4">
          <!-- Breadcrumbs -->
          <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-transparent p-0">
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Home</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Notices</a></li>
              <li class="breadcrumb-item active text-dark" aria-current="page">Create</li>
            </ol>
          </nav>

			@yield('content')
        </div>
      </main>
    </div>
	@vite('resources/js/admin.js')
    <script>
      const btn = document.getElementById('btnToggle');
      const sidebar = document.getElementById('sidebar');
      btn && btn.addEventListener('click', () => sidebar.classList.toggle('show'));
    </script>
  </body>
</html>
