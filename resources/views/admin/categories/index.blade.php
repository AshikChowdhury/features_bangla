@extends('layouts.admin')

@section('content')

    <div class="row" style="padding-top: 20px">
        <style>
            .require:after{
                content:'*';
                color:red;
            }
        </style>
        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-10">
                <strong><h3>Categories</h3></strong>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-4 col-sm-10">
                        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name ', ['class' => 'require']) !!}
                            {!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('serial', 'Serial ',['class' => 'require']) !!}
                            {!! Form::number('serial', null, ['class'=>'form-control','required', 'placeholder'=> 'Must Be Number and Unique']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status ', ['class' => 'require']) !!}
                            {!! Form::select('status', [1=>'Active',0=>'Inactive'], 1, ['class'=>'form-control','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                        @include('includes.form_error')
                    </div>
                    <div class="col-md-8 col-sm-10">
                        @include('includes.messages')
                        <table width="100%" class="table table-striped table-bordered table-hover" id="catTable">
                            <thead>
                            <tr>
                                <th style="width: 1%">SL</th>
                                <th>Name</th>
                                <th class="text-center">Status</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories)

                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center">{{$category->serial}}</td>
                                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                                        <td class="text-center">
                                            @if($category->status == 1)
                                                <button class="btn-success btn-xs">Active</button>
                                            @else
                                                <button class="btn-danger btn-xs">Deactive</button>
                                            @endif
                                        </td>
                                        <td>{{$category->created_at ? $category->created_at->format('d F, Y') : 'No Created Time'}}</td>
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