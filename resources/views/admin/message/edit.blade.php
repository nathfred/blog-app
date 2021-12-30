@extends('admin.app')

@section('content')
    <h3>Edit Message</h3>
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
        <form action="{{ url('admin/message/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ $data->email }}">
            <label for="subject">Subject</label>
            <input type="text" name="subject" class="form-control" value="{{ $data->subject }}">
            <label for="message">message</label>
            <textarea name="message" id="message" cols="50" rows="10" class="form-control">{{ $data->message }}</textarea>
            <br>
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Tambah Data">
            <a href="{{ url('admin/message') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
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
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        var message = document.getElementById("message");
        CKEDITOR.replace(message, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection