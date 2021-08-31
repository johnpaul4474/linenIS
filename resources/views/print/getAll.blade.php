<table class="table table-sm text-gray-800">
    <thead>
        <th>Quantity Issued</th>
        <th>Description</th>
        <th>Unit</th>
        <th>Unit Cost</th>
    </thead>
    <tbody>
       @foreach($tot as $tot)
       <tr class="main">
            <td class="lcs_qty_issued">{{$tot->item_qty_issued}}</td>
            <td class="lcs_unit">{{$tot->item_unit}}</td>
            <td class="lcs_item">{{$tot->item_name}}</td>
            <td class="lcs_price">₱ {{$tot->item_price}}</td>
        </tr>
       @endforeach
       <tr id="values">
            <td colspan="2"></td>
            <td><input type="text" hidden id="g_id" value="{{$tot->g_id}}"></td>
            {{-- <td><button class="btn btn-block btn-primary btn_Print">Print </button></td> --}}
        </tr>
    </tbody>
</table>