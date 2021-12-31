@extends('portal.app')

@section('sc-css')
    <link rel="stylesheet" href="{{ url('assets/02-Single-post/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/02-Single-post/css/responsive.css') }}">
@endsection

@section('content')
    <div class="single-post">
        <div class="image-wrapper"><img src="{{ url('assets/images/blog-1-1000x600.jpg') }}" alt="Blog Image"></div>

        <h3 class="title"><b class="light-color">Contact Me</b></h3>
        <p class="desc">JIka mengalami masalah saat mengakses website, silahkan menangis dipojokan. Maaf bercandanya kelewatan, terima kasih.</p>
    </div><!-- single-post -->

    <div class="leave-comment-area">
        <h4 class="title"><b class="light-color">Leave a comment</b></h4>
        <div class="leave-comment">
            <form method="post" action="{{ url('comment') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <input class="name-input" type="text" placeholder="Name">
                    </div>
                    <div class="col-sm-6">
                        <input class="email-input" type="text" placeholder="Email">
                    </div>
                    <div class="col-sm-12">
                        <input class="subject-input" type="text" placeholder="Subject">
                    </div>
                    <div class="col-sm-12">
                        <textarea class="message-input" rows="6" placeholder="Message"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-2"><b>COMMENT</b></button>
                    </div>
                </div><!-- row -->
            </form>
        </div><!-- leave-comment -->
    </div><!-- comments-area -->
@endsection