@extends('layouts.admin')

@section('content')
    <div class="row" style="padding-top: 50px; padding-bottom: 50px">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>Create Users</strong></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','files'=>true]) !!}
                            <div class="form-group col-lg-6">
                                {!! Form::label('name', 'Name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group col-lg-6">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group col-lg-6">
                                {!! Form::label('role_id', 'Role') !!}
                                {!! Form::select('role_id', ['' => 'Choose Options'] + $roles , null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group col-lg-6">
                                {!! Form::label('is_active', 'Status') !!}
                                {!! Form::select('is_active', [1=>'Active',0=>'Inactive'], 0, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('photo_id', 'User Photo') !!}
                                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group col-lg-8">
                                {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.form_error')

    </div>

@stop

