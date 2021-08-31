@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Finish Product Edit</h1>
    </div>
    <hr>
    <div class="col-lg-12" align="center">
        <form method="POST" action="/edit/FinishMatssave" enctype="multipart/form-data">
            @csrf
            
            <input id="id" hidden type="text" class="form-control" name="id" required value="{{$FinishMats->id}}">
            
            <div class="col-md-6">
                <label for="raw_mat">{{ __('Raw Material:') }}</label>
                <input list="raw_mat" class="form-control" name="raw_mat" required value="{{$FinishMats->rawmats_id}}">
                    <datalist id="raw_mat">
                        @foreach ($Raw as $item)
                            <option value="{{$item->item_name}}">
                        @endforeach 
                    </datalist> 
            </div>
            <hr>


            <div class="col-md-6">
                <label for="item_name">{{ __('Product Name:') }}</label>
                <input id="item_name" type="text" class="form-control" name="item_name" required value="{{$FinishMats->item_name}}">
            </div>
            <hr>

            
            <div class="col-md-6">
                <label for="item_datefinished">{{ __('Date Finished:') }}</label>
                <input id="item_datefinished" type="date" class="form-control" name="item_datefinished" required value="{{date('Y-m-d', strtotime($FinishMats->item_datefinished))}}">
            </div>
            <hr>

            
            <div class="col-md-6">
                <label for="item_unit">{{ __('Item Unit:') }}</label>
                <input id="item_unit" type="text" class="form-control" name="item_unit" required value="{{$FinishMats->item_unit}}">
            </div>
            <hr>

            
            <div class="col-md-6">
                <label for="item_qty">{{ __('Item Qty:') }}</label>
                <input id="item_qty" type="text" class="form-control" name="item_qty" required value="{{$FinishMats->item_qty}}">
            </div>
            <hr>
            
            
            <div class="col-md-6">
                <label for="item_price">{{ __('Item Price:') }}</label>
                <input id="item_price" type="text" class="form-control" disabled name="item_price" required value="{{$FinishMats->item_price}}">
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
