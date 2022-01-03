@extends('portal.app')

@section('sc-css')
    <link rel="stylesheet" href="{{ url('assets/portal/02-Single-post/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/portal/02-Single-post/css/responsive.css') }}">
@endsection

@section('content')
    <div class="single-post">
        <div class="image-wrapper"><img src="{{ url($data['user']->image) }}" alt="Blog Image"></div>

        <h3 class="title"><b class="light-color">Contact Me</b></h3>
        <p class="desc">JIka mengalami masalah saat mengakses website, silahkan menangis dipojokan. Eh maksudnya silahkan tinggalkan pesan dibawah ini, terima kasih.</p>
    </div><!-- single-post -->

    <div class="leave-comment-area">
        @if (Session::has('status'))
            <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
            </div>
        @endif
        <h4 class="title"><b class="light-color">Leave a message</b></h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="leave-comment">
            <form method="post" action="{{ url('contact') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <input class="name-input" type="text" placeholder="Name" name="name">
                    </div>
                    <div class="col-sm-6">
                        <input class="email-input" type="text" placeholder="Email" name="email">
                    </div>
                    <div class="col-sm-12">
                        <input class="subject-input" type="text" placeholder="Subject" name="subject">
                    </div>
                    <div class="col-sm-12">
                        <textarea class="message-input" rows="6" placeholder="Message" name="message"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-2"><b>SUBMIT MESSAGE</b></button>
                    </div>
                </div><!-- row -->
            </form>
        </div><!-- leave-comment -->
    </div><!-- comments-area -->
@endsection