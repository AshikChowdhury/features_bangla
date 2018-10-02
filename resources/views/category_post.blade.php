@extends('layouts.blog-post')

@section('content')
    <div class="site-main-container">
        <style>
            .page-item.active .page-link{
                background-color: #f6214b;
                border-color: #f6214b;
            }
        </style>
        <!-- Start top-post Area -->

        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-nav-area">
                            <h1 class="text-white">{{$category}}</h1>
                            <p class="text-white link-nav"><a href="/">মূল পাতা </a>  <span class="lnr lnr-arrow-right"></span><a href="{{route('home.category', $category)}}">{{$category}}</a></p>
                        </div>
                    </div>
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
                            @if(!$posts->isEmpty())
                                @foreach($posts as $post)
                                    @if($post)
                                    <div class="single-latest-post row align-items-center">
                                        <div class="col-lg-5 post-left">
                                            <div class="feature-img relative">
                                                <div class="overlay overlay-bg"></div>
                                                <img class="img-fluid" src="{{$post->photo ? $post->photo->file : $post->photoPlaceHolder()}}" alt="">
                                            </div>
                                            <ul class="tags">
                                                <li><a href="#">{{$post->category->name}}</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-7 post-right">
                                            <a href="{{route('home.post',[$post->category->name,$post->slug])}}">
                                                <h4>{{$post->title}}</h4>
                                            </a>
                                            <ul class="meta">
                                                <li><a href="#"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                                                <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$post->created_at->format('d F, Y')}}</a></li>
                                            </ul>
                                            <p class="excert">
                                                {!! str_limit(strip_tags($post->body), 100, ' <strong>.....</strong>') !!}
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                            <div class="load-more">
                                {{$posts->render()}}
                            </div>

                        </div>
                        <!-- End latest-post Area -->
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