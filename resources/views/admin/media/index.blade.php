@extends('layouts.admin')

@section('content')

    <div class="row" style="margin-top: 30px">

        @if(Session::has('delete'))
            <div class="alert alert-danger">
                <h5>{{session('delete')}}</h5>
            </div>
        @endif

        <h2>Media</h2>

        @if($photos)
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>{{$photo->id}}</td>
                        <td><img src="{{$photo->file}}" alt="" style="height: 50px; width: 70px"></td>
                        <td>{{$photo->created_at->diffForHumans()}}</td>
                        <td>{{$photo->updated_at->diffForHumans()}}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>

@stop