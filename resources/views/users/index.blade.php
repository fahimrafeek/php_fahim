@extends('layouts.master')
@section('title', $page_title)
@section('header', $page_title)
@section('description')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success" id="alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger" id="alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @php
        Session::forget('success');
        Session::forget('error');
    @endphp
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-md-6 no-padding">
                    </div>
                    <div class="col-md-10 no-padding">
                        <p style="padding-top: 20px">
                            The list of users registered on the system.
                        </p>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 350px; padding-top: 15px;">
                            <a href="/users/create" class="btn btn-primary pull-right" style="font-size: 13px;margin-right: 50px;">
                                <i class="fa fa-plus" aria-hidden="true"></i> Create User</a>

                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="margin-top: 10px;">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th width="30%">Email</th>
                                <th width="10%">Role</th>
                                <th width="30%">Action</th>
                            </tr>
                            @php
                                $counter = 1;
                            @endphp
                            @if(!empty($user_list) && count($user_list) > 0)
                                @foreach($user_list as $user)
                                    <tr>
                                        <td>
                                            {{ $counter }}
                                        </td>
                                        <td>
                                            {{ $user->first_name." ".$user->last_name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->role->role }}
                                        </td>
                                        <td>
                                            <a href="/users/edit/{{$user->id}}" class="btn btn-primary">Edit</a>
                                            <a class="btn btn-danger" onclick="deleteUser('{{$user->id}}');">Delete</a>
                                        </td>
                                    </tr>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

                @if(!empty($user_list) && count($user_list) > 0)
                    <div class="box-footer">
                        <div class="col-md-12 text-right">
                            {{ $user_list->links() }}
                        </div>
                    </div>
                @endif
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop