@extends('layouts.portal')
@section('content')
<div class="container site-main">
    <div class="mb-4">
        <h2 class="mb-1 fw-bold">STATEMENT OF GAUHATI HIGH COURT KOHIMA</h2>
        {{-- <p class="text-muted mb-0">List of Advocate Generals who have served the Gauhati High Court Kohima Bench</p> --}}
    </div>
    <div class="row g-2">
        @foreach($years as $year => $statistics)
        <div class="col-sm-6 col-md-2">
            <div class="card-wrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="fw-semibold">{{$year}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statistics as $statistic)
                        <tr>
                            <td>
                                <a href="{{ $statistic->documentUrl() }}" class="text-decoration-none" target="_blank">{{ $statistic->month_name }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection