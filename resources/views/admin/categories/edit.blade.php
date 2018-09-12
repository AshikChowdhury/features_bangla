@extends('layouts.admin')

@section('content')
    <div class="row" style="padding-top: 20px">
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-md-offset-1">
            <div class="col-md-12 col-sm-10">
                <strong><h3>Edit Category</h3></strong>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$category->id]]) !!}
                    <div class="form-group col-md-4">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group col-md-3">
                        {!! Form::label('serial', 'Serial ',['class' => 'require']) !!}
                        {!! Form::number('serial', null, ['class'=>'form-control','required', 'placeholder'=> 'Must Be Number and Unique']) !!}
                    </div>
                    <div class="form-group col-md-3">
                        {!! Form::label('status', 'Status ', ['class' => 'require']) !!}
                        {!! Form::select('status', [1=>'Active',0=>'Inactive'], null, ['class'=>'form-control','required']) !!}
                    </div>
                    <div class="form-group col-md-3">
                        {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
                    <div class="form-group col-md-2">
                        {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @include('includes.form_error')
    </div>

@stop