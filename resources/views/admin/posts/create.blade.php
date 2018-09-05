@extends('layouts.admin')

@section('content')
    <div class="row" style="padding-top: 20px">
        <div class="col-lg-12">
            @include('includes.form_error')
        </div>

        @include('includes.tinyeditor')

        <div class="col-lg-12">
            <div class="col-lg-4 col-sm-4">
                <strong><h3>Create Post</h3></strong>
            </div>
            <div class="col-lg-8 col-sm-8">
                <div class="panel-heading pull-right">
                    <a href="{{route('admin.posts.index')}}" class="btn-primary btn-sm"><i class="fa fa-navicon"></i> All Posts</a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store','files'=>true]) !!}
                    <div class="form-group col-md-12 col-sm-10">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-3 col-sm-10">
                        {!! Form::label('category_id', 'Category') !!}
                        {!! Form::select('category_id', ['' => 'Choose Categories'] + $categories, null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-6 col-sm-10">
                        {!! Form::label('photo_id', 'Post Photo') !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        {!! Form::label('body', 'Body') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-2 col-sm-6">
                        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop