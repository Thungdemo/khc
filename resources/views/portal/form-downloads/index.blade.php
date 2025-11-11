@extends('layouts.portal')
@section('content')
<div class="container site-main">
    <div class="mb-4">
        <h2 class="mb-1 fw-bold">Form Downloads</h2>
        <p class="hc-text-muted mb-0">Download forms and documents from Gauhati High Court Kohima Bench</p>
    </div>
    
    <div class="card-wrap">
        <table class="pdf-table">
            <tbody>
                @foreach($formDownloads as $formDownload)
                <tr>
                    <td>
                        <a href="#" target="_blank" rel="noopener noreferrer">
                        <img src="{{asset('images/pdf.svg')}}" alt="PDF" class="pdf-icon">
                        {{ $formDownload->title }}
                        </a>
                    </td>
                    <td class="text-end">
                        <div class="publish-date">{{$formDownload->documentSize()}}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection