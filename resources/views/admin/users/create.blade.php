@extends('layouts.admin')

@section('content')
    <div class="row" style="padding-top: 50px; padding-bottom: 50px">
        <style>
            .error{
                color: red;
            }
            .require:after{
                content:'*';
                color:red;
            }
        </style>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><strong>Create Users</strong></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','files'=>true, 'id'=>'UserForm']) !!}
                            <div class="form-group col-lg-6">
                                {!! Form::label('name', 'Name ', ['class' => 'require']) !!}
                                {!! Form::text('name', null, ['class'=>'form-control','id'=>'name','name'=>'name']) !!}
                            </div>

                            <div class="form-group col-lg-6">
                                {!! Form::label('email', 'Email ',['class' => 'require']) !!}
                                {!! Form::email('email', null, ['class'=>'form-control','id'=>'email','name'=>'email']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('password', 'Password ', ['class' => 'require']) !!}
                                {!! Form::password('password', ['class'=>'form-control', 'id'=>'password', 'name'=>'password']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('', 'Confirm Password ', ['class' => 'require']) !!}
                                {!! Form::password('', ['class'=>'form-control','id'=>'confirm_password','name'=>'confirm_password']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('is_active', 'Status ', ['class' => 'require']) !!}
                                {!! Form::select('is_active', [1=>'Active',0=>'Inactive'], 0, ['class'=>'form-control','id'=>'status']) !!}
                            </div>
                            <div class="form-group col-lg-6">
                                {!! Form::label('role_id', 'Role ', ['class' => 'require']) !!}
                                {!! Form::select('role_id', ['' => 'Choose Options'] + $roles , null, ['class'=>'form-control','id'=>'role']) !!}
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
@section('script')
    <script>
        $(document).ready(function() {
            // validate signup form on keyup and submit
            $("#UserForm").validate({
                rules: {
                    name: "required",
                    password: {
                        required: true,
                        minlength: 4
                    },
                    confirm_password: {
                        required: true,
                        minlength: 4,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    status: "required",
                    role: "required"
                },
                messages: {
                    name: "Please enter your full name",

                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 4 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 4 characters long",
                        equalTo: "Please enter the same password"
                    },
                    email: "Please enter a valid email address",
                    status: "Please select status",
                    role: "Please select role"
                }
            });
        });
    </script>
@endsection

