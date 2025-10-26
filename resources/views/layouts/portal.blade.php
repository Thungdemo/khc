<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Government Portal</title>
  @vite('resources\sass\portal.scss')
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet"> --}}
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
  <header class="site-header">
    <div class="container py-2">
      <div class="logo-row">
        <div class="d-flex align-items-center">
          <a href="{{ url('/') }}" class="logo-link">
            <img src="{{ asset('images/logo.png') }}" alt="Government Portal Logo" class="logo-img" />
          </a>
          <div>
            <div class="logo-title">GAUHATI HIGH COURT KOHIMA BENCH</div>
            {{-- <div class="logo-sub">Ministry of Digital Services</div> --}}
          </div>
        </div>
        <div class="controls">
          <button class="control-btn" id="fontInc">A+</button>
          <button class="control-btn" id="fontDec">A-</button>
          <button class="control-btn" id="themeToggle"><i class="bi bi-brightness-high"></i></button>
        </div>
      </div>
    </div>

    <!-- Navbar in its own container so it sits separately from the logo row -->
    <div class="container">
      <div class="nav-row py-2">
        <nav class="navbar navbar-expand-lg p-0">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse justify-content-center" id="navMenu">
            <ul class="navbar-nav align-items-center gap-3 mx-auto">
              <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profile-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                <ul class="dropdown-menu" aria-labelledby="profile-menu">
                  <li><a class="dropdown-item" href="#">General Notice</a></li>
                  <li><a class="dropdown-item" href="#">Recruitment</a></li>
                  <li><a class="dropdown-item" href="#">Tenders</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="services-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                <ul class="dropdown-menu" aria-labelledby="services-menu">
                  <li><a class="dropdown-item" href="#">General Notice</a></li>
                  <li><a class="dropdown-item" href="#">Recruitment</a></li>
                  <li><a class="dropdown-item" href="#">Tenders</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notice-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Notice Board</a>
                <ul class="dropdown-menu" aria-labelledby="notice-menu">
                  <li><a class="dropdown-item" href="#">General Notice</a></li>
                  <li><a class="dropdown-item" href="#">Recruitment</a></li>
                  <li><a class="dropdown-item" href="#">Tenders</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="ict-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">ICT Milestones</a>
                <ul class="dropdown-menu" aria-labelledby="ict-menu">
                  <li><a class="dropdown-item" href="#">General Notice</a></li>
                  <li><a class="dropdown-item" href="#">Recruitment</a></li>
                  <li><a class="dropdown-item" href="#">Tenders</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      </div>
    </div>
  </header>

  <!-- Full-width banner with overlapping profile card -->
  @yield('content')
  <footer>
    <div class="container">
      <div class="row text-center text-md-start">
        <div class="col-md-3 mb-3">
          <h6>Contact & Info</h6>
          <div class="footer-contact">
            <p class="mb-1">Gauhati High Court - Kohima Bench<br>Seventh Mile, Kohima, Nagaland - 797001</p>
            <p class="mb-1 small">Site last updated: 10-10-2025</p>
            <p class="mb-1 small">Visitor count: <span id="visitorCount">2,34,567</span></p>
            <p class="mb-0">
              <a href="#" class="text-white me-2" aria-label="YouTube channel"><i class="bi bi-youtube" style="font-size:1.25rem"></i></a>
              <a href="#" class="text-white me-2" aria-label="Twitter"><i class="bi bi-twitter" style="font-size:1.0rem"></i></a>
              <a href="#" class="text-white" aria-label="Facebook"><i class="bi bi-facebook" style="font-size:1.0rem"></i></a>
            </p>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <h6>Services</h6>
          <ul>
            <li><a href="#">Online Forms</a></li>
            <li><a href="#">Citizen Charter</a></li>
            <li><a href="#">Case Status</a></li>
            <li><a href="#">RTI</a></li>
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
          <h6>Quick Links</h6>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Departments</a></li>
            <li><a href="#">Notice Board</a></li>
            <li><a href="#">Contact</a></li>
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
