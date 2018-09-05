@extends('layouts.admin')

@section('content')
    <style>
        .submit-button{
            padding-bottom: 10px;
            width: 20%;
        }
    </style>

    <div class="row" style="margin-top: 30px; margin-bottom: 50px">
        <div class="col-lg-12">

            @if(Session::has('delete'))
                <div class="alert alert-danger">
                    <h5>{{session('delete')}}</h5>
                </div>
            @elseif(Session::has('bulk_delete'))
                <div class="alert alert-danger">
                    <h5>{{session('bulk_delete')}}</h5>
                </div>
            @endif
            <div class="col-lg-4">
                <strong><h3>Medias</h3></strong>
            </div>
            <div class="col-lg-8">
                <div class="panel-heading pull-right">
                    <a href="{{route('admin.media.index')}}" class="btn-primary btn-sm"><i class="fa fa-navicon"></i> All Media</a>
                    <a href="{{route('admin.media.create')}}" class="btn-warning btn-sm"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>

            @if($photos)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="delete/media" method="post" class="form-inline">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <div class="submit-button">
                                <div class="form-group">
                                    <select name="checkBoxArray" id="" class="form-control btn btn-danger" style="width: auto">
                                        <option value="">Delete</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="delete_all" class="btn btn-primary">
                                </div>
                            </div>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="userTable">
                                <thead>
                                <tr>
                                    <th width="40px"><input type="checkbox" id="options"> <small>All</small></th>
                                    <th width="25px">ID</th>
                                    <th>Name</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($photos as $photo)
                                    <tr>
                                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                                        <td>{{$photo->id}}</td>
                                        <td><img src="{{$photo->file}}" alt="" style="height: 50px; width: 70px"></td>
                                        <td>{{$photo->created_at->diffForHumans()}}</td>
                                        <td>{{$photo->updated_at->diffForHumans()}}</td>
                                        <td>
                                            {{--{!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy',$photo->id]]) !!}--}}
                                            {{--<div class="form-group">--}}
                                            {{--{!! Form::submit('Delete', ['class'=>'btn-danger']) !!}--}}
                                            {{--</div>--}}
                                            {{--{!! Form::close() !!}--}}
                                            <input type="hidden" name="photo" value="{{$photo->id}}">
                                            <div class="form-group">
                                                <input type="submit" name="delete_single" value="Delete" class="btn btn-sm btn-danger">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

@stop

@section('script')
    <script>
        $(document).ready(function () {
            $('#options').click(function () {
                if (this.checked){
                    $('.checkBoxes').each(function () {
                        this.checked = true;
                    });
                }else{
                    $('.checkBoxes').each(function () {
                        this.checked = false;
                    });
                }
            });
        });
    </script>
@stop