@extends('layouts.admin')

@section('content')
    <div class="row" style="padding-top: 20px">
        <style>
            .require:after{
                content:'*';
                color:red;
            }
        </style>

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
                        {!! Form::label('title', 'Title ', ['class' => 'require']) !!}
                        {!! Form::text('title', null, ['class'=>'form-control', 'required']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('user_id', 'Author ',['class' => 'require']) !!}
                        {!! Form::select('user_id', ['' => 'Select Author'] + $authors, null, ['class'=>'form-control', 'id' => 'author','required']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('category_id', 'Category ', ['class' => 'require']) !!}
                        {!! Form::select('category_id', ['' => 'Choose Categories'] + $categories, null, ['class'=>'form-control', 'id' => 'category','required']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('post_type', 'Post Type ',['class' => 'require']) !!}
                        {!! Form::select('post_type', ['' => 'Select Type'] + $types, null, ['class'=>'form-control', 'id' => 'type','required']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('photo_id', 'Post Photo ',['class' => 'require']) !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group col-md-8 col-sm-10">
                        {!! Form::label('photo_source', 'Photo Source ',['class' => 'require']) !!}
                        {!! Form::text('photo_source', null, ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        {!! Form::label('body', 'Body ',['class' => 'require']) !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control','required']) !!}
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
@section('script')
    @include('includes.tinyeditor')
    <script>
        $(document).ready(function() {
            $('#author').select2();
            $('#category').select2();
            $('#type').select2();
        });
    </script>
@endsection