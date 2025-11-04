@extends('layouts.portal')
@section('content')

<div class="container site-main">
  <div class="mb-4">
    <h2 class="mb-1 fw-bold">Contact Us</h2>
    <p class="text-muted mb-0">Get in touch with Gauhati High Court Kohima Bench</p>
  </div>

  <div class="row g-4">
    <!-- Contact Information -->
    <div class="col-12">
      <div class="card-wrap mb-4">
        <div class="card-body p-4">
          <h4 class="fw-bold mb-4">Contact Information</h4>
          
          <!-- Office Address -->
          <div class="contact-item mb-4">
            <div class="d-flex align-items-start">
              <div class="contact-icon me-3">
                <i class="bi bi-geo-alt-fill fs-4"></i>
              </div>
              <div>
                <h6 class="fw-semibold mb-1">Office Address</h6>
                <p class="mb-0">
                  Gauhati High Court Kohima Bench<br>
                  Old Minister's Hill<br>
                  Kohima, Nagaland
                </p>
              </div>
            </div>
          </div>

          <!-- Phone Numbers -->
          <div class="contact-item mb-4">
            <div class="d-flex align-items-start">
              <div class="contact-icon me-3">
                <i class="bi bi-telephone-fill fs-4"></i>
              </div>
              <div>
                <h6 class="fw-semibold mb-1">Phone Numbers</h6>
                <p class="mb-1">
                  +91 370 2229374
                </p>
                <p class="mb-0">
                  +91 370 2243438
                </p>
              </div>
            </div>
          </div>

          <!-- Fax -->
          <div class="contact-item mb-4">
            <div class="d-flex align-items-start">
              <div class="contact-icon me-3">
                <i class="bi bi-printer-fill fs-4"></i>
              </div>
              <div>
                <h6 class="fw-semibold mb-1">Fax</h6>
                <p class="mb-0">+91 370 2244963</p>
              </div>
            </div>
          </div>

          <!-- Email Addresses -->
          <div class="contact-item mb-4">
            <div class="d-flex align-items-start">
              <div class="contact-icon me-3">
                <i class="bi bi-envelope-fill fs-4"></i>
              </div>
              <div>
                <h6 class="fw-semibold mb-1">Email Addresses</h6>
                <p class="mb-1">
                  kohima.bench[at]gmail[dot]com
                </p>
                <p class="mb-1">
                  regghckohima[at]gmail[dot]com
                </p>
                <p class="mb-0">
                  nagaland-ghc[at]aij[dot]gov[dot]in
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Map Section -->
  <div class="row mt-4">
    <div class="col-12">
      <div class="card-wrap mb-4">
        <div class="card-body p-4">
          <h4 class="fw-bold mb-4">Location</h4>
          <div class="ratio ratio-21x9">
            <iframe 
              src="{{ config('khc.location.google_maps_embed') }}"
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"
              title="Gauhati High Court Kohima Bench Location">
            </iframe>
          </div>
          <p class="text-muted mt-3 mb-0">
            <i class="bi bi-info-circle me-1"></i>
            Click on the map to get directions to Gauhati High Court Kohima Bench
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection