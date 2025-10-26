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
    <div class="container pb-4">
      <div class="logo-row">
        <div class="d-flex align-items-center">
          <a href="{{ url('/') }}" style="display:inline-flex;align-items:center;margin-right:8px">
            <img src="{{ asset('images/logo.png') }}" alt="Government Portal Logo" style="width:60px;height:auto;display:block;" />
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
      <div class="nav-row">
        <nav class="navbar navbar-expand-lg p-0">
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse justify-content-center" id="navMenu">
            <ul class="navbar-nav align-items-center gap-3">
              <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
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
      <div class="row banner-section g-3 align-items-stretch">
        <div class="col-lg-10">
          <img src="{{asset('images/banner.png')}}" alt="banner" class="banner-image">
        </div>
        <div class="col-lg-2 d-flex">
          <div class="profile-card w-100 d-flex flex-column align-items-center justify-content-center text-center p-3">
            <img src="https://kohimahighcourt.gov.in/JudgesProfile/Rajesh_Mazumdar1.jpg" alt="judge" style="width:100%;height:150px;object-fit:cover;border-radius:4px;display:block;margin-bottom:12px;">
            <h5 class="mb-1" style="font-size:1rem;">Hon’ble Mr. Justice Rajesh Mazumdar</h5>
            <div class="role text-muted" style="font-size:0.875rem;">Station Judge</div>
            {{-- <div class="dept">Ministry of Digital Services</div> --}}
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="container" style="margin-top:40px;">
    <div class="news-wrap p-3">
      <div class="d-flex justify-content-between align-items-start">
        <h4 class="mb-3 fw-bold">Latest News & Updates</h4>
        <small class="text-muted">Showing 3 per slide</small>
      </div>

      <div id="newsCarousel" class="carousel slide news-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row g-3">
              <div class="col-md-4"><div class="news-item"><div class="date"><i class="bi bi-calendar3 me-2"></i>October 23, 2025</div><div class="fw-bold">New Digital Services Platform Launched</div></div></div>
              <div class="col-md-4"><div class="news-item"><div class="date"><i class="bi bi-calendar3 me-2"></i>October 23, 2025</div><div class="fw-bold">Public Consultation on New Policy</div></div></div>
              <div class="col-md-4"><div class="news-item"><div class="date"><i class="bi bi-calendar3 me-2"></i>October 20, 2025</div><div class="fw-bold">Excellence in Public Service Award</div></div></div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row g-3">
              <div class="col-md-4"><div class="news-item"><div class="date"><i class="bi bi-calendar3 me-2"></i>October 18, 2025</div><div class="fw-bold">Launch of Citizen Feedback Portal</div></div></div>
              <div class="col-md-4"><div class="news-item"><div class="date"><i class="bi bi-calendar3 me-2"></i>October 15, 2025</div><div class="fw-bold">New Accessibility Guidelines Published</div></div></div>
              <div class="col-md-4"><div class="news-item"><div class="date"><i class="bi bi-calendar3 me-2"></i>October 10, 2025</div><div class="fw-bold">Inter-Departmental Data Sharing Agreement Signed</div></div></div>
            </div>
          </div>
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
    <div class="notif-wrap p-3">
      <h4 class="fw-bold">Notifications</h4>
      <ul class="nav nav-tabs mt-3 mb-2" role="tablist">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-general">General Notice</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-circulars">Circulars</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-tenders">Tenders</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-recruitment">Recruitment</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-misc">Miscellaneous</button></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-general">
          <ul class="list-group list-notif">
            <li class="list-group-item d-flex align-items-center"><div class="icon"><i class="bi bi-envelope-fill"></i></div><div class="flex-grow-1">Public Holiday Notification for Republic Day 2025</div><div class="text-muted">Oct 24, 2025</div></li>
            <li class="list-group-item d-flex align-items-center"><div class="icon"><i class="bi bi-megaphone-fill"></i></div><div class="flex-grow-1">Important Notice regarding Online Service Portal Maintenance</div><div class="text-muted">Oct 20, 2025</div></li>
            <li class="list-group-item d-flex align-items-center"><div class="icon"><i class="bi bi-file-earmark-text-fill"></i></div><div class="flex-grow-1">Updated Guidelines for Document Submission Process</div><div class="text-muted">Oct 18, 2025</div></li>
            <li class="list-group-item d-flex align-items-center"><div class="icon"><i class="bi bi-calendar-check-fill"></i></div><div class="flex-grow-1">Notice for Annual Departmental Meeting 2025</div><div class="text-muted">Oct 13, 2025</div></li>
          </ul>
        </div>
      </div>
    </div>
    <section class="services-section">
      <h4 class="fw-bold mb-3">Our Services</h4>

      <div class="services-row d-flex align-items-stretch justify-content-center flex-nowrap">
        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-search service-icon"></i>
            <h5 class="fw-bold">Case Status</h5>
            <p class="text-muted mb-0">Track your case status easily</p>
          </div>
        </div>

        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-journal-text service-icon"></i>
            <h5 class="fw-bold">Cause List</h5>
            <p class="text-muted mb-0">View daily cause lists</p>
          </div>
        </div>

        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-display service-icon"></i>
            <h5 class="fw-bold">Display Board</h5>
            <p class="text-muted mb-0">Access the digital display board</p>
          </div>
        </div>

        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-grid service-icon"></i>
            <h5 class="fw-bold">NJDG</h5>
            <p class="text-muted mb-0">National Judicial Data Grid</p>
          </div>
        </div>

        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-globe service-icon"></i>
            <h5 class="fw-bold">eCourts</h5>
            <p class="text-muted mb-0">Access the digital display board</p>
          </div>
        </div>
      </div>
    </section>
    <!-- App download callout -->
    <section class="app-downloads mt-4 mb-4 text-center">
      <div class="container">
        <div class="download-box d-inline-flex align-items-center gap-3">
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
  <footer>
    <div class="container">
      <div class="row text-center text-md-start">
        <div class="col-md-3 mb-3">
          <h6>About Us</h6>
          <ul>
            <li><a href="#">Vision & Mission</a></li>
            <li><a href="#">Organization Structure</a></li>
            <li><a href="#">Contact Details</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
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
