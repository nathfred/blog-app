@extends('admin.app')

@section('content')
    <h3>Slider</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    <a href="{{ url('admin/slider/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Slider</a>
    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Url</th>
                <th>Order</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @if (count($data) > 0)
            @foreach($data as $slider)
                <tr>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->image }}</td>
                    {{-- URL --}}
                    @if ($slider->url !== NULL)
                        <td>{{ $slider->url }}</td>
                    @else
                        <td>-</td>
                    @endif
                    {{-- ORDER --}}
                    @if ($slider->order !== NULL)
                        <td>{{ $slider->order }}</td>
                    @else
                        <td>-</td>
                    @endif
                    {{-- STATUS --}}
                    @if ($slider->status == 1)
                        <td>Publish</td>
                    @elseif ($slider->status == 0)
                        <td>Tidak Publish</td>
                    @else
                        <td>Tidak Diketahui</td>
                    @endif
                    <td>
                        <a href="{{ url('admin/slider/edit/'.$slider->id) }}" class="btn btn-primary btn-md"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ url('admin/slider/delete/'.$slider->id) }}" class="btn btn-danger btn-md"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr><td align='center' colspan='6'>Tidak Ada Data</td></tr>
        @endif
    </table>
@endsection