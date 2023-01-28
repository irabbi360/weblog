@extends('layouts.master')
@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-header">
        Create Permission
    </div>

    <div class="card-body">
        <form action="{{ route("admin.permissions.store") }}" method="POST" enctype="multipart/form-data" id="permission-create-form">
            @csrf
            <div class="mb-2">
                <label for="title">Name*</label>
                <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                @error('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary me-2" type="submit">Save</button>
        <a class="btn btn-secondary" href="{{ route('admin.permissions.index') }}">
            Back to list
        </a>
    </div>
</div>
@endsection

