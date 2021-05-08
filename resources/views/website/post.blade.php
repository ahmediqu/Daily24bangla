@extends('layouts.app')
@section('content')
    <section id="mainContent">

        <div class="row">
            <div class="col-lg-12">
                <div class="banner"><a href="#"><img src="{{ url('webiste/images/banner-ad.jpg') }}" alt=""></a></div>
            </div>
        </div>

        <div class="content_bottom">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="content_bottom_left">
                        <div class="single_page_area">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active"
                                    aria-current="page">  {{ $post->category ? $post->category->name : '' }}</li>
                            </ol>
                            <h2 class="post_titile"> {{ $post->title }} </h2>
                            <div class="single_page_content">
                                <div class="post_commentbox"><a href="#"><i class="fa fa-user"></i>Daily24bangla</a>
                                    <span><i
                                            class="fa fa-calendar"></i> {{ date('d m', strtotime($post->created_at)) }}</span>
                                    <a href="{{ url('/') }}"><i
                                            class="fa fa-tags"></i>{{ $post->category ? $post->category->name : '' }}
                                    </a>
                                </div>

                                @if(!empty($post->image) && file_exists(public_path($post->image)))
                                    <img src="{{ url($post->image) }}" class="img-center" alt="{{ $post->title }}">
                                @else
                                    <img src="{{ url('webiste/default-image/news.jpg') }}" class="img-center"
                                         alt="{{ $post->title }}">
                                @endif

                                <div>
                                    <p>
                                        {!! $post->description !!}
                                    </p>
                                </div>


                            </div>
                        </div>
                    </div>
{{--                    <div class="post_pagination">--}}
{{--                        <div class="prev"><a class="angle_left" href="#"><i class="fa fa-angle-double-left"></i></a>--}}
{{--                            <div class="pagincontent"><span>Previous Post</span> <a href="#">Aliquam quam orci in--}}
{{--                                    molestie a--}}
{{--                                    tempor nec</a></div>--}}
{{--                        </div>--}}
{{--                        <div class="next">--}}
{{--                            <div class="pagincontent"><span>Next Post</span> <a href="#">{{ $next->title }}</a></div>--}}
{{--                            <a class="angle_right" href="#"><i class="fa fa-angle-double-right"></i></a></div>--}}
{{--                    </div>--}}
                    <div class="share_post">
                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>Twitter</a>
                        <a class="linkedin" href="#"><i class="fa fa-linkedin"></i>LinkedIn</a>
                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>Pinterest</a>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="content_bottom_right">
                        <div class="single_bottom_rightbar">
                            <h2>Recent Post</h2>
                            <ul class="small_catg popular_catg wow fadeInDown animated"
                                style="visibility: visible; animation-name: fadeInDown;">
                                @foreach($posts as $post)
                                    <li>
                                        <div class="media wow fadeInDown animated"
                                             style="visibility: visible; animation-name: fadeInDown;">
                                            <a href="{{ url('post', $post->slug) }}"  class="media-left">
                                                @if(!empty($post->image) && file_exists(public_path($post->image)))
                                                    <img src="{{ url($post->image) }}" alt="{{ $post->title }}">
                                                @else
                                                    <img src="{{ url('webiste/default-image/news.jpg') }}" alt="{{ $post->title }}">
                                                @endif
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="{{ url('post', $post->slug) }}"> {{ $post->title }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="single_bottom_rightbar">
                            <h2>Blog Archive</h2>
                            <div class="blog_archive wow fadeInDown animated"
                                 style="visibility: visible; animation-name: fadeInDown;">
                                <form action="#">
                                    <select>
                                        <option value="">Blog Archive</option>
                                        <option value="">October(20)</option>
                                    </select>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
