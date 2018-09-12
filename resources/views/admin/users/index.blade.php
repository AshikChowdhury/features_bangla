@extends('layouts.admin')


@section('content')
    {{--<div id="page-wrapper">--}}
        <div class="row" style="padding-top: 20px">
            <div class="col-lg-12">
                @include('includes.messages')
                <div class="col-lg-4">
                    <strong><h3>Users</h3></strong>
                </div>
                <div class="col-lg-8">
                    <div class="panel-heading pull-right">
                        <a href="{{route('admin.users.index')}}" class="btn-primary btn-sm"><i class="fa fa-navicon"></i> All Users</a>
                        <a href="{{route('admin.users.create')}}" class="btn-warning btn-sm"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="userTable">
                            <thead>
                            <tr>
                                <th style="width: 1%">ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created</th>
                                {{--<th>Updated</th>--}}
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
                                        <td>
                                            @if($user->is_active == 1)
                                                <button class="btn-success btn-xs">Active</button>
                                            @else
                                                <button class="btn-danger btn-xs">Deactive</button>
                                            @endif
                                        </td>
                                        <td>{{$user->created_at->format('d F, Y')}}</td>
                                        {{--<td>{{$user->updated_at->diffForHumans()}}</td>--}}
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    {{--</div>--}}

@stop