<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="features, featuresbangla, news, bangla, articles, magazine, banglafeatures, feature, news_portal">
    <meta name="description" content="Features Bangla is a new media platform that offers coverage and analysis of current affairs, business, lifestyle, technology, arts, and culture in Bangladesh as well as the all over the world" />
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/images/favicon.png">
    <!-- menifest Meta -->
    <link rel="manifest" href="/manifest.json" />
    <script async  src="https://cdn.rawgit.com/GoogleChrome/pwacompat/v2.0.1/pwacompat.min.js"></script>
    <meta name="theme-color" content="#f6214b" />

    <meta property="fb:pages" content="2183874765213942" />
    <meta property="fb:app_id" content="543661519408683" />
    {{--<meta property="article:publisher" content="https://www.facebook.com/featuresbangla">--}}
    @yield('fb-meta')

    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Features Bangla</title>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129164097-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129164097-1');
    </script>


    {{--//Google Ads--}}
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-7089086620921283",
            enable_page_level_ads: true
        });
    </script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" >

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<header>

    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
                    <ul>
                        <li><a href="https://www.facebook.com/featuresbangla" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
                    <ul>
                        {{--<li><a href="mob:+8801521218513"><span class="lnr lnr-phone-handset"></span><span>+880 152 1218 513</span></a></li>--}}
                        {{--<li><a href="#"><span class="lnr lnr-envelope"></span><span><span class="__cf_email__" >featuresbangla@gmail.com</span></span></a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                    <a href="/">
                        <img class="img-fluid" src="/images/new_logo.png" alt="Features Bangla">
                    </a>
                </div>
                {{--<div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">--}}
                <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                    {{--<img class="img-fluid" src="/img/banner-ad.jpg" alt="">--}}
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu" id="main-menu">
        <div class="row align-items-center justify-content-between">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="{{Request::is('/') ? 'menu-item-active' : ''}}"><a href="/"><strong>মূল পাতা</strong></a></li>
                    @foreach($categories as $category)
                        <li class="{{ request()->getRequestUri() == ('/post/'.urlencode($category->name)) ? 'menu-item-active' : '' }}"><a href="{{route('home.category', $category->name)}}"><strong>{{$category->name}}</strong></a></li>
                    @endforeach
                    @if(!$more_categories->isEmpty())
                        <li class="menu-has-children"><a href="#"><strong>আরো দেখুন</strong></a>
                            <ul>
                                @foreach($more_categories as $more_category)
                                    <li><a href="{{route('home.category', $more_category->name)}}"><strong>{{$more_category->name}}</strong></a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav><!-- #nav-menu-container -->
            <div class="navbar-right">
                <form class="Search">
                    <input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
                    <label for="Search-box" class="Search-box-label">
                        <span class="lnr lnr-magnifier"></span>
                    </label>
                    <span class="Search-close">
                        <span class="lnr lnr-cross"></span>
                    </span>
                </form>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="/login">Managed Website</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 single-footer-widget">

            </div>
            {{--<div class="col-lg-2 col-md-6 single-footer-widget">--}}
                {{--<h4>Features</h4>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">Jobs</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2 col-md-6 single-footer-widget">--}}
                {{--<h4>Resources</h4>--}}
                {{--<ul>--}}
                    {{--<li><a href="">Admin</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <a href="https://www.accuweather.com/en/bd/dhaka/28143/weather-forecast/28143" class="aw-widget-legal">
                </a><div id="awcc1537718096760" class="aw-widget-current"
                         data-locationkey="28143"
                         data-unit="c" data-language="en-us"
                         data-useip="false" data-uid="awcc1537718096760">
                </div>
                <script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
            </div>
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                Copyright &copy; Features Bangla All rights reserved
            </p>
            <div class="col-lg-4 col-md-12 footer-social">
                <a href="https://www.facebook.com/featuresbangla" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Area -->

<script src="{{asset('js/main.js')}}"></script>

@yield('scripts')


</body>

</html>
