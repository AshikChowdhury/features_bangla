@extends('layouts.blog-post')

@section('content')
    <style>
        #feature{
            height: 440px;
        }
        .subfe{
            height: 215px;
        }
        .list-img{
            height: 150px
        }
        @media screen and (max-width: 1366px) and (min-width: 993px) {
            #feature{
                height: 370px;
            }
            .subfe{
                height: 180px;
            }
            .list-img{
                height: 120px
            }
        }
        @media screen and (max-width: 992px) {
            #feature{
                height: auto;
            }
            .subfe{
                height: auto;
            }
            .list-img{
                height: auto;
            }
        }
    </style>
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row small-gutters">
                    @if($feature)
                        <div class="col-lg-8 top-post-left">
                            <div class="feature-image-thumb relative" id="feature">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{$feature->photo ? $feature->photo->file : $feature->photoPlaceHolder()}}" alt="">
                            </div>
                            <div class="top-post-details">
                                <ul class="tags">
                                    <li><a href="{{route('home.category', $feature->category->name)}}">{{$feature->category->name}}</a></li>
                                </ul>
                                <a href="{{route('home.post',[$feature->category->name,$feature->slug])}}">
                                    <h3>{{$feature->title}}</h3>
                                </a>
                                <ul class="meta">
                                    <li><a href="{!!$feature->user->fb_link!!}" target="_blank"><span class="lnr lnr-user"></span>{{$feature->user->name}}</a></li>
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$feature->created_at->format('d F, Y')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-4 top-post-right">
                        @if($subfeature1)
                            <div class="single-top-post">
                                <div class="feature-image-thumb relative subfe" >
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{$subfeature1->photo ? $subfeature1->photo->file : $subfeature1->photoPlaceHolder()}}" alt="">
                                </div>
                                <div class="top-post-details">
                                    <ul class="tags">
                                        <li><a href="{{route('home.category', $subfeature1->category->name)}}">{{$subfeature1->category->name}}</a></li>
                                    </ul>
                                    <a href="{{route('home.post',[$subfeature1->category->name,$subfeature1->slug])}}">
                                        <h4>{{$subfeature1->title}}</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="{!!$subfeature1->user->fb_link!!}" target="_blank"><span class="lnr lnr-user"></span>{{$subfeature1->user->name}}</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$subfeature1->created_at->format('d F, Y')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if($subfeature2)
                            <div class="single-top-post mt-10">
                                <div class="feature-image-thumb relative subfe">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{$subfeature2->photo ? $subfeature2->photo->file : $subfeature2->photoPlaceHolder()}}" alt="">
                                </div>
                                <div class="top-post-details">
                                    <ul class="tags">
                                        <li><a href="{{route('home.category', $subfeature2->category->name)}}">{{$subfeature2->category->name}}</a></li>
                                    </ul>
                                    <a href="{{route('home.post',[$subfeature2->category->name,$subfeature2->slug])}}">
                                        <h4>{{$subfeature2->title}}</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="{!!$subfeature2->user->fb_link!!}" target="_blank"></span>{{$subfeature2->user->name}}</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$subfeature2->created_at->format('d F, Y')}}</a></li>
                                        {{--<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>--}}
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{--<div class="col-lg-12">--}}
                        {{--<div class="news-tracker-wrap">--}}
                            {{--<h6><span>Breaking News: </span><a href="#"> Astronomy Binoculars A Great Alternative</a></h6>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start latest-post Area -->
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">Latest Stories</h4>
                            @if($cate_posts)
                                @foreach($cate_posts as $cate_post)
                                    @if($cate_post)
                                        <div class="single-latest-post row align-items-center">
                                            <div class="col-lg-5 post-left">
                                                <div class="feature-img relative list-img">
                                                    <div class="overlay overlay-bg"></div>
                                                    <img class="img-fluid" src="{{$cate_post->photo ? $cate_post->photo->file : $cate_post->photoPlaceHolder()}}" alt="">
                                                </div>
                                                <ul class="tags">
                                                    <li><a href="{{route('home.category', $cate_post->category->name)}}">{{$cate_post->category->name}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-7 post-right">
                                                <a href="{{route('home.post',[$cate_post->category->name,$cate_post->slug])}}">
                                                    <h4>{{$cate_post->title}}</h4>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="{!!$cate_post->user->fb_link!!}" target="_blank"><span class="lnr lnr-user"></span>{{$cate_post->user->name}}</a></li>
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$cate_post->created_at->format('d F, Y')}}</a></li>
                                                    {{--<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>--}}
                                                </ul>
                                                <p class="excert">
                                                    {!! str_limit(strip_tags($cate_post->body), 100, ' <strong>.....</strong>') !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <!-- End latest-post Area -->

                        <!-- Start banner-ads Area -->
                        <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                            <img class="img-fluid" src="img/banner-ad.jpg" alt="">
                        </div>
                        <!-- End banner-ads Area -->
                        <!-- Start popular-post Area -->
                        <div class="popular-post-wrap">
                            <h4 class="title">Popular Stories</h4>
                            @if($most_visited)
                            <div class="feature-post relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{$most_visited->photo ? $most_visited->photo->file : $most_visited->photoPlaceHolder()}}" alt="">
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li><a href="{{route('home.category', $most_visited->category->name)}}">{{$most_visited->category->name}}</a></li>
                                    </ul>
                                    <a href="{{route('home.post',[$most_visited->category->name,$most_visited->slug])}}">
                                        <h3>{{$most_visited->title}}</h3>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="{!!$most_visited->user->fb_link!!}" target="_blank"><span class="lnr lnr-user"></span>{{$most_visited->user->name}}</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$most_visited->created_at->format('d F, Y')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <div class="row mt-20 medium-gutters">
                                @if(!$most_visits->isEmpty())
                                    @foreach($most_visits as $most_visit)
                                        <div class="col-lg-6 single-popular-post">
                                            <div class="feature-img-wrap relative">
                                                <div class="feature-img relative subfe">
                                                    <div class="overlay overlay-bg"></div>
                                                    <img class="img-fluid" src="{{$most_visit->photo ? $most_visit->photo->file : $most_visit->photoPlaceHolder()}}" alt="">
                                                </div>
                                                <ul class="tags">
                                                    <li><a href="{{route('home.category', $most_visit->category->name)}}">{{$most_visit->category->name}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="details">
                                                <a href="{{route('home.post',[$most_visit->category->name,$most_visit->slug])}}">
                                                    <h4>{{$most_visit->title}}</h4>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="{!!$most_visit->user->fb_link!!}" target="_blank"><span class="lnr lnr-user"></span>{{$most_visit->user->name}}</a></li>
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$most_visit->created_at->format('d F, Y')}}</a></li>
                                                </ul>
                                                <p class="excert">
                                                    {!! str_limit(strip_tags($most_visit->body), 120, ' <strong>.....</strong>') !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End popular-post Area -->
                        <!-- Start relavent-story-post Area -->
                        <div class="relavent-story-post-wrap mt-30">
                            <h4 class="title">Relevant Stories</h4>
                            <div class="relavent-story-list-wrap">
                                @if(!$randoms->isEmpty())
                                    @foreach($randoms as $random)
                                        <div class="single-relavent-post row align-items-center">
                                            <div class="col-lg-5 post-left">
                                                <div class="feature-img relative list-img">
                                                    <div class="overlay overlay-bg"></div>
                                                    <img class="img-fluid" src="{{$random->photo ? $random->photo->file : $random->photoPlaceHolder()}}" alt="">
                                                </div>
                                                <ul class="tags">
                                                    <li><a href="{{route('home.category', $random->category->name)}}">{{$random->category->name}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-7 post-right">
                                                <a href="{{route('home.post',[$random->category->name,$random->slug])}}">
                                                    <h4>{{$random->title}}</h4>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="{!!$random->user->fb_link!!}" target="_blank"><span class="lnr lnr-user"></span>{{$random->user->name}}</a></li>
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$random->created_at->format('d F, Y')}}</a></li>
                                                </ul>
                                                <p class="excert">
                                                    {!! str_limit(strip_tags($random->body), 100, ' <strong>.....</strong>') !!}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End relavent-story-post Area -->
                    </div>
                    <div class="col-lg-4">
                        @include('includes.post_sidebar')
                    </div>
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>

@stop
