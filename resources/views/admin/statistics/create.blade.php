@extends('layouts.admin')
@section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }}
@endsection
@section('content')
    <h4 class="mb-4">Create Statistics</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.statistics.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Year *</label>
                <select class="form-select" name="year" rrr>
                    <option value="">Select Year</option>
                    @foreach($years as $yearValue => $yearLabel)
                        <option value="{{ $yearValue }}" {{ old('year') == $yearValue ? 'selected' : '' }}>
                            {{ $yearLabel }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger small">@error('year') {{ $message }} @enderror</span>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Month *</label>
                <select class="form-select" name="month" rrr>
                    <option value="">Select Month</option>
                    @foreach($months as $monthValue => $monthLabel)
                        <option value="{{ $monthValue }}" {{ old('month') == $monthValue ? 'selected' : '' }}>
                            {{ $monthLabel }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger small">@error('month') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload PDF *</label>
                <input type="file" class="form-control" name="document" accept="application/pdf" rrr>
                <div class="form-text small text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    Upload a PDF file containing the statistics report. Maximum file size: {{ \App\Models\Statistics::$documentMaxSize / 1024 }}MB. Only PDF files are allowed.
                </div>
                <span class="text-danger small">@error('document') {{ $message }} @enderror</span>
            </div>

            @if($errors->has('duplicate'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    {{ $errors->first('duplicate') }}
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection