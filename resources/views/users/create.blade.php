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
                    <p>This allows Admin to create users to be added to the system.</p>
                </div>

                <form role="form" method="POST" action="/users/store">
                    @csrf
                    <div class="box-body col-md-8">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="first_name">First Name <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{old('first_name')}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="last_name">Last Name <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{old('last_name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="email">Email <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="password">Password <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="confirm_password">Confirm Password <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="{{old('confirm_password')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="role_id">Role <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" name="role_id" id="role_id">
                                    @if(!empty($roles))
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{$role->role}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-primary pull-right">Create</button>
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