@extends('layouts.admin')

@section('content')

    <div class="row" style="padding-top: 20px">
        <div class="col-md-12 col-sm-12">
            <div class="col-md-12 col-sm-10">
                <strong><h3>Post Type</h3></strong>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-4 col-sm-10">
                        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostTypesController@store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Create Type', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                        @include('includes.form_error')
                    </div>
                    <div class="col-md-8 col-sm-10">

                        @if(Session::has('category_created'))
                            <div class="alert alert-success">
                                <h5>{{session('category_created')}}</h5>
                            </div>
                        @elseif(Session::has('category_updated'))
                            <div class="alert alert-info">
                                <h5>{{session('category_updated')}}</h5>
                            </div>
                        @elseif(Session::has('category_deleted'))
                            <div class="alert alert-danger">
                                <h5>{{session('category_deleted')}}</h5>
                            </div>
                        @endif

                        <table width="100%" class="table table-striped table-bordered table-hover" id="catTable">
                            <thead>
                            <tr>
                                <th style="width: 1%">ID</th>
                                <th>Name</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($types)

                                @foreach($types as $type)
                                    <tr>
                                        <td>{{$type->id}}</td>
                                        <td><a href="{{route('admin.types.edit', $type->id)}}">{{$type->name}}</a></td>
                                        {{--<td><button class="btn-success btn-xs">{{$user->is_active == 1 ? 'Active' : 'Inactive' }}</button></td>--}}
                                        <td>{{$type->created_at ? $type->created_at->diffForHumans() : 'No Created Time'}}</td>
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