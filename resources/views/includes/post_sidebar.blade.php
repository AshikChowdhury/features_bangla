<style>
    .editor-img{
        height: 180px
    }
    @media screen and (max-width: 1366px) and (min-width: 993px) {
        .editor-img{
            height: 150px
        }
    }
    @media screen and (max-width: 992px) {
        .editor-img{
            height: auto;
        }
    }
</style>
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
            <div class="post-lists">
                <div class="single-post d-flex flex-row">
                    <div class="thumb">
                        <img src="http://placehold.it/100x100" alt="">
                    </div>
                    <div class="detail">
                        <a href="image-post.html"><h6>Help Finding Information
                                Online is so easy</h6></a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-sidebar-widget ads-widget">
        <img class="img-fluid" src="img/sidebar-ads.jpg" alt="">
    </div>

    <div class="single-sidebar-widget most-popular-widget">
        <h6 class="title">Most Popular</h6>
        <div class="single-list flex-row d-flex">
            <div class="thumb">
                <img src="img/m1.jpg" alt="">
            </div>
            <div class="details">
                <a href="image-post.html">
                    <h6>Help Finding Information
                        Online is so easy</h6>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                </ul>
            </div>
        </div>
        <div class="single-list flex-row d-flex">
            <div class="thumb">
                <img src="img/m2.jpg" alt="">
            </div>
            <div class="details">
                <a href="image-post.html">
                    <h6>Compatible Inkjet Cartr
                        world famous</h6>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                </ul>
            </div>
        </div>
        <div class="single-list flex-row d-flex">
            <div class="thumb">
                <img src="img/m3.jpg" alt="">
            </div>
            <div class="details">
                <a href="image-post.html">
                    <h6>5 Tips For Offshore Soft
                        Development </h6>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                </ul>
            </div>
        </div>
        <div class="single-list flex-row d-flex">
            <div class="thumb">
                <img src="img/m4.jpg" alt="">
            </div>
            <div class="details">
                <a href="image-post.html">
                    <h6>5 Tips For Offshore Soft
                        Development </h6>
                </a>
                <ul class="meta">
                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                    <li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="single-sidebar-widget social-network-widget">
        <h6 class="title">Social Networks</h6>
        <ul class="social-list">
            <li class="d-flex justify-content-between align-items-center fb">
                <div class="icons d-flex flex-row align-items-center">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <p>983 Likes</p>
                </div>
                <a href="#">Like our page</a>
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
            <li class="d-flex justify-content-between align-items-center rs">
                <div class="icons d-flex flex-row align-items-center">
                    <i class="fa fa-rss" aria-hidden="true"></i>
                    <p>983 Subscribe</p>
                </div>
                <a href="#">Subscribe</a>
            </li>
        </ul>
    </div>
</div>