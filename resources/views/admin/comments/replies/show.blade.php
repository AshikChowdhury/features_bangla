@extends('layouts.admin')

@section('content')

    <div class="row">

        @if(count($replies)>0)
            <h2>Replies</h2>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Body</th>
                    <th>Post</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($replies as $reply)
                    <tr>
                        <td>{{$reply->id}}</td>
                        <td>{{$reply->author}}</td>
                        <td>{{$reply->email}}</td>
                        <td>{{str_limit($reply->body,30)}}</td>
                        <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>

                        <td>
                            @if($reply->is_active == 1)
                                {!! Form::open(['method'=>'PATCH', 'action'=>['CommentsRepliesController@update', $reply->id]]) !!}
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    {!! Form::submit('Disapprove', ['class'=>'btn-xs btn-warning']) !!}
                                </div>
                                {!! Form::close() !!}

                            @else
                                {!! Form::open(['method'=>'PATCH', 'action'=>['CommentsRepliesController@update', $reply->id]]) !!}
                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::submit('Approve', ['class'=>'btn-xs btn-success']) !!}
                                </div>
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['CommentsRepliesController@destroy', $reply->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn-xs btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-center" style="margin-top: 100px">No Replies</h3>
        @endif

    </div>

@stop