@extends('layouts.app2')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">Finished Products</h1>
    </div>
    <div class="col-lg-12 text-gray-800">
       <table class="table table-bordered table-striped table-hover" id="myTable">
            <thead class="font-weight-bold">
                <tr>
                    <td align="center">
                        Made From
                    </td>
                    <td align="center">
                        Material Name
                    </td>
                    <td align="center">
                        Material Qty
                    </td>
                    <td align="center">
                        Material Price  
                    </td>
                    <td align="center">
                        Date Created
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($FinishMats as $Finish)
                    <tr>
                        <td>
                            {{$Finish->rawmats_id}}
                        </td>
                        <td>
                            {{$Finish->item_name}}
                        </td>
                        <td>
                            {{$Finish->item_qty}}
                        </td>
                        <td>
                            ₱{{ number_format($Finish->item_price, 2) }}
                        </td>
                        <td>
                            {{date('F d, Y', strtotime($Finish->item_datefinished))}}
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

