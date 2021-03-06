@extends('layouts.blog-post')

@section('fb-meta')
    {{--<meta property="article:author" content="{{$post->user->fb_link}}">--}}
    @if($post)
    <meta property="og:url" content="{{route('home.post',[$post->category->name, $post->slug])}}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{$post->title}}" />
    <meta property="og:description" content="{!! str_limit(strip_tags($post->body), 250, ' <strong>.....</strong>') !!}" />
    <meta property="og:image" content="http://www.featuresbangla.com{{$post->photo->file}}" />
    @endif
@endsection
@section('content')
    <style>
        p{
            font-size: 16px;
            line-height: 1.8;
        }
    </style>

    <div class="site-main-container">
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start single-post Area -->
                        @if($post)
                        <div class="single-post-wrap">
                            <div class="feature-img-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{$post->photo ? $post->photo->file : $post->photoPlaceHolder()}}" alt="">
                            </div>
                            @if($post->photo_source)
                                <small><span class="fa fa-camera"></span> {{$post->photo_source}}</small>
                            @endif
                            <div class="content-wrap">
                                <ul class="tags mt-10">
                                    <li><a href="#">{{$post->category->name}}</a></li>
                                </ul>
                                <a href="#">
                                    <h3>{{$post->title}}</h3>
                                </a>
                                <ul class="meta pb-20">
                                    <li><a href="{!!$post->user->fb_link!!}" target="_blank"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$post->created_at->format('d F, Y')}} at {{date('g:i a', strtotime($post->created_at))}}</a></li>
                                    <li><a href=""><span class="disqus-comment-count" data-disqus-url="{{route('home.post',[$post->category->name,$post->slug])}}"></span></a></li>
                                </ul>
                                <p class="body">{!!$post->body!!}</p>

                                {{--//fb share button--}}
                                <i class="fa fa-share-alt fa-2x" aria-hidden="true" style="padding-right: 10px; color: #f6214b"></i>
                                <div class="fb-share-button" data-size="large"
                                     data-href="{{url()->current()}}"
                                     data-layout="button_count">
                                </div>

                                <div class="navigation-wrap justify-content-between d-flex">
                                    @if (isset($previous))
                                    <a class="prev" href="{{route('home.post',[$previous->category->name,$previous->slug])}}"><span class="lnr lnr-arrow-left"></span>Prev Story</a>
                                    @endif
                                    @if (isset($next))
                                    <a class="next" href="{{route('home.post',[$next->category->name,$next->slug])}}">Next Story<span class="lnr lnr-arrow-right"></span></a>
                                    @endif
                                </div>
                                <hr>
                                <div class="comment-sec-area">
                                    <div class="container">
                                        <div class="row flex-column">
                                            <div id="disqus_thread"></div>
                                            <script>

                                                /**
                                                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                                                var disqus_config = function () {
                                                    this.page.url = '{{route('home.post',[$post->category->name,$post->slug])}}';
                                                    this.page.identifier = '{{$post->slug}}';
                                                };

                                                (function() { // DON'T EDIT BELOW THIS LINE
                                                    var d = document, s = d.createElement('script');
                                                    s.src = 'https://featuresbangla-com.disqus.com/embed.js';
                                                    s.setAttribute('data-timestamp', +new Date());
                                                    (d.head || d.body).appendChild(s);
                                                })();
                                            </script>
                                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single-post Area -->
                        @endif
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
@section('scripts')
    <script id="dsq-count-scr" src="//featuresbangla-com.disqus.com/count.js" async></script>
@endsection