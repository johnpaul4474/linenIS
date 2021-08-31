@extends('layouts.app2')
@section('title', 'Issue to Ward')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justfiy-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Issue Linens to Wards</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="ward_name col-12 mr-2">
                                    <div class="font-weight-bold text-gray-800 text-uppercase mb-1">SELECT WARD </div>
                                    <select class="form-control ward" name="ward_name" id="ward_name">
                                        <option selected disabled value="">--Select--</option>
                                        @foreach($wards as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach  
                                    </select>
                            </div>
                            <div class="stock_name col-12 mt-4">
                                <div class="font-weight-bold text-gray-800 text-uppercase mb-1">SELECT STOCKROOM </div>
                                <select class="form-control ward" name="stock_name" id="stock_name">
                                    <option selected disabled value="">--Select--</option>
                                    @foreach($stockroom as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach  
                                </select>
                        </div>
                        <div class="storage_name col-12 mt-4">
                            <div class="font-weight-bold text-gray-800 text-uppercase mb-1">SELECT STORAGE </div>
                            <select class="form-control" name="storage_name" id="storage_name">
                                <option selected disabled value="">--Select--</option>
                            </select>
                    </div>
                        <div class="item col-12 mt-4">
                            <div class="font-weight-bold text-gray-800 text-uppercase mb-1">SELECT ITEMS </div>
                            <select class="form-control" name="item_toIssue" id="item_toIssue">
                                <option selected disabled value="">--Select--</option>
                            </select>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="font-weight-bold text-primary text-uppercase mb-1">OTHER DETAILS </div>
                        <div id="issued_item_details"></div>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>
@endsection
