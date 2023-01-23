@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>
                    <h3 class="card-title float-right btn btn-primary">
                        <a href="{{ url('categories/create') }}" class="text-white">Add New</a>
                    </h3>
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
                                    <a href="{{ url('categories', $category->id) }}">
                                        <span class="badge bg-primary">Edit</span>
                                    </a>
                                    <form id="delete-form-{{ $category->id }}" method="post"
                                          action="{{ url('categories-delete', $category->id) }}"
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
                <div class="card-footer clearfix">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
