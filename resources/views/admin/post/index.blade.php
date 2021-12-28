@extends('admin.app')

@section('content')
    <h3>Post</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    <a href="{{ url('admin/post/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Post</a>
    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Category_ID</th>
                <th>Headline</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($data as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td><img src="{{ url($post->thumbnail) }}" width="100px;"></td>
                <td>{{ $post->category_id }}</td>
                @if ($post->headline == 1)
                    <td>Yes</td>
                @elseif ($post->headline == 0)
                    <td>No</td>
                @else
                    <td>Unknown</td>
                @endif
                @if ($post->status == 1)
                    <td>Yes</td>
                @elseif ($post->status == 0)
                    <td>No</td>
                @else
                    <td>Unknown</td>
                @endif
                <td>
                    <a href="{{ url('admin/post/edit/'.$post->id) }}" class="btn btn-primary btn-md"><i class="fas fa-edit"></i> Edit</a>
                    <a href="{{ url('admin/post/delete/'.$post->id) }}" class="btn btn-danger btn-md"><i class="fas fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection