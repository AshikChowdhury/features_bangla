@extends('layouts.admin')

@section('content')

    <div class="row" style="padding-top: 20px">
        <div class="col-lg-12">
            @include('includes.messages')
            <div class="col-lg-4">
                <strong><h3>Posts</h3></strong>
            </div>
            <div class="col-lg-8">
                <div class="panel-heading pull-right">
                    <a href="{{route('admin.posts.index')}}" class="btn-primary btn-sm"><i class="fa fa-navicon"></i> All Posts</a>
                    <a href="{{route('admin.posts.create')}}" class="btn-warning btn-sm"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="userTable">
                        <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th>Photo</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Created At</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($posts)
                            @foreach($posts as $post)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center"><img height="40" width="50" src="{{$post->photo ? $post->photo->file : '/images/400x400.png'}}" alt=""></td>
                                    <td style="width: 25%">{{$post->title}}</td>
                                    <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                                    <td><a href="{{$post->user->fb_link}}" target="_blank">{{$post->user->name}}</a></td>
                                    <td>{{$post->created_at->format('d F, Y')}}</td>
                                    <td class="text-center">
                                        <a href="{{route('home.post',[$post->category->name, $post->slug])}}"><button class="btn btn-info btn-xs">View</button></a>
                                        <a href="{{route('admin.posts.edit', $post->id)}}"><button class="btn btn-warning btn-xs">Edit</button></a>
                                        <a href="{{route('admin.posts.edit', $post->id)}}"><button class="btn btn-danger btn-xs">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    {{--{{$posts->render()}}--}}
                </div>
            </div>
        </div>
    </div>


@stop