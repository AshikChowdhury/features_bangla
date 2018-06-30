@extends('layouts.admin')

@section('content')
    <div class="row" style="padding-top: 50px">

        <div class="col-sm-3">

            <img src="{{$post->photo ? $post->photo->file : '/images/400x400.png'}}" alt="" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">

            @include('includes.form_error')

            <h2>Edit Post</h2>
            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', ['' => 'Choose Categories'] + $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Post Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Body') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-4']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-2 col-sm-offset-1']) !!}
            </div>
            {!! Form::close() !!}


        </div>
    </div>


@stop