@extends('layouts.admin')

@section('content')

    <div class="row" style="padding-top: 20px">
        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-10">
                <strong><h3>Post Type</h3></strong>
            </div>
            <div class="panel panel-default">
                <style>
                    .require:after{
                        content:'*';
                        color:red;
                    }
                </style>
                <div class="panel-body">
                    <div class="col-md-4 col-sm-10">
                        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostTypesController@store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name', ['class' => 'require']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('serial', 'Serial ',['class' => 'require']) !!}
                            {!! Form::number('serial', null, ['class'=>'form-control','required', 'placeholder'=> 'Must Be Number and Unique']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Create Type', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                        @include('includes.form_error')
                    </div>
                    <div class="col-md-8 col-sm-10">
                        @include('includes.messages')
                        <table width="100%" class="table table-striped table-bordered table-hover" id="catTable">
                            <thead>
                            <tr>
                                <th style="width: 1%" class="text-center">SL</th>
                                <th>Name</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($types)
                                @foreach($types as $type)
                                    <tr>
                                        <td class="text-center">{{$type->serial}}</td>
                                        <td><a href="{{route('admin.types.edit', $type->id)}}">{{$type->name}}</a></td>
                                        <td>{{$type->created_at ? $type->created_at->format('d F, Y') : 'No Created Time'}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop