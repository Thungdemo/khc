@extends('layouts.portal')
@section('content')

<div class="container site-main">
  <div class="mb-4">
    <h2 class="mb-1 fw-bold">Notice Board</h2>
    <p class="text-muted mb-0">Browse official notices, circulars, tenders and announcements</p>
  </div>

  <!-- Filter Section -->
  <div class="mb-4">
    <form method="GET" action="{{ route('portal.notice.index',$noticeCategory) }}">
      <div class="d-flex gap-2 align-items-end">
        <div class="flex-grow-1">
          <label for="search" class="form-label small fw-semibold mb-1">Search Notices</label>
          <input type="text" name="title" id="search" class="form-control" placeholder="Search by title or keywords..." value="{{request('title')}}">
        </div>
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-search"></i> Search
        </button>
        <a class="btn btn-secondary" href="{{route('portal.notice.index',$noticeCategory)}}">
          
          <i class="bi bi-arrow-counterclockwise"></i> Clear
        </a>
      </div>
    </form>
  </div>

  <!-- Tabbed Notice Layout -->
  <div class="card-wrap p-3">
    {{-- <h4 class="fw-bold">Notice Board</h4> --}}
    <ul class="nav nav-tabs mt-3 mb-2" role="tablist">
      @foreach($noticeCategories as $item)
      <li class="nav-item">
        <a class="nav-link {{$item->id==$noticeCategory->id ? 'active' : ''}}" href="{{route('portal.notice.index',$item)}}">{{$item->name}}</a>
      </li>
      @endforeach
    </ul>
    <div class="tab-content">
      <div class="tab-pane show active" id="content-general" role="tabpanel">
        <ul class="list-group list-notif">
          @foreach($notices as $notice)
            <li class="list-group-item d-flex align-items-start py-1">
              <div class="icon"><i class="bi bi-file-earmark-text-fill"></i></div>
              <div class="flex-grow-1">
                <div class="d-flex align-items-center flex-wrap gap-2">
                  <a class="notif-link" href="{{ $notice->documentUrl() }}" target="_blank">{{ $notice->title }}</a>
                  @foreach($notice->noticeChildren as $child)
                    <span class="text-muted">&nbsp;•&nbsp;</span>
                    <a class="notif-link" href="{{ $child->documentUrl() }}" target="_blank">{{ $child->title }}</a>
                  @endforeach
                </div>
                <div class="post-date mt-1 mb-0">{{ \App\Helpers\DateHelper::display($notice->published_at) }}</div>
              </div>
            </li>
          @endforeach
        </ul>
        <div class="text-end mt-4">
          {{ $notices->withQueryString()->links() }}
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