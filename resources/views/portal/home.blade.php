@extends('layouts.portal')
@section('content')
  <div class="banner-full-width">
    <img src="{{asset('images/banner.png')}}" alt="banner" class="banner-image banner-full-image">
    <!-- Hero content (left) and profile overlay (right) -->
    <div class="banner-hero">
      <div class="container">
        <div class="hero-inner">
          <h1 class="hero-title">Gauhati High Court Kohima Bench</h1>
          <p class="hero-sub">Access case status, cause lists, notices and eServices in one place.</p>
          <div class="hero-cta">
            <a href="#" class="btn btn-hero">About</a>
            <a href="#" class="btn btn-outline-hero">Latest Notices</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Profile card overlayed on the right side of the banner -->
    <div class="profile-card profile-overlay">
      <div class="profile-avatar-wrap">
        <img src="https://kohimahighcourt.gov.in/JudgesProfile/Rajesh_Mazumdar1.jpg" alt="judge" class="profile-overlay-img">
      </div>
      <h5 class="mb-1 profile-name">Hon’ble Mr. Justice Rajesh Mazumdar</h5>
      <div class="role profile-role">Station Judge</div>
    </div>
  </div>
  <main class="container site-main">

    <section class="services-section mb-4">

      <div class="services-row d-flex align-items-stretch justify-content-center flex-nowrap">
        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-search service-icon"></i>
            <h5 class="fw-bold">Case Status</h5>
            {{-- <p class="text-muted mb-0">Track your case status easily</p> --}}
          </div>
        </div>

        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-journal-text service-icon"></i>
            <h5 class="fw-bold">Cause List</h5>
            {{-- <p class="text-muted mb-0">View daily cause lists</p> --}}
          </div>
        </div>

        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-display service-icon"></i>
            <h5 class="fw-bold">Display Board</h5>
            {{-- <p class="text-muted mb-0">Access the digital display board</p> --}}
          </div>
        </div>

        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-grid service-icon"></i>
            <h5 class="fw-bold">NJDG</h5>
            {{-- <p class="text-muted mb-0">National Judicial Data Grid</p> --}}
          </div>
        </div>

        <div class="service-tile d-flex">
          <div class="service-card">
            <i class="bi bi-globe service-icon"></i>
            <h5 class="fw-bold">eCourts</h5>
            {{-- <p class="text-muted mb-0">Access the digital display board</p> --}}
          </div>
        </div>
      </div>
    </section>

    <div class="news-wrap p-3">
      <div class="d-flex justify-content-between align-items-start">
        <h4 class="mb-3 fw-bold">Latest News & Updates</h4>
        {{-- <small class="text-muted">Showing 3 per slide</small> --}}
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
      <h4 class="fw-bold">Notice Board</h4>
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
          <div class="text-end mt-2">
            <a href="#" class="link-primary small">View more</a>
          </div>
        </div>
      </div>
    </div>
    
      <!-- Videos section (added below Notifications) -->
      {{-- <div class="videos-wrap p-3">
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
                <iframe src="https://www.youtube.com/embed/5qap5aO4i9A" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

      <!-- App download callout -->
    <section class="app-downloads mt-4 mb-4">
      <div class="download-wrap">
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