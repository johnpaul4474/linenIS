@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Ward Products Edit</h1>
    </div>
    <h3>This Product Is In Ward: {{$Ward->ward_name}}</h3>
    <hr>
    <div class="col-lg-12" align="center">
        <form method="POST" action="/edit/wardmatssave" enctype="multipart/form-data">
            @csrf
            
            <input id="id" hidden type="text" class="form-control" name="id" required value="{{$WardMats->id}}">
            
            <hr>


            <div class="col-md-6">
                <label for="item_name">{{ __('Product Name:') }}</label>
                <input id="item_name" type="text" class="form-control" name="item_name" required value="{{$WardMats->item_name}}">
            </div>
            <hr>

            
            <div class="col-md-6">
                <label for="item_issued">{{ __('Date Issued:') }}</label>
                <input id="item_issued" type="date" class="form-control" name="item_issued" required value="{{date('Y-m-d', strtotime($WardMats->item_issued))}}">
                {{-- <input id="date_issued" type="date" class="form-control" name="date_issued" required value="{{date('Y-m-d', strtotime($WardMats->date_issued))}}"> --}}
            </div>
            <hr>

            
            <div class="col-md-6">
                <label for="item_unit">{{ __('Item Unit:') }}</label>
                <input id="item_unit" type="text" class="form-control" name="item_unit" required value="{{$WardMats->item_unit}}">
            </div>
            <hr>

            
            <div class="col-md-6">
                <label for="item_qty">{{ __('Item Qty:') }}</label>
                <input id="item_qty" type="text" class="form-control" name="item_qty" required value="{{$WardMats->item_qty}}">
            </div>
            <hr>
            
            
            <div class="col-md-6">
                <label for="item_price">{{ __('Item Price:') }}</label>
                <input id="item_price" type="text" class="form-control" disabled name="item_price" required value="{{$WardMats->item_price}}">
            </div>
            <hr>
            
            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    

@endsection
