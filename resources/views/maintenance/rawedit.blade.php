@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Raw Materials Edit</h1>
    </div>
    <hr>
    <div class="col-lg-12" align="center">
        <form method="POST" action="/edit/RawMatssave" enctype="multipart/form-data">
            @csrf
            
            <input id="id" hidden type="text" class="form-control" name="id" required value="{{$RawMats->id}}">
            
            <hr>


            <div class="col-md-6">
                <label for="item_name">{{ __('Product Name:') }}</label>
                <input id="item_name" type="text" class="form-control" name="item_name" required value="{{$RawMats->item_name}}">
            </div>
            <hr>

            
            <div class="col-md-6">
                <label for="date_received">{{ __('Date Received:') }}</label>
                <input id="date_received" type="date" class="form-control" name="date_received" required value="{{date('Y-m-d', strtotime($RawMats->date_received))}}">
            </div>
            <hr>

            
            <div class="col-md-6">
                <label for="item_unit">{{ __('Item Unit:') }}</label>
                <input id="item_unit" type="text" class="form-control" name="item_unit" required value="{{$RawMats->item_unit}}">
            </div>
            <hr>

            
            <div class="col-md-6">
                <label for="item_qty">{{ __('Item Qty:') }}</label>
                <input id="item_qty" type="text" class="form-control" name="item_qty" required value="{{$RawMats->item_qty}}">
            </div>
            <hr>
            
            
            <div class="col-md-6">
                <label for="item_price">{{ __('Item Price:') }}</label>
                <input id="item_price" type="text" class="form-control" disabled name="item_price" required value="{{$RawMats->item_price}}">
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
