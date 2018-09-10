@extends('layouts.admin')

@section('content')
    <div class="row" style="padding-top: 50px; padding-bottom: 100px">
        <style>
            .require:after{
                content:'*';
                color:red;
            }
        </style>
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <strong><h3>Edit Post</h3></strong>
                </div>
                <div class="col-sm-8">
                    <div class="panel-heading pull-right">
                        <a href="{{route('admin.posts.index')}}" class="btn-primary btn-sm"><i class="fa fa-navicon"></i> All Posts</a>
                        <a href="{{route('admin.posts.create')}}" class="btn-warning btn-sm"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <img src="{{$post->photo ? $post->photo->file : $post->photoPlaceHolder()}}" alt="" class="img-responsive img-rounded">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id],'files'=>true]) !!}
                    <div class="form-group col-md-12 col-sm-10">
                        {!! Form::label('title', 'Title ',['class' => 'require']) !!}
                        {!! Form::text('title', null, ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('user_id', 'Author ',['class' => 'require']) !!}
                        {!! Form::select('user_id', ['' => 'Select Author'] + $authors, null, ['class'=>'form-control', 'id'=>'author','required']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('category_id', 'Category ',['class' => 'require']) !!}
                        {!! Form::select('category_id', ['' => 'Choose Categories'] + $categories, null, ['class'=>'form-control', 'id'=>'category','required']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('post_type', 'Post Type ',['class' => 'require']) !!}
                        {!! Form::select('post_type', ['' => 'Select Type'] + $types, null, ['class'=>'form-control', 'id'=>'type','required']) !!}
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

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger ']) !!}
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