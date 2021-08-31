@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>{{$room->room_name}}</h1>
        <h3>{{$storage->storage_name}}</h3>
    </div>
    <hr>
    <div class="col-lg-12">
        <table class="table-bordered" style="width: 100%">
            <thead>

                <tr  align="center">
                    <td colspan="5">
                        Raw Materials
                    </td>
                </tr>
                <tr  align="center">
                    <td>
                        Item Description
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
                </tr>
            
            </thead>
            <tbody>

                @foreach ($raws as $raw)
                    <tr>
                        <td>
                            {{$raw->item_name}}
                        </td>
                        <td>
                            {{$raw->item_unit}}
                        </td>
                        <td>
                            {{$raw->item_qty}}
                        </td>
                        <td>
                            P{{$raw->item_price}}
                        </td>
                        <td>
                            P{{$raw->total_cost}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <table class="table-bordered" style="width: 100%">
            <thead>

                <tr  align="center">
                    <td colspan="5">
                        Finish Materials
                    </td>
                </tr>
                <tr  align="center">
                    <td>
                        Item Description
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
                </tr>
            
            </thead>
            <tbody>

                @foreach ($finishs as $finish)
                    <tr>
                        <td>
                            {{$finish->item_name}}
                        </td>
                        <td>
                            {{$finish->item_unit}}
                        </td>
                        <td>
                            {{$finish->item_qty}}
                        </td>
                        <td>
                            P{{$finish->item_price}}
                        </td>
                        <td>
                            P{{$finish->total_cost}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

@endsection
