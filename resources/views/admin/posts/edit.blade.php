@extends('layouts.admin')

@section('content')

    @include('includes.tinyeditor')

    <div class="row" style="padding-top: 50px; padding-bottom: 100px">
        @include('includes.form_error')

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
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('user_id', 'Author') !!}
                        {!! Form::select('user_id', ['' => 'Select Author'] + $authors, null, ['class'=>'form-control', 'id'=>'author']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('category_id', 'Category') !!}
                        {!! Form::select('category_id', ['' => 'Choose Categories'] + $categories, null, ['class'=>'form-control', 'id'=>'category']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('post_type', 'Post Type') !!}
                        {!! Form::select('post_type', ['' => 'Select Type'] + $types, null, ['class'=>'form-control', 'id'=>'type']) !!}
                    </div>

                    <div class="form-group col-md-4 col-sm-10">
                        {!! Form::label('photo_id', 'Post Photo') !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-8 col-sm-10">
                        {!! Form::label('photo_source', 'Photo Source') !!}
                        {!! Form::text('photo_source', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
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
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function() {
            $('#author').select2();
            $('#category').select2();
            $('#type').select2();
        });
    </script>
@endsection