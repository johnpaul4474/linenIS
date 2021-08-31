@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>{{$wardname->ward_name}}</h1>
        <a href="/release/{{$wardname->id}}"><button class="btn btn-primary">Add Product</button></a>
        {{-- <button class="btn btn-success float-right" type="submit">Print</button> --}}
    </div>
    <hr>
    <div class="col-lg-12">
       <table class="table table-bordered">
            <thead>
                <tr>
                    <td>
                        Item Name
                    </td>
                    <td>
                        Unit
                    </td>
                    <td>
                        Qty
                    </td>
                    <td>
                        Cost
                    </td>
                    <td>
                        Total Cost
                    </td>
                    <td>
                        Date Created
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($warddetails as $ward)
                    <tr>
                        <td>
                            {{$ward->item_name}}
                        </td>
                        <td>
                            {{$ward->item_unit}}
                        </td>
                        <td>
                            {{$ward->item_qty}}
                        </td>
                        <td>
                            P{{$ward->item_price}}
                        </td>
                        <td>
                            P{{$ward->total_cost}}
                        </td>
                        <td>
                            {{Carbon\Carbon::parse($ward->created_at)->format('m-d-Y, m:i:A')}}
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
       </table>
    </div>
    

@endsection
