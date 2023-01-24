@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Permissions
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
                            {{ $permission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Title
                        </th>
                        <td>
                            {{ $permission->title }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <a class="btn btn-secondary" href="{{ route('admin.permissions.index') }}">
                Back to list
            </a>
        </div>
    </div>
</div>
@endsection
