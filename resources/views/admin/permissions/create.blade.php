@extends('layouts.master')
@section('content')

<div class="card border-0 shadow-sm">
    <div class="card-header">
        Create Permission
    </div>

    <div class="card-body">
        <form action="{{ route("admin.permissions.store") }}" method="POST" enctype="multipart/form-data" id="permission-create-form">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">Name*</label>
                <input type="text" id="title" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>
            <div>
                <button class="btn btn-primary me-2" type="submit">Save</button>
                <a class="btn btn-secondary" href="{{ route('admin.permissions.index') }}">
                    Back to list
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

