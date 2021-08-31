@extends('layouts.app2')
@section('title', 'Condemn from Ward')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justfiy-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Condemn Linen from Wards</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-12 mr-2">
                                    <div class="font-weight-bold text-primary text-uppercase mb-1">SELECT WARD </div>
                                    <select class="form-control ward" name="ward_name" id="ward_name">
                                        <option selected disabled value="">--Select Ward--</option>
                                        @foreach($wards as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach  
                                    </select>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="font-weight-bold text-primary text-uppercase mb-1">SELECT ITEM </div>
                                <select class="form-control" name="item" id="item_name">
                                    <option selected disabled value="">--Select Item--</option>
                                </select>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="font-weight-bold text-primary text-uppercase mb-1">OTHER DETAILS </div>
                            <div id="item_details"></div>
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

