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
                            The list of sales representatives added to the system.
                        </p>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 350px; padding-top: 15px;">
                            <a href="/sales-representatives/create" class="btn btn-primary pull-right" style="font-size: 13px;margin-right: 50px;">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Sales Representative</a>

                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="margin-top: 10px;">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">First Name</th>
                                <th width="15%">Last Name</th>
                                <th width="15%">Email</th>
                                <th width="10%">Telephone</th>
                                <th width="15%">Current Route</th>
                                <th width="15%">Action</th>
                            </tr>
                            @php
                                $counter = 1;
                            @endphp
                            @if(!empty($sales_representatives_list) && count($sales_representatives_list) > 0)
                                @foreach($sales_representatives_list as $sales_representative)
                                    <tr>
                                        <td>
                                            {{ $counter }}
                                        </td>
                                        <td>
                                            {{ $sales_representative->first_name }}
                                        </td>
                                        <td>
                                            {{ $sales_representative->last_name }}
                                        </td>
                                        <td>
                                            {{ $sales_representative->email  }}
                                        </td>
                                        <td>
                                            {{ $sales_representative->telephone }}
                                        </td>
                                        <td>
                                            {{ $sales_representative->route }}
                                        </td>
                                        <td>
                                            <a href="/sales-representatives/edit/{{$sales_representative->id}}" class="btn btn-primary">Edit</a>
                                            <a class="btn btn-danger" onclick="deleteSalesRepresentative('{{$sales_representative->id}}');">Delete</a>
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

                @if(!empty($sales_representatives_list) && count($sales_representatives_list) > 0)
                    <div class="box-footer">
                        <div class="col-md-12 text-right">
                            {{ $sales_representatives_list->links() }}
                        </div>
                    </div>
                @endif
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
