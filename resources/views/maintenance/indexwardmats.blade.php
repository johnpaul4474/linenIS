@extends('layouts.app2')

@section('content')
<div class="col-lg-12 text-gray-800">
    <h1>Maintenance Ward</h1>
</div>
@if ( $errors->has('confirm'))
<h1 style="color: RED">Updated!</h1> <br>
@endif
<hr>
<div class="col-lg-12 text-gray-800">
    <table class="table-striped" style="width: 100%">
        @foreach ($wards as $ward)
        <thead class="font-weight-bold">
            <tr>
                <td colspan="6" align="center">
                    <h3 style="background-color: royalblue; color: white; border-radius: 20px">{{$ward->ward_name}}</h3>
                </td>
            </tr>
            <tr>
                <td>Item Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td class="text-center">Status</td>
                <td class="text-center">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($wardmats as $wardmat)
            @if ($ward->id == $wardmat->ward_id)
            <tr>
                <td>
                    {{$wardmat->item_name}}
                </td>
                <td>
                    ₱{{ number_format($wardmat->item_price, 2) }}
                </td>
                <td>
                    {{$wardmat->item_qty}}
                </td>
                <td>
                    @if($wardmat->is_archived == 0)
                   <span class="badge badge-primary"> Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <div class="row float-right">
                        <a href="/edit/wardmats/{{$wardmat->id}}"><button class="btn btn-success mr-2">Edit</button></a>
                        <a href="/move/wardmats/{{$wardmat->id}}"><button class="btn btn-primary mr-2">Move Product</button></a>
                        
                        <input type="text" disabled class="col-2 form-control form-control-sm" id="mat_id" value="{{$wardmat->id}}">
                        <button type="submit" class="btn btn-info btnChange">Change Status</button>
                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>

        @endforeach
    </table>
</div>
@endsection
@section('script')
<script src="{{asset('js/scripts.js')}}"></script>
    
@endsection
