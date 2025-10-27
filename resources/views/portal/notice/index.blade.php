@extends('layouts.portal')
@section('content')

<div class="container site-main">
  <div class="mb-4">
    <h2 class="mb-1 fw-bold">Notice Board</h2>
    <p class="text-muted mb-0">Browse official notices, circulars, tenders and announcements</p>
  </div>

  <!-- Filter Section -->
  <div class="notif-wrap p-3 mb-4">
    <form method="GET" action="{{ url()->current() }}">
      <div class="d-flex gap-2 align-items-end">
        <div class="flex-grow-1">
          <label for="search" class="form-label small fw-semibold mb-1">Search Notices</label>
          <input type="text" name="search" id="search" class="form-control" placeholder="Search by title, date, or keywords...">
        </div>
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-search"></i> Search
        </button>
      </div>
    </form>
  </div>

  <!-- Tabbed Notice Layout -->
  <div class="notif-wrap p-3">
    <h4 class="fw-bold">All Notices</h4>
    <ul class="nav nav-tabs mt-3 mb-2" role="tablist">
      <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#content-general" type="button" role="tab">General Notice</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#content-circulars" type="button" role="tab">Circulars</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#content-tenders" type="button" role="tab">Tenders</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#content-recruitment" type="button" role="tab">Recruitment</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#content-misc" type="button" role="tab">Miscellaneous</button>
      </li>
    </ul>

    <div class="tab-content">
      <!-- General Notice Tab -->
      <div class="tab-pane fade show active" id="content-general" role="tabpanel">
        <ul class="list-group list-notif">
          @php
            $generalNotices = [
              ['title' => 'Public Holiday Notification for Republic Day 2025', 'date' => 'Oct 24, 2025', 'file' => 'republic-day-2025.pdf'],
              ['title' => 'Important Notice regarding Online Service Portal Maintenance', 'date' => 'Oct 20, 2025', 'file' => 'portal-maintenance.pdf'],
              ['title' => 'Updated Guidelines for Document Submission Process', 'date' => 'Oct 18, 2025', 'file' => 'document-guidelines.pdf'],
              ['title' => 'Notice for Annual Departmental Meeting 2025', 'date' => 'Oct 13, 2025', 'file' => 'annual-meeting-2025.pdf'],
              ['title' => 'New Office Hours Effective from November 2025', 'date' => 'Oct 10, 2025', 'file' => 'office-hours.pdf'],
            ];
          @endphp
          @foreach($generalNotices as $notice)
            <li class="list-group-item d-flex align-items-center">
              <div class="icon"><i class="bi bi-file-earmark-text-fill"></i></div>
              <div class="flex-grow-1">
                <a class="notif-link" href="{{ asset('documents/' . $notice['file']) }}" target="_blank">{{ $notice['title'] }}</a>
              </div>
              <div class="text-muted">{{ $notice['date'] }}</div>
            </li>
          @endforeach
        </ul>
        <div class="text-end mt-2">
          <a href="#" class="link-primary small">View all General Notices</a>
        </div>
      </div>

      <!-- Circulars Tab -->
      <div class="tab-pane fade" id="content-circulars" role="tabpanel">
        <ul class="list-group list-notif">
          @php
            $circulars = [
              ['title' => 'Circular No. 45/2025 - Administrative Instructions', 'date' => 'Oct 22, 2025', 'file' => 'circular-45-2025.pdf'],
              ['title' => 'Circular No. 44/2025 - Leave Policy Updates', 'date' => 'Oct 15, 2025', 'file' => 'circular-44-2025.pdf'],
              ['title' => 'Circular No. 43/2025 - Court Fee Structure Revised', 'date' => 'Oct 8, 2025', 'file' => 'circular-43-2025.pdf'],
            ];
          @endphp
          @foreach($circulars as $notice)
            <li class="list-group-item d-flex align-items-center">
              <div class="icon"><i class="bi bi-file-earmark-text-fill"></i></div>
              <div class="flex-grow-1">
                <a class="notif-link" href="{{ asset('documents/' . $notice['file']) }}" target="_blank">{{ $notice['title'] }}</a>
              </div>
              <div class="text-muted">{{ $notice['date'] }}</div>
            </li>
          @endforeach
        </ul>
        <div class="text-end mt-2">
          <a href="#" class="link-primary small">View all Circulars</a>
        </div>
      </div>

      <!-- Tenders Tab -->
      <div class="tab-pane fade" id="content-tenders" role="tabpanel">
        <ul class="list-group list-notif">
          @php
            $tenders = [
              ['title' => 'Tender Notice for Building Maintenance Work 2025-26', 'date' => 'Oct 25, 2025', 'file' => 'tender-building-2025.pdf'],
              ['title' => 'Tender for Supply of Computer Equipment', 'date' => 'Oct 19, 2025', 'file' => 'tender-computers.pdf'],
              ['title' => 'Tender for Printing Services (Annual Contract)', 'date' => 'Oct 12, 2025', 'file' => 'tender-printing.pdf'],
            ];
          @endphp
          @foreach($tenders as $notice)
            <li class="list-group-item d-flex align-items-center">
              <div class="icon"><i class="bi bi-file-earmark-text-fill"></i></div>
              <div class="flex-grow-1">
                <a class="notif-link" href="{{ asset('documents/' . $notice['file']) }}" target="_blank">{{ $notice['title'] }}</a>
              </div>
              <div class="text-muted">{{ $notice['date'] }}</div>
            </li>
          @endforeach
        </ul>
        <div class="text-end mt-2">
          <a href="#" class="link-primary small">View all Tenders</a>
        </div>
      </div>

      <!-- Recruitment Tab -->
      <div class="tab-pane fade" id="content-recruitment" role="tabpanel">
        <ul class="list-group list-notif">
          @php
            $recruitment = [
              ['title' => 'Recruitment Notice for Junior Court Assistant Posts', 'date' => 'Oct 21, 2025', 'file' => 'recruitment-jca-2025.pdf'],
              ['title' => 'Selection List for Stenographer Grade III', 'date' => 'Oct 14, 2025', 'file' => 'selection-steno.pdf'],
              ['title' => 'Advertisement for Driver Posts - 2025', 'date' => 'Oct 7, 2025', 'file' => 'recruitment-driver.pdf'],
            ];
          @endphp
          @foreach($recruitment as $notice)
            <li class="list-group-item d-flex align-items-center">
              <div class="icon"><i class="bi bi-file-earmark-text-fill"></i></div>
              <div class="flex-grow-1">
                <a class="notif-link" href="{{ asset('documents/' . $notice['file']) }}" target="_blank">{{ $notice['title'] }}</a>
              </div>
              <div class="text-muted">{{ $notice['date'] }}</div>
            </li>
          @endforeach
        </ul>
        <div class="text-end mt-2">
          <a href="#" class="link-primary small">View all Recruitment Notices</a>
        </div>
      </div>

      <!-- Miscellaneous Tab -->
      <div class="tab-pane fade" id="content-misc" role="tabpanel">
        <ul class="list-group list-notif">
          @php
            $misc = [
              ['title' => 'Guidelines for Visiting Hours and Entry Passes', 'date' => 'Oct 23, 2025', 'file' => 'visiting-guidelines.pdf'],
              ['title' => 'Updated Contact Directory for Court Officials', 'date' => 'Oct 16, 2025', 'file' => 'contact-directory.pdf'],
            ];
          @endphp
          @foreach($misc as $notice)
            <li class="list-group-item d-flex align-items-center">
              <div class="icon"><i class="bi bi-file-earmark-text-fill"></i></div>
              <div class="flex-grow-1">
                <a class="notif-link" href="{{ asset('documents/' . $notice['file']) }}" target="_blank">{{ $notice['title'] }}</a>
              </div>
              <div class="text-muted">{{ $notice['date'] }}</div>
            </li>
          @endforeach
        </ul>
        <div class="text-end mt-2">
          <a href="#" class="link-primary small">View all Miscellaneous Notices</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Pagination (optional) -->
  {{-- <nav aria-label="Notice pagination" class="mt-4">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav> --}}
</div>

@endsection