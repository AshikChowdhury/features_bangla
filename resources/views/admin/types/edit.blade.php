@extends('layouts.admin')

@section('content')
    <div class="row" style="padding-top: 20px">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-md-offset-2">
            <style>
                .require:after{
                    content:'*';
                    color:red;
                }
            </style>
            <div class="col-md-12 col-sm-10">
                <strong><h3>Edit Type</h3></strong>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($type,['method'=>'PATCH', 'action'=>['AdminPostTypesController@update',$type->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name ',['class' => 'require']) !!}
                        {!! Form::text('name', null, ['class'=>'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('serial', 'Serial ',['class' => 'require']) !!}
                        {!! Form::number('serial', null, ['class'=>'form-control','required', 'placeholder'=> 'Must Be Number and Unique']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Update Type', ['class'=>'btn btn-primary col-sm-3']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostTypesController@destroy', $type->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete Type', ['class'=>'btn btn-danger col-sm-2 col-sm-offset-1']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @include('includes.form_error')
    </div>

@stop