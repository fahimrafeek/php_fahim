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
                    <p>This allows you to add Sales Representatives to be added to the system.</p>
                </div>

                <form role="form" method="POST" action="/sales-representatives/store" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body col-md-8">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="first_name">First Name <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{old('first_name')}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="last_name">Last Name <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{old('last_name')}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="email">Email <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="telephone">Telephone <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telephone" id="telephone" value="{{old('telephone')}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="joined_date">Joined Date<span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="joined_date" id="joined_date" value="{{old('joined_date')}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="route">Current Route<span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="route" id="route">{{old('route')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="comments">Comment</label>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="comments" id="comments">{{old('comments')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
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
