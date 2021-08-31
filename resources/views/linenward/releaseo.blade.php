@extends('layouts.app2')
@section('title', 'Issue to Office')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justfiy-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Issue Linens to Office</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="office_name col-12 mr-2">
                                <div class="font-weight-bold text-gray-800 text-uppercase mb-1">SELECT OFFICE </div>
                                <select class="form-control ward" name="office_name" id="office_name">
                                    <option selected disabled value="">--Select--</option>
                                    @foreach($offices as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="room_name col-12 mt-4">
                                <div class="font-weight-bold text-gray-800 text-uppercase mb-1">SELECT STOCKROOM </div>
                                <select class="form-control ward" name="room_name" id="room_name">
                                    <option selected disabled value="">--Select--</option>
                                    @foreach($stockroom as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="store_name col-12 mt-4">
                                <div class="font-weight-bold text-gray-800 text-uppercase mb-1">SELECT STORAGE </div>
                                <select class="form-control" name="store_name" id="store_name">
                                    <option selected disabled value="">--Select--</option>
                                </select>
                            </div>
                            <div class="item col-12 mt-4">
                                <div class="font-weight-bold text-gray-800 text-uppercase mb-1">SELECT ITEMS </div>
                                <select class="form-control" name="item_name" id="item_name">
                                    <option selected disabled value="">--Select--</option>
                                </select>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="font-weight-bold text-primary text-uppercase mb-1">OTHER DETAILS </div>
                                <div id="issued_to_office"></div>
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
