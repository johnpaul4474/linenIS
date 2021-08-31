@extends('layouts.app2')
@section('title', 'Condemn from Office')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justfiy-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Condemn Linen from Office</h1>
    </div>
    <hr>
    <div class="col-lg-12">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-12 mr-2">
                                    <div class="font-weight-bold text-primary text-uppercase mb-1">SELECT OFFICE </div>
                                    <select class="form-control ward" name="office_name" id="office_name">
                                        <option selected disabled value="">--Select Office--</option>
                                        @foreach($offices as $key => $value)
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
@endsection
@section('script')
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>

@endsection



{{-- @extends('layouts.app2')

@section('content')

    <div class="col-lg-12">
        <h1>Condemn Linens From Office</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <form method="POST" action="/release_cono/save" enctype="multipart/form-data">
            @csrf
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td align="center">
                            Office
                        </td>
                        <td align="center">
                            Item Name
                        </td>
                        <td align="center">
                            Unit
                        </td>
                        <td align="center">
                            Qty
                        </td>
                        <td align="center">
                            Cost
                        </td>
                        <td align="center">
                            Date Issued
                        </td>
                    </tr>
                </thead>
                <tbody class="addrawmatsbody">
                    <tr>
                        
                        <td>
                            <div>
                                <select id="office_id" type="office_id" class="form-control" name="office_id">
                                    
                                        @foreach ($offices as $office)
                                            @if ($id == $office->id)
                                                <option selected value="{{$office->id}}">{{$office->office_name}}</option>
                                            @else
                                                <option value="{{$office->id}}">{{$office->office_name}}</option>
                                            @endif
                                        @endforeach
                                </select>
        
                                @if ($errors->has('office_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('office_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </td>

                        <td>
                            <div>
                                <input list="item_name" class="form-control" name="item_name" required>
                                <datalist id="item_name">
                                    @foreach($FinishMats as $Mats)
                                        <option value="{{$Mats->item_name}}">
                                    @endforeach
                                </datalist> 
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="item_unit" type="text" name="item_unit" class="form-control">
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="item_qty" type="number" name="item_qty" class="form-control">
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="item_price" type="number" name="item_price" class="form-control">
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="date_issued" type="date" name="date_issued" class="form-control">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection --}}
