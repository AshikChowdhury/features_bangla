@extends('layouts.admin')

@section('content')
    <div class="row" style="padding-top: 20px">
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-md-offset-1">
            <div class="col-md-12 col-sm-10">
                <strong><h3>Edit Type</h3></strong>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($type,['method'=>'PATCH', 'action'=>['AdminPostTypesController@update',$type->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
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