@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Comments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Comment List</h3>
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
                                @foreach($comments as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->title }}</td>
                                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ url('tags', $tag->id) }}">
                                            <span class="badge bg-primary">Edit</span>
                                        </a>
                                        <form id="delete-form-{{ $tag->id }}" method="post" action="{{ url('tags-delete', $tag->id) }}" style="display: none">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <a href="" class="badge bg-danger text-white" onclick="
                                            if(confirm('Are you sure, You want to Delete this ??'))
                                            {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $tag->id }}').submit();
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
                            {{ $tags->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
