@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.user.edit', $user) }}
@endsection
@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Edit User</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.user.update', $user) }}" class="safe-submit" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}" required>
                <span class="text-danger small">@error('name') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Email *</label>
                <input type="text" class="form-control" name="email" value="{{old('email', $user->email)}}" required>
                <span class="text-danger small">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Roles *</label>
                @foreach($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="{{$role->name}}role" name="roles[]" value="{{$role->name}}" @checked(in_array($role->name, old('roles', $user->roles->pluck('name')->toArray())))>
                    <label class="form-check-label" for="{{$role->name}}role">
                    {{$role->display_name}} - <span class="text-muted">{{$role->description}}</span>
                    </label>
                </div>
                @endforeach
                <span class="text-danger small">@error('roles') {{ $message }} @enderror</span>
            </div>
            
            <div  id="noticeCategoriesSection" @class(['d-none' => !in_array('notice', old('roles', $user->roles->pluck('name')->toArray()))])>
                <label class="form-label d-block">Notice Categories *</label>
                @foreach($noticeCategories as $noticeCategory)
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        id="{{$noticeCategory->id}}noticeCategory" 
                        name="notice_categories[]" 
                        value="{{$noticeCategory->id}}" 
                        @checked(in_array($noticeCategory->id, old('notice_categories', $user->noticeCategories->pluck('id')->toArray())))
                    />
                    <label class="form-check-label" for="{{$noticeCategory->id}}noticeCategory">
                    {{$noticeCategory->name}}
                    </label>
                </div>
                @endforeach
                <span class="text-danger small">@error('notice_categories') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <div class="form-text text-muted small mb-2">
                    <i class="bi bi-info-circle me-1"></i>
                    Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.
                </div>
                <span class="text-danger small">@error('password') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation">
                <span class="text-danger small">@error('password_confirmation') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

@push('scripts')
@vite(['resources/js/admin/user.js'])
@endpush