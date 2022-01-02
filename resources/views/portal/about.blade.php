@extends('portal.app')

@section('sc-css')
    <link rel="stylesheet" href="{{ url('assets/portal/03-About-me/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/portal/03-About-me/css/responsive.css') }}">
@endsection

@section('content')
    <div class="single-post">
        <div class="image-wrapper"><img src="{{ url('assets/portal/images/blog-2-1000x600.jpg') }}" alt="Blog Image"></div>

        <div class="icons">
            <div class="left-area">
                <a class="btn caegory-btn" href="{{ url('about') }}"><b>About Me</b></a>
            </div>
            <ul class="right-area social-icons">
                {{-- <li><a href="#"><i class="ion-android-textsms"></i>{{ count($data['comment']) }}</a></li> --}}
            </ul>
        </div>
        <p class="date"><em>{{ date('D, M Y',strtotime($data['user']->updated_at)) }}</em></p>
        <h3 class="title"><a href="#"><b class="light-color">About Me</b></a></h3>
        {{-- {!! $data['user']->desc !!} --}}

        <h5 class="quoto"><em><i class="ion-quote"></i>Jika kamu berpikir kamu terlalu kecil untuk membuat sebuah perubahan, cobalah tidur di ruangan dengan seekor nyamuk.
        </em></h5>

        <div class="row">
            <div class="col-sm-6">
                <div class="image-wrapper"><img src="{{ url('assets/portal/images/blog-9-600x600.jpg') }}" alt="Blog Image"></div>
            </div><!-- col-sm-6 -->
            <div class="col-sm-6">
                <div class="image-wrapper"><img src="{{ url('assets/portal/images/blog-10-600x600.jpg') }}" alt="Blog Image"></div>
            </div><!-- col-sm-6 -->
        </div><!-- row -->


        <p class="desc">{{ $data['user']->desc }}</p>

        {{-- <div class="circular-pregress center-text">
            <div class="row">

                <div class="col-sm-4">
                    <div class="circliful" data-animation="1" data-animationStep="5" data-percent="75" data-foregroundBorderWidth="3"
                        data-backgroundBorderWidth="3" data-foregroundColor="#FFAD4D" data-backgroundColor="#ddd"
                        data-fontColor="#222"></div>
                    <h4><b class="light-color">Awsome</b></h4>
                    <h6 class="pre-writing">Etium nec odio</h6>
                </div><!-- col-sm-4 -->

                <div class="col-sm-4">
                    <div class="circliful" data-animation="1" data-animationStep="5" data-percent="83" data-foregroundBorderWidth="3"
                        data-backgroundBorderWidth="3" data-foregroundColor="#FFAD4D" data-backgroundColor="#ddd"
                        data-fontColor="#222"></div>
                    <h4><b class="light-color">Creative</b></h4>
                    <h6 class="pre-writing">Odio vestibum</h6>
                </div><!-- col-sm-4 -->

                <div class="col-sm-4">
                    <div class="circliful" data-animation="1" data-animationStep="5" data-percent="97" data-foregroundBorderWidth="3"
                        data-backgroundBorderWidth="3" data-foregroundColor="#FFAD4D" data-backgroundColor="#ddd"
                        data-fontColor="#222"></div>
                    <h4><b class="light-color">Oustsanding</b></h4>
                    <h6 class="pre-writing">Etium nec odio</h6>
                </div><!-- col-sm-4 -->

            </div><!-- row -->
        </div><!-- circular-pregress --> --}}

        {{-- <p class="desc">{{ $data['user']->desc }}</p> --}}

        <div class="embed-video" data-source="youtube"
            data-video-url="https://www.youtube.com/watch?v=C-Q7GeQG6iE"></div>

    </div><!-- single-post -->

    <div class="recomend-area">
        <h4 class="title"><b class="light-color">My recommendation</b></h4>
        <div class="row">
            
            @foreach($data['latestposts'] as $post)
                <div class="col-md-6">

                    <div class="recomend">
                        <div class="post-image"><img src="{{ url($post->thumbnail) }}" alt="Post Image"></div>

                        <div class="post-info">
                            <a class="btn caegory-btn" href="{{ url('category/'.$post->category->id) }}"><b>{{ $post->category->name }}</b></a>
                            <h5 class="title"><a href="{{ url('post-detail/'.$post->id) }}"><b class="light-color">{{ $post->title }}</b></a></h5>
                            <h6 class="date"><em>{{ date('D, M Y',strtotime($post->created_at)) }}</em></h6>
                            <p>{!! substr($post->content,0,300).(strlen($post->content) > 300 ? "..." : "") !!}</p>
                        </div><!-- post-info -->
                    </div><!-- recomend -->

                </div><!-- col-md-6 -->
            @endforeach

        </div><!-- row -->
    </div><!-- recomend-area -->
@endsection



						


	