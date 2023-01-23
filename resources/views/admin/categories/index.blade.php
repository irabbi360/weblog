@extends('layouts.master')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-transparent">
            <h6 class="card-title float-start">Category List</h6>
            <div class="card-title float-end btn btn-primary btn-sm">
                <a href="{{ route('admin.categories.create') }}" class="text-white">Add New</a>
            </div>
        </div>
        @if(session('message'))
            <div class="bg-success">{{ session('message') }}</div>
    @endif
    <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th style="width: 40px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}">
                                <span class="badge bg-primary">Edit</span>
                            </a>
                            <form id="delete-form-{{ $category->id }}" method="post"
                                  action="{{ route('admin.categories.destroy', $category->id) }}"
                                  style="display: none">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                            </form>
                            <a href="" class="badge bg-danger text-white" onclick="
                                if(confirm('Are you sure, You want to Delete this ??'))
                                {
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $category->id }}').submit();
                                }
                                else {
                                event.preventDefault();
                                }">Delete
                            </a>
                            {{--<span class="badge bg-danger">Delete</span>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-transparent clearfix">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
