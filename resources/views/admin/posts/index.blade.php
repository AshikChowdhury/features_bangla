@extends('layouts.admin')

@section('content')

    <div class="row" style="padding-top: 20px">

        @if(Session::has('deleted_post'))
            <div class="alert alert-danger">
                <h5>{{session('deleted_post')}}</h5>
            </div>
        @elseif(Session::has('created_post'))
            <div class="alert alert-success">
                <h5>{{session('created_post')}}</h5>
            </div>
        @elseif(Session::has('updated_post'))
            <div class="alert alert-info">
                <h5>{{session('updated_post')}}</h5>
            </div>
        @endif

        <h2>Posts</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                {{--<th>Body</th>--}}
                <th>Post Link</th>
                <th>Comments</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)

                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img height="50" width="60" src="{{$post->photo ? $post->photo->file : '/images/400x400.png'}}" alt=""></td>
                        <td style="width: 13%">{{$post->user->name}}</td>
                        <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                        <td style="width: 25%"><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                        {{--<td>{{str_limit($post->body, 30)}}</td>--}}
                        <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
                        {{--<td><button class="btn-success btn-xs">{{$user->is_active == 1 ? 'Active' : 'Inactive' }}</button></td>--}}
                        <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    {{$posts->render()}}
                </div>
            </div>
    </div>


@stop