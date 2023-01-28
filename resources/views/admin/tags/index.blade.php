@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="card-title float-start">Tag List</h6>
            <div class="card-title float-end btn btn-primary">
                <a href="{{ route('admin.tags.create') }}" class="text-white">Add New</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->title }}</td>
                            <td>{{ $tag->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('admin.tags.edit', $tag->id) }}">
                                    <span class="badge bg-primary">Edit</span>
                                </a>
                                <form id="delete-form-{{ $tag->id }}" method="post"
                                      action="{{ route('admin.tags.destroy', $tag->id) }}" style="display: none">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                </form>
                                <a href="javascript:void(0)" class="badge bg-danger text-white" onclick="
                                    if(confirm('Are you sure, You want to Delete this ??'))
                                    {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $tag->id }}').submit();
                                    }">Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="3" class="text-center">No data found!</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            {{ $tags->links() }}
        </div>
    </div>
@endsection
