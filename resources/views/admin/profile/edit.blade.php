@extends('admin.app')

@section('content')
    <h3>Edit Profile</h3>
    <hr>
    <div class="col-lg-6">
        @if (Session::has('status'))
            <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ url('admin/profile/'.$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" value="{{ $user->username }}" class="form-control">
            <label for="image">Image</label><br>
            <img src="{{ url($user->image) }}" alt="User Image" style="max-height: 200px; max-width: 200px;">
            <input type="file" name="image" class="form-control">
            <label for="desc">Description</label>
            <input type="text" name="desc" value="{{ $user->desc }}" class="form-control">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $user->email }}" class="form-control">
            <input type="submit" name="submit" class="btn btn-md btn-primary" value="Edit Data">
            <a href="{{ url('admin') }}" class="btn btn-md btn-warning"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
        </form>
    </div>
@endsection