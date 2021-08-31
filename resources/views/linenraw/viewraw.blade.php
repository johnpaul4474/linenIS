@extends('layouts.app2')

@section('content')
<script src="{{ asset('js/leninaddraw.js') }}"></script>
   <div class="container-fluid">
    <div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">View Raw Materials</h1>
    </div>
    <div class="col-lg-12 text-gray-800">
        <table class="table table-bordered table-condensed table-striped" id="myTable">
            <thead class="font-weight-bold">
                <tr>
                    <td align="center">
                        Material Name
                    </td>
                    <td align="center">
                        Material Unit
                    </td>
                    <td align="center">
                        Material Qty
                    </td>
                    <td align="center">
                        Material Price
                    </td>
                    <td align="center">
                        Total Price
                    </td>
                    <td align="center">
                        Date Received
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($RawMats1 as $Raw)
                    <tr>
                        <td>
                            {{$Raw->item_name}}
                        </td>
                        <td>
                            {{$Raw->item_unit}}
                        </td>
                        <td>
                            {{$Raw->item_qty}}
                        </td>
                        <td>
                            P{{$Raw->item_price}}
                        </td>
                        <td>
                            P{{$Raw->total_price}}
                        </td>
                        <td>
                            @if ($Raw->date_received != Null)
                                {{date('F d, Y', strtotime($Raw->date_received))}}
                            @else
                                No Date
                            @endif
                        </td>
                    </tr>
                @endforeach
                
                @foreach($RawMats2 as $Raw)
                    <tr>
                        <td>
                            {{$Raw->item_name}}
                        </td>
                        <td>
                            {{$Raw->item_unit}}
                        </td>
                        <td>
                            {{$Raw->item_qty}}
                        </td>
                        <td>
                            P{{$Raw->item_price}}
                        </td>
                        <td>
                            P{{$Raw->total_price}}
                        </td>
                        <td>
                            @if ($Raw->date_received != Null)
                                {{date('F d, Y', strtotime($Raw->date_received))}}
                            @else
                                No Date
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
   </div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>
@endsection