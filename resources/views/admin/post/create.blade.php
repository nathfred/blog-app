@extends('admin.app')

@section('content')
    <h3>Create Post</h3>
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
        <form action="{{ url('admin/post/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            <label for="headline">Headline</label>
            <select name="is_headline" id="is_headline" class="form-control">
                <option value="0">Tidak Headline</option>
                <option value="1">Headline</option>
            </select>
            <label for="headline">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0">Tidak Publish</option>
                <option value="1">Publish</option>
            </select>
            <br>
            <textarea name="content" id="content" cols="50" rows="10" class="form-control"></textarea>
            <br>
            
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/post') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var content = document.getElementById("content");
        CKEDITOR.replace(content, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection