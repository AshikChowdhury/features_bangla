@extends('layouts.admin')

@section('content')

    <div class="row" style="padding-top: 20px">
        <h2>Categories</h2>
        <div class="col-sm-4">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            @include('includes.form_error')
        </div>
        <div class="col-sm-8">

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

        <table width="100%" class="table table-striped table-bordered table-hover" id="userTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)

                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        {{--<td><button class="btn-success btn-xs">{{$user->is_active == 1 ? 'Active' : 'Inactive' }}</button></td>--}}
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Created Time'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        </div>
    </div>


@stop