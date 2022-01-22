@extends('layouts.master')
@section('title', $page_title)
@section('header', $page_title)

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
    @if(count($errors))
        <div class="alert alert-danger" id="alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <p>This is the user page for {{ $user->first_name." ".$user->last_name}}, where we store all the details about him/her.</p>
                </div>
                <form role="" method="POST" action="/users/update">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                    <div class="box-body col-md-8">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="first_name">First Name <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{$user->first_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="last_name">Last Name <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user->last_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="email">Email <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="password">Password</label>
                            </div>
                            <div class="col-md-5">
                                <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="confirm_password">Confirm Password</label>
                            </div>
                            <div class="col-md-5">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="{{old('confirm_password')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="">Role</label>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" name="role_id" id="role_id">
                                    @if(!empty($roles))
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{ isset($user->role_id) && $user->role_id == $role->id ? 'selected' : '' }} >
                                            {{$role->role}}
                                        </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="">Registered date</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" value="{{ ($user->created_at != '') ? date('Y-m-d H:i a', strtotime($user->created_at)) : '' }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="">Last updated date</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" value="{{ ($user->updated_at != '') ? date('Y-m-d H:i a', strtotime($user->updated_at)) : '' }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection