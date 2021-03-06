@extends('admin.app')

@section('content')
    <h3>Create Main Menu</h3>
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
        <form action="{{ url('admin/mainmenu/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
            <label for="parent">Parent</label>
            <select name="parent" id="parent" class="form-control">
                <option value="0">-</option>
                @foreach ($parent as $data)
                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                @endforeach
            </select>
            <label for="category_id">Category</label>
            <select name="category" id="category" class="form-control">
                <option value="link">Link</option>
                <option value="content">Content</option>
                <option value="file">File</option>
            </select>
            <div id="links">
                <label for="url">URL</label>
                <input name="url" id="url" type="text" class="form-control">
            </div>
            <div id="contents">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="50" rows="10" class="form-control"></textarea>
            </div>
            <div id="files">
                <label for="file">File</label>
                <input name="file" id="file" type="file" class="form-control">
            </div>
            {{-- <label for="content">Content</label>
            <textarea name="content" id="content" cols="50" rows="10" class="form-control"></textarea>
            <label for="file">File</label>
            <input id="file" type="file" name="file" class="form-control">
            <label for="URL">URL</label>
            <input id="link" type="text" name="url" class="form-control"> --}}
            <label for="Order">Order</label>
            <input type="number" name="order" class="form-control">
            <label for="Status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0">Tidak Publish</option>
                <option value="1">Publish</option>
            </select>
            <br>            
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/mainmenu') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#links').show();
            $('#contents').hide();
            $('#files').hide();

            $('#category').on('change', function() {
                var data = $(this).val();
                $('#contents').hide();
                $('#links').hide();
                $('#files').hide();
                $('#'+data+'s').show();
            });
        });
    </script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var content = document.getElementById("content");
        CKEDITOR.replace(content, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection