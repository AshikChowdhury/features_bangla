@extends('layouts.admin')

@section('content')

    @include('includes.tinyeditor')
    <div class="col-md-12">
        <h2>Create Post</h2>
        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store','files'=>true]) !!}
        <div class="form-group col-md-10">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-4" style="margin-right: 100%">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', ['' => 'Choose Categories'] + $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-4">
            {!! Form::label('photo_id', 'Post Photo') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-12">
            {!! Form::label('body', 'Body') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-md-2">
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        @include('includes.form_error')
    </div>




@stop