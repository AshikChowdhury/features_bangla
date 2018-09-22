
<div class="sidebars-area">
    <div class="single-sidebar-widget editors-pick-widget">
        <h6 class="title">Editor’s Pick</h6>
        <div class="editors-pick-post">
            @if($editor)
                <div class="feature-img-wrap relative">
                    <div class="feature-img relative editor-img">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{$editor->photo ? $editor->photo->file : $editor->photoPlaceHolder()}}" alt="">
                    </div>
                    <ul class="tags">
                        <li><a href="{{route('home.category', $editor->category->name)}}">{{$editor->category->name}}</a></li>
                    </ul>
                </div>
                <div class="details">
                    <a href="{{route('home.post',[$editor->category->name,$editor->slug])}}">
                        <h4 class="mt-20">{{$editor->title}}</h4>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span>{{$editor->user->name}}</a></li>
                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$editor->created_at->format('d F, Y')}}</a></li>
                    </ul>
                    <p class="excert">
                        {!! str_limit(strip_tags($editor->body), 120, ' <strong>.....</strong>') !!}
                    </p>
                </div>
            @endif
            @if(!$editor_others->isEmpty())
                @foreach($editor_others as $editor_other)
                    <div class="post-lists">
                        <div class="single-post d-flex flex-row">
                            <div class="thumb">
                                <img class="thumb-img" src="{{$editor_other->photo ? $editor_other->photo->file : $editor_other->photoPlaceHolder()}}" alt="">
                            </div>
                            <div class="detail">
                                <a href="{{route('home.post',[$editor_other->category->name,$editor_other->slug])}}"><h6>{{$editor_other->title}}</h6></a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$editor_other->created_at->format('d F, Y')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                 @endforeach
            @endif
        </div>
    </div>

    {{--//***** Add Place *****//--}}
    <div class="single-sidebar-widget ads-widget">
        <img class="img-fluid" src="img/sidebar-ads.jpg" alt="">
    </div>

    <div class="single-sidebar-widget most-popular-widget">
        <h6 class="title">Most Popular</h6>
        @if(!$side_most_visits->isEmpty())
            @foreach($side_most_visits as $side_most_visit)
            <div class="single-list flex-row d-flex">
                <div class="thumb">
                    <img class="thumb-img" src="{{$side_most_visit->photo ? $side_most_visit->photo->file : $side_most_visit->photoPlaceHolder()}}" alt="">
                </div>
                <div class="details">
                    <a href="{{route('home.post',[$side_most_visit->category->name,$side_most_visit->slug])}}">
                        <h6>{{$side_most_visit->title}}</h6>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$side_most_visit->created_at->format('d F, Y')}}</a></li>
                        <li><a href="#"><span class="lnr lnr-eye"></span>{{$side_most_visit->visit_count}}</a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        @endif
    </div>


    <div class="single-sidebar-widget social-network-widget">
        <h6 class="title">Social Networks</h6>
        <ul class="social-list">
            <li class="d-flex justify-content-between align-items-center fb">
                <div class="icons d-flex flex-row align-items-center">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <p></p>
                    <div class="fb-like" data-href="https://www.facebook.com/featuresbangla/"
                         data-layout="button_count"
                         data-action="like" data-size="large"
                         data-show-faces="true"
                         data-share="true">
                    </div>
                </div>
            </li>
            <li class="d-flex justify-content-between align-items-center tw">
                <div class="icons d-flex flex-row align-items-center">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                    <p>983 Followers</p>
                </div>
                <a href="#">Follow Us</a>
            </li>
            <li class="d-flex justify-content-between align-items-center yt">
                <div class="icons d-flex flex-row align-items-center">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    <p>983 Subscriber</p>
                </div>
                <a href="#">Subscribe</a>
            </li>
        </ul>
    </div>

    {{--//***** Add Place *****//--}}
    <div class="single-sidebar-widget ads-widget">
        <img class="img-fluid" src="img/sidebar-ads.jpg" alt="">
    </div>
</div>