@extends('layouts.admin')

@section('content')

    <div class="col-md-8 col-md-offset-1">
        <h2>Create Category</h2>
        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        @include('includes.form_error')
    </div>

@stop