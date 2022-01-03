@extends('admin.app')

@section('content')
    <h3>Message</h3>
    <hr>
    @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    {{-- <a href="{{ url('admin/message/create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Message</a> --}}
    <table class="table table-bordered">
        <thead class="bg-primary text-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message (Textarea: Read Only)</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        @if (count($data) > 0)
            @foreach($data as $message)
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->subject }}</td>
                    <td><textarea cols="100" rows="10" readonly>{{ $message->message }}</textarea></td>
                    {{-- <td>{!! substr($message->message,5) !!}</td> --}}
                    {{-- <td>
                        <a href="{{ url('admin/message/edit/'.$message->id) }}" class="btn btn-primary btn-md"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{ url('admin/message/delete/'.$message->id) }}" class="btn btn-danger btn-md"><i class="fas fa-trash"></i> Delete</a>
                    </td> --}}
                </tr>
            @endforeach
        @else
            <tr><td align='center' colspan='4'>Tidak Ada Data</td></tr>
        @endif
    </table>
@endsection