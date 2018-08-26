@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@stop

@section('content')

    <div class="row">
        <div class="col-lg-4">
            <strong><h3>Upload Media</h3></strong>
        </div>
        <div class="col-lg-8">
            <div class="panel-heading pull-right">
                <a href="{{route('admin.media.create')}}" class="btn-primary btn-sm"><i class="fa fa-navicon"></i> All Media</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@stop