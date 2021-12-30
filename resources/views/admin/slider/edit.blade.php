@extends('admin.app')

@section('content')
    <h3>Edit Slider</h3>
    <hr>
    <div class="col-lg-6">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('admin/slider/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $data->title }}">
            <label for="image">Image</label><br>
            <img src="{{ url($data->image) }}" alt="image" style="max-height: 200px; max-width: 200px;">
            <input id="image" type="file" name="image" class="form-control">
            <label for="URL">URL</label>
            <input id="link" type="text" name="url" class="form-control" value={{ $data->url }}>
            <label for="Order">Order</label>
            <input type="number" name="order" class="form-control" value={{ $data->order }}>
            <label for="Status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0" {{ ($data->status == 0) ? 'selected' : '' }} >Tidak Publish</option>
                <option value="1" {{ ($data->status == 1) ? 'selected' : '' }} >Publish</option>
            </select>
            <br>            
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/slider') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </form>
    </div>
@endsection

@section('js')
    {{-- <script>
        $(document).ready(function() {
            $('#contents').hide();
            $('#links').hide();
            $('#files').hide();

            $('#category').on('change', function() {
                var data = $(this).val();
                $('#contents').hide();
                $('#links').hide();
                $('#files').hide();
                $('#'+data+'s').show();
            });
        });
    </script> --}}
    {{-- <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script> --}}
    {{-- <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        var content = document.getElementById("content");
        CKEDITOR.replace(content, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script> --}}
@endsection