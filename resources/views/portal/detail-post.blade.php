@extends('portal.app')

@section('sc-css')
    {{-- <link href="{{ url('assets/portal/common-css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ url('assets/portal/common-css/ionicons.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ url('assets/portal/02-Single-post/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/portal/02-Single-post/css/responsive.css') }}">
@endsection

@section('content')
    <div class="single-post">
        <div class="image-wrapper"><img src="{{ url($posts->thumbnail) }}" alt="Blog Image"></div>

        <div class="icons">
            <div class="left-area">
                <a class="btn caegory-btn" href="#"><b>{{ $posts->category->name }}</b></a>
            </div>
            <ul class="right-area social-icons">
                <li><a href="#"><i class="ion-android-textsms"></i>{{ count($data['comment']) }}</a></li>
            </ul>
        </div>
        <p class="date"><em>{{ date('D, M Y',strtotime($posts->created_at)) }}</em></p>
        <h3 class="title"><a href="#"><b class="light-color">{{ $posts->title }}</b></a></h3>
        {!! $posts->content !!}

    </div><!-- single-post -->

    <div class="post-author">
        <div class="author-image"><a href="{{ url('about') }}"><img src="{{ url($data['user']->image) }}" alt="{{ $data['user']->name }}"></a></div>
        <div class="author-info">
            <h4 class="name"><a href="{{ url('about') }}"><b class="light-color">{{ $data['user']->name }}</b></a></h4>
            {!! $data['user']->desc !!}
        </div><!-- author-info -->
    </div><!-- post-author -->

    <div class="comments-area">
        <h4 class="title"><b class="light-color">{{ count($data['comment']) }} Comments</b></h4>
        @foreach($data['comment'] as $comment)
            <div class="comment">
                <div class="author-image"><img src="{{ url('assets/portal/images/author-2-150x150.jpg') }}" alt="Author Image"></div>
                <div class="comment-info">
                    <h5><b class="light-color">{{ $comment->name }}</b></h5>
                    <h6 class="date"><em>{{ date('D, M Y', strtotime($comment->created_at)) }}</em></h6>
                    <p>{{ $comment->comment }}</p>
                </div>
            </div><!-- comment -->
        @endforeach
    </div><!-- comments-area -->

    <div class="leave-comment-area">
        @if (Session::has('status'))
            <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
            </div>
        @endif
        <h4 class="title"><b class="light-color">Leave a comment</b></h4>
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
            <form method="post" action="{{ url('comment') }}">
                @csrf
                <input type="hidden" name="post_id" value="{{ $posts->id }}">
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
                        <textarea class="message-input" rows="6" placeholder="Comment" name="comment"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-2"><b>COMMENT</b></button>
                    </div>
                </div><!-- row -->
            </form>
        </div><!-- leave-comment -->
    </div><!-- comments-area -->

@endsection