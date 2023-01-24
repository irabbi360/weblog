@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Role
    </div>

    <div class="card-body">
        <div class="mb-2">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $role->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Title
                        </th>
                        <td>
                            {{ $role->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Permissions
                        </th>
                        <td>
                            @foreach($role->permissions as $id => $permissions)
                                <span class="badge bg-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}">
                Back to list
            </a>
        </div>
    </div>
</div>
@endsection
