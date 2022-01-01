@extends('admin.app')

@section('content')
    <h3>Create Slider</h3>
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
            <input type="text" name="title" class="form-control">
            <label for="image">Image</label>
            <input id="image" type="file" name="image" class="form-control">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <label for="URL">URL</label>
            <input id="url" type="text" name="url" class="form-control">
            <label for="Order">Order</label>
            <input type="number" name="order" class="form-control">
            <label for="Status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0">Tidak Publish</option>
                <option value="1">Publish</option>
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
    {{-- <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var content = document.getElementById("content");
        CKEDITOR.replace(content, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script> --}}
@endsection