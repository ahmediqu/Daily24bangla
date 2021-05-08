<!DOCTYPE html>
<html>

<head>
    <title>Daily24bangla</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('webiste/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('webiste/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('webiste/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('webiste/assets/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('webiste/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('webiste/assets/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('webiste/assets/css/responsive.css') }}">
<!--[if lt IE 9]>
    <script src="{{ url('webiste/assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ url('webiste/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>

<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="wsmenucontainer clearfix">
    <div class="container">
        <div class="header">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="header_top">
                        <div class="logo clearfix">
                            <a href="{{ url('/') }}" title="Responsive Slide Menus">
                                <h1 class="text-danger"> Daily24bangla </h1>
                            </a>
                        </div>
                        <div class="header_bottom_right"><a href="#"><img
                                    src="{{ url('webiste/images/banner-ad.jpg') }}" alt=""></a></div>
                    </div>
                    <div class="header_bottom">
                        <div class="row no-gutters">
                            <div class="col-lg-4 col-xs-12">

                                <div class="date-view">
                                    <div class="dhaka">
                                        <i class="fa fa-map-marker pr-2" aria-hidden="true"></i>ঢাকা,
                                    </div>
                                    <div class="eng">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?php

                                        use EasyBanglaDate\Types\BnDateTime;
                                        ?>

                                    </div>
                                    <div class="eng">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>

                                        <?php

                                        use EasyBanglaDate\Types\DateTime;

                                        $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));

                                        echo $date->format('l j F Y');
                                        ?>,

                                    </div>
                                    <div class="bangla">
                                        <?php



                                        $bongabda = new BnDateTime('now', new DateTimeZone('Asia/Dhaka'));
                                        echo $bongabda->format('j F Y');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-sm-block">
                                <div class='marquee desktop-view'>
                                    @foreach($posts as $post)
                                        <span> * <a href="{{ url('post',$post->slug) }}"
                                                    class="text-dark"> {{ $post->title }} </a></span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-2 col-xs-12">
                                <div class="left-social">
                                    <ul>
                                        <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
                                        <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
                                        <li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i> </a></li>
                                        <li><a href=""><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-block d-sm-none mobile-view">
                        <div class="wsmobileheader clearfix">
                            <a id="wsnavtoggle" class="animated-arrow"><span></span></a>
                        </div>
                        <div class='marquee'>
                            @foreach($posts as $post)
                                <span> <a href="{{ $post->slug }}"> {{ $post->title }} </a></span>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <!--Main Menu HTML Code-->
            <nav class="wsmenu clearfix">
                <ul class="mobile-sub wsmenu-list">
                    <li><a href="#" class="active"><i class="fa fa-home"></i><span
                                class="hometext">&nbsp;&nbsp;Home</span></a></li>
                    @foreach($categories as $category)
                        @if($category->position == '0' || $category->position == '2')
                            <li><a href="{{ url('category',$category->slug) }}">{{ $category->name }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <!--Menu HTML Code-->


        </div>
        @yield('content')
    </div>
</div>
<footer id="footer">

    <div class="footer-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="wow fadeInDown">
                        @foreach($categories as $category)
                            @if($category->position == '1' || $category->position == '2')
                                <li><a href="{{ url('category',$category->slug) }}">{{ $category->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="single_footer_top wow fadeInDown">
                        <h2>বার্তাকক্ষ</h2>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="publisher">
                                    <strong>
                                        প্রকাশক ও সম্পাদক
                                    </strong>
                                    <p>এখনও সেট করা হয়নি</p>
                                    {{--                                    <p>আফরোজা বেগম শিরিন </p>--}}
                                    {{--                                    <p>প্রকাশনায়: সন্ধি কমিউনিকেশন</p>--}}
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="editor">
                                    <strong>
                                        বার্তা সম্পাদক
                                    </strong>
                                    <p>এখনও সেট করা হয়নি</p>
                                    {{--                                    <p>ফোন: ০১৬১৭৮৯৩০১০, ৮৮-০২-৯৫৮৮২৯৮; মার্কেটিং: ০১৬১৭৮৯৩০০১ </p>--}}
                                    {{--                                    <p>২০৫, শহীদ সৈয়দ নজরুল ইসলাম স্মরণী, পুরানা পল্টন, ঢাকা</p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="single_footer_top wow fadeInRight">
                        <h2>Daily24bangla পরিবার </h2>
                        <div class="footer-logo">
                            <!--                            <img src="images/logo.png" alt="">-->
                            <h1 class="text-danger"> Daily24bangla </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer_bottom_left">
                        <p>এখানে প্রকাশিত/প্রচারিত কোনো সংবাদ, তথ্য, ছবি ও অডিও কনটেন্ট পূর্বানুমতি ছাড়া ব্যবহার করা
                            যাবে না।
                            সকল স্বত্ব Daily24bangla কর্তৃক সংরক্ষিত।</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ url('webiste/assets/js/jquery.min.js')}}"></script>
<!--Main Menu File-->
<link rel="stylesheet" type="text/css" media="all" href="{{ url('webiste/assets/css/webslidemenu.css')}}"/>
<script type="text/javascript" src="{{ url('webiste/assets/js/webslidemenu.js')}}"></script>
<!--Main Menu File-->
<script src="{{ url('webiste/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ url('webiste/assets/js/wow.min.js')}}"></script>
<script src="{{ url('webiste/assets/js/slick.min.js')}}"></script>
<script src="{{ url('webiste/assets/js/jquery.marquee.min.js')}}"></script>
<script src="{{ url('webiste/assets/js/custom.js')}}"></script>
<script>
    $('.marquee').marquee({
        speed: 50,
        gap: 50,
        delayBeforeStart: 0,
        direction: 'left',
        duplicated: true,
        pauseOnHover: true
    });
</script>


<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


</body>

</html>
