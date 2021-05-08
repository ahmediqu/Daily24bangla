@extends('layouts.app')
@section('content')
    <style>
        .single_category {
            width: 100% !important;;
        }
    </style>
    <section id="mainContent">
        <div class="content_bottom">
            <div class="row no-gutters">
                <div class="col-lg-8 col-md-8">
                    <div class="content_bottom_left">
                        <div class="single_category wow fadeInDown animated"
                             style="visibility: visible; animation-name: fadeInDown;">
                            <div class="archive_style_1">
                                <div style="margin-top:15px;">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"></li>
                                        </ol>
                                    </nav>

                                </div>
                                <h2><span class="bold_line"><span></span></span> <span class="solid_line"></span> <span
                                        class="title_text">Latest Updates</span></h2>
                                <div class="business_category_left wow fadeInDown animated"
                                     style="visibility: visible; animation-name: fadeInDown;">
                                    <ul class="fashion_catgnav">
                                        @if(count($category_posts))
                                            @foreach($category_posts as $post)
                                                <li>
                                                    <div class="catgimg2_container">
                                                        <a href="">
                                                            @if(!empty($post->image) && file_exists(public_path($post->image)))
                                                                <img src="{{ url($post->image) }}" alt="{{ $post->title }}">
                                                            @else
                                                                <img src="{{ url('webiste/default-image/news.jpg') }}" alt="{{ $post->title }}">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <h2 class="catg_titile">
                                                        <a href="">{{ $post->title }}</a>
                                                    </h2>
                                                    <div class="comments_box">
                                                        <span class="meta_date">14/12/2045</span>
                                                        <span class="meta_more"><a href="{{ url('post', $post->slug) }}">Read More...</a></span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                              <h2 class="text-center">No data found</h2>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
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
                                            <a href="{{ url('post', $post->slug) }}" class="media-left">
                                                @if(!empty($post->image) && file_exists(public_path($post->image)))
                                                    <img src="{{ url($post->image) }}" alt="{{ $post->title }}">
                                                @else
                                                    <img src="{{ url('webiste/default-image/news.jpg') }}"
                                                         alt="{{ $post->title }}">
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
