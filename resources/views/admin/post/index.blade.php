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
                <th>Content</th>
                <th>Thumbnail</th>
                <th>Category</th>
                <th>Headline</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @if (count($data) > 0)
            @foreach($data as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{!! substr($post->content,3) !!}</td>
                    <td><img src="{{ url($post->thumbnail) }}" width="100px;"></td>
                    <td class="text-center">{{ $post->category->name }}</td>
                    @if ($post->is_headline == 1)
                        <td class="text-center">Yes</td>
                    @elseif ($post->is_headline == 0)
                        <td class="text-center">No</td>
                    @else
                        <td class="text-center">Unknown</td>
                    @endif
                    @if ($post->status == 1)
                        <td class="text-center">Yes</td>
                    @elseif ($post->status == 0)
                        <td class="text-center">No</td>
                    @else
                        <td class="text-center">Unknown</td>
                    @endif
                    <td>
                        <a href="{{ url('admin/post/edit/'.$post->id) }}" class="btn btn-primary btn-md"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ url('admin/post/delete/'.$post->id) }}" class="btn btn-danger btn-md"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr><td align='center' colspan='8'>Tidak Ada Data</td></tr>
        @endif
    </table>
@endsection