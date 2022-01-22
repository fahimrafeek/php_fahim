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
                    <p>This is the Sales Representative details page, ypu can update details here.</p>
                </div>
                <form role="" method="POST" action="/sales-representatives/update" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$sales_representative->id}}">
                    <div class="box-body col-md-8">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="first_name">First Name <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{$sales_representative->first_name}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="last_name">Last Name <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{$sales_representative->last_name}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="email">Email <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" value="{{$sales_representative->email}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="telephone">Telephone <span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telephone" id="telephone" value="{{$sales_representative->telephone}}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="joined_date">Joined Date<span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="joined_date" id="joined_date" value="{{ date('Y-m-d', strtotime($sales_representative->joined_date)) }}"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="route">Current Route<span class="ast">*</span></label>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="route" id="route">{{$sales_representative->route}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="comments">Comment</label>
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" name="comments" id="comments">{{$sales_representative->comments}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="">Created date</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ ($sales_representative->created_at != '') ? date('Y-m-d H:i a', strtotime($sales_representative->created_at)) : '' }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="">Last updated date</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{ ($sales_representative->updated_at != '') ? date('Y-m-d H:i a', strtotime($sales_representative->updated_at)) : '' }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9">
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