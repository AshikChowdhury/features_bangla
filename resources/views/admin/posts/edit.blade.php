@extends('layouts.admin')

@section('content')

    @include('includes.tinyeditor')

    <div class="row" style="padding-top: 50px; padding-bottom: 100px">
        @include('includes.form_error')

        <div class="col-sm-12">
            <div class="col-sm-8">
                <h2>Edit Post</h2>

                <img src="{{$post->photo ? $post->photo->file : $post->photoPlaceHolder()}}" alt="" class="img-responsive img-rounded">

            </div>



            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id],'files'=>true]) !!}
            <div class="form-group col-sm-12">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-3" style="margin-right: 100%">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', ['' => 'Choose Categories'] + $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('photo_id', 'Post Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group col-sm-12">
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