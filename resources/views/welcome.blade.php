@extends('layouts.blog-post')

@section('content')

    <div class="site-main-container">
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start single-post Area -->
                        <div class="single-post-wrap">
                            <div class="feature-img-thumb relative">
                                <div class="overlay overlay-bg">Landing Page</div>
                                <h1>Landing Page</h1>
                                <img class="img-fluid" src="" alt="">
                            </div>

                        </div>
                        <!-- End single-post Area -->
                    </div>

                    @include('includes.sidebar')
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>

@stop