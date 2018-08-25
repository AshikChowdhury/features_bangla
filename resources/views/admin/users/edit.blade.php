@extends('layouts.admin')


@section('content')
    <div class="row" style="padding-top: 50px; padding-bottom: 50px">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>Edit Users</strong></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="col-lg-3">
                                <img src="{{$user->photo ? $user->photo->file : '/images/400x400.png'}}" alt="" class="img-responsive img-rounded">
                            </div>
                            <div class="col-sm-9">
                                @include('includes.form_error')

                                {!! Form::model($user,['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email', 'Email') !!}
                                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('role_id', 'Role') !!}
                                    {!! Form::select('role_id', $roles , null, ['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('is_active', 'Status') !!}
                                    {!! Form::select('is_active', [1=>'Active',0=>'Inactive'], null, ['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('photo_id', 'User Photo') !!}
                                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('password', 'Password') !!}
                                    {!! Form::password('password', ['class'=>'form-control']) !!}
                                </div>


                                <div class="form-group">
                                    {!! Form::submit('Update User', ['class'=>'btn btn-primary col-lg-3']) !!}
                                </div>
                                {!! Form::close() !!}


                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-lg-3 col-sm-offset-1']) !!}
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

