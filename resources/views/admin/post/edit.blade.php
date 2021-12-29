@extends('admin.app')

@section('content')
    <h3>Edit Post</h3>
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
        <form action="{{ url('admin/post/edit/'.$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title</label>
            <input type="text" value="{{ $data->title }}" name="title" class="form-control">
            <label for="thumbnail">Thumbnail</label><br>
            <img src="{{ url($data->thumbnail) }}" alt="thubmnail" style="max-height: 200px; max-width: 200px;">
            <input type="file" name="thumbnail" class="form-control">
            <label for="category">Category</label>
            <select name="categories_id" id="category" class="form-control">
                {{-- <option>Choose Category</option> --}}
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}" class="form-edit" {{ ($data->category_id == $cat->id) ? 'selected' : ''}}>{{ $cat->name }}</option>
                @endforeach
            </select>
            <label for="headline">Headline</label>
            <select name="is_headline" id="is_headline" class="form-control">
                <option value="0" {{ ($data->is_headline == 0) ? 'selected' : '' }} >Tidak Headline</option>
                <option value="1" {{ ($data->is_headline == 1) ? 'selected' : '' }} >Headline</option>
            </select>
            <label for="headline">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0" {{ ($data->status == 0) ? 'selected' : '' }} >Tidak Publish</option>
                <option value="1" {{ ($data->status == 1) ? 'selected' : '' }} >Publish</option>
            </select>
            <br>
            <textarea name="content" id="content" cols="50" rows="10" class="form-control">{{ $data->content }}</textarea>
            <br>
            
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Edit Data">
            <a href="{{ url('admin/post') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </form>
    </div>
@endsection

@section('js')
    {{-- <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        var content = document.getElementById("content");
        CKEDITOR.replace(content, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection