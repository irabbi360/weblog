@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        Create Role
    </div>

    <div class="card-body">
        <form action="{{ route("admin.roles.store") }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title">Title*</label>
                <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('title', isset($role) ? $role->name : '') }}" required>
                @error('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="permissions">Permissions*
                    <span class="btn btn-info btn-xs select-all">Select All</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect All</span></label>
                <select name="permissions[]" id="permissions" class="form-control select2 @error('permissions') is-invalid @enderror" multiple="multiple" required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @error('permissions'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary me-2" type="submit">Save</button>
        <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}">
            Back to list
        </a>
    </div>
</div>
@endsection

