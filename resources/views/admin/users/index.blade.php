@extends('layouts.admin')


@section('content')

    <div class="row" style="padding-top: 20px">

        @if(Session::has('deleted_user'))
            <div class="alert alert-danger col-md-3">
                <h5>{{session('deleted_user')}}</h5>
            </div>
        @elseif(Session::has('created_user'))
            <div class="alert alert-success">
                <h5>{{session('created_user')}}</h5>
            </div>
        @elseif(Session::has('updated_user'))
            <div class="alert alert-info">
                <h5>{{session('updated_user')}}</h5>
            </div>
        @endif


        <h2>Users</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($users)

                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img height="35" width="40" src="{{$user->photo ? $user->photo->file : '/images/400x400.png'}}" alt=""></td>
                        <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{ucfirst($user->role->name ? $user->role->name : 'User Has No Role')}}</td>
                        <td><button class="btn-success btn-xs">{{$user->is_active == 1 ? 'Active' : 'Inactive' }}</button></td>
                        <td>{{$user->created_at->format('d F, Y')}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    {{$users->render()}}
                </div>
            </div>
    </div>

@stop