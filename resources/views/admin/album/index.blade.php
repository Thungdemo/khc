@extends('layouts.admin')
@section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('admin.album.index') }}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Albums</h4>
        <a class="btn btn-primary" href="{{route('admin.album.create')}}">Add Album</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Images Count</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($albums as $album)
                <tr>
                    <td>{{ $album->title }}</td>
                    <td>{{ $album->publish_date }}</td>
                    <td>
                        {{ $album->gallery_images_count }} images
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('admin.album.gallery-images.create', $album) }}">Add Images</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.album.edit', $album) }}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.album.destroy', $album) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this album?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <i class="bi bi-collection display-1 text-muted mb-3"></i>
                        <h5 class="text-muted">No Albums Found</h5>
                        <p class="text-muted mb-4">Get started by creating your first album.</p>
                        <a href="{{ route('admin.album.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i>Create First Album
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $albums->links() }}
@endsection