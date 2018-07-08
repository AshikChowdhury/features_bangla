@extends('layouts.admin')

@section('content')

    <div class="row" style="margin-top: 30px; margin-bottom: 50px">

        @if(Session::has('delete'))
            <div class="alert alert-danger">
                <h5>{{session('delete')}}</h5>
            </div>
        @elseif(Session::has('bulk_delete'))
            <div class="alert alert-danger">
                <h5>{{session('bulk_delete')}}</h5>
            </div>
        @endif

        <h2>Media</h2>

        @if($photos)

            <form action="delete/media" method="post" class="form-inline">
                {{csrf_field()}}
                {{method_field('delete')}}
                <div class="form-group ">
                    <select name="checkBoxArray" id="" class="form-control btn-success">
                        <option value="">Delete</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="delete_all" class="btn btn-primary">
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th width="5%"><input type="checkbox" id="options"> All</th>
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
                                    <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        @endif

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