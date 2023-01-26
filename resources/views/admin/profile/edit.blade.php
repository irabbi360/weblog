@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Profile
    </div>

    <div class="card-body">
        <form action="{{ route("admin.permissions.update", [$permission->id]) }}" method="POST" enctype="multipart/form-data" id="permission-update-form">
            @csrf
            @method('PUT')
            <div class="mb-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">Title*</label>
                <input type="text" id="title" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>
            <div class="mb-3 {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Title*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($permission) ? $permission->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
            </div>
            <div>
                <button class="btn btn-primary me-2" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

