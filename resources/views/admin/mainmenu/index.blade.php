@extends('admin.app')

@section('content')
    <h3>Main Menu</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    <a href="{{ url('admin/mainmenu/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Main Menu</a>
    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Title</th>
                <th>Parent</th>
                <th>Category</th>
                <th>Content</th>
                <th>File</th>
                <th>Url</th>
                <th>Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @if (count($data) > 0)
            @foreach($data as $mainmenu)
                <tr>
                    <td>{{ $mainmenu->title }}</td>
                    <td>{{ $mainmenu->parent }}</td>
                    <td>{{ $mainmenu->category }}</td>
                    {{-- CONTENT --}}
                    @if ($mainmenu->content !== NULL)
                        <td>{!! substr($mainmenu->content,3) !!}</td>
                    @else
                        <td class="text-center">-</td>
                    @endif
                    {{-- FILE --}}
                    @if ($mainmenu->file === NULL || $mainmenu->file == '')
                        <td class="text-center">-</td>
                    @else
                        <td><img src="{{ url($mainmenu->file) }}" width="100px;"></td>
                    @endif
                    {{-- URL --}}
                    @if ($mainmenu->url !== NULL)
                        <td>{{ $mainmenu->url }}</td>
                    @else
                        <td class="text-center">-</td>
                    @endif
                        <td>{{ $mainmenu->order }}</td>
                    @if ($mainmenu->status == 1)
                        <td>Publish</td>
                    @elseif ($mainmenu->status == 0)
                        <td>Tidak Publish</td>
                    @else
                        <td>Tidak Diketahui</td>
                    @endif
                    <td>
                        <a href="{{ url('admin/mainmenu/edit/'.$mainmenu->id) }}" class="btn btn-primary btn-md"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ url('admin/mainmenu/delete/'.$mainmenu->id) }}" class="btn btn-danger btn-md"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr><td align='center' colspan='9'>Tidak Ada Data</td></tr>
        @endif
    </table>
@endsection