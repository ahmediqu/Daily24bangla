@extends('layouts.app')
@section('content')
    <section id="mainContent">

        <div class="row">
            <div class="col-lg-12">
                <div class="banner"><a href="#"><img src="{{ url('webiste/images/banner-ad.jpg') }}" alt=""></a></div>
            </div>
        </div>

        <div class="content_top">
            <div class="row no-gutters">
                <div class="col-lg-5 col-md-12">
                    <div class="latest_slider">
                        <div class="slick_slider">
                            @foreach($posts as $post)
                                <div class="single_iteam">
                                    @if(!empty($post->image) && file_exists(public_path($post->image)))
                                        <img src="{{ url($post->image) }}" alt="{{ $post->title }}">
                                    @else
                                        <img src="{{ url('webiste/default-image/news.jpg') }}" alt="{{ $post->title }}">
                                    @endif
                                    <h2>
                                        <a class="slider_tittle"
                                           href="{{ url('post',$post->slug) }}">{{ $post->title }}</a>
                                    </h2>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="business_category_right wow fadeInDown">
                        <ul class="small_catg">
                            <?php $i = 0; ?>
                            @foreach($posts as $post)
                                <?php
                                $i++;
                                if($i <= 4 ) {
                                ?>
                                <li>
                                    <div class="media wow fadeInDown">
                                        <a class="media-left" href="{{ url('post',$post->slug) }}">
                                            @if(!empty($post->image) && file_exists(public_path($post->image)))
                                                <img src="{{ url($post->image) }}" alt="{{ $post->title }}">
                                            @else
                                                <img src="{{ url('webiste/default-image/news.jpg') }}"
                                                     alt="{{ $post->title }}">
                                            @endif
                                        </a>
                                        <div class="media-body">
                                            <h2><a href="{{ url('post',$post->slug) }}">{{ $post->title }}</a></h2>
                                        </div>
                                    </div>
                                </li>
                                <?php  } ?>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="banner-left"><a href="#"><img src="{{ url('webiste/images/banner-left.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="content_bottom">
            <div class="">
                <div class="row no-gutters">

                    @foreach($categories_posts as $category)
                        @if(count($category->posts) > 0)
                            <div class="col-lg-10 my-3">
                                <ul class="wow fadeInDown">
                                    <li>
                                        <h4 class="title"> {{ $category->name }} </h4>
                                    <li>
                                        <div class="row">
                                            @foreach($category->posts as $post)
                                                <div class="col-md-4 my-2">
                                                    <div class="card">
                                                        @if(!empty($post->image) && file_exists(public_path($post->image)))
                                                            <img src="{{ url($post->image) }}"
                                                                 class="card-img-top custom-responsive-img"
                                                                 alt="{{ $post->title }}" class="img-fluid">
                                                        @else
                                                            <img src="{{ url('webiste/default-image/news.jpg') }}"
                                                                 class="card-img-top" class="img-fluid"
                                                                 alt="{{ $post->title }}">
                                                        @endif

                                                        <div class="card-body">
                                                            <h5 class="card-title mb-0">{{ $post->title }}</h5>
                                                            <p class="card-text mb-0"> {{ $post->sort_description }}</p>
                                                            <a href="#" class="text-danger">read more..</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                </ul>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>

            <div class="other-categories mt-3">
                <div class="row">
                    @foreach($categories_posts as $category)
                        @if(count($category->posts) > 0)
                            <div class="col-lg-4 my-3">
                                <ul class="wow fadeInDown">
                                    <li>
                                        <h4 class="title"> {{ $category->name }} </h4>
                                    <li>
                                    @foreach($category->posts as $post)
                                        <li class="">
                                            <div class="media wow fadeInDown">
                                                <a class="media-left" href="{{ url('post',$post->slug) }}">
                                                    @if(!empty($post->image) && file_exists(public_path($post->image)))
                                                        <img src="{{ url($post->image) }}" alt="{{ $post->title }}"
                                                             class="img-fluid">
                                                    @else
                                                        <img src="{{ url('webiste/default-image/news.jpg') }}"
                                                             class="img-fluid"
                                                             alt="{{ $post->title }}">
                                                    @endif
                                                </a>
                                                <div class="media-body">
                                                    <h2><a href="#"> {{ $post->title }} </a></h2>
                                                    <p>  {{ $post->sort_description }} </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
    </section>
@endsection
