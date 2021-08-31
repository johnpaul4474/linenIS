<table class="table table-sm text-gray-800">
    <thead>
        <th>Item Name</th>
        <th>Unit</th>
        <th>Price</th>
        <th>Quantity to Issue</th>
        {{-- <th>Action</th> --}}
    </thead>
    <tbody>
        <tr>
            <td class="issue_Ofname">{{$getToIssueOffice->item_name}}</td>
            <td class="issue_Ofunit">{{$getToIssueOffice->item_unit}}</td>
            <td class="issue_Ofprice">{{$getToIssueOffice->item_price}}</td>
            <td class="issue_Ofissue_Ofqty form-inline">
                <input type="text" hidden class="issue_Ofitem_id" value="{{$getToIssueOffice->item_id}}">
                <input disabled type="number" class="col-5 issue_Ofitem_qty form-control form-control-sm" value="{{$getToIssueOffice->item_qty}}"> 
                {{-- <a href="" class="btnEdit btn btn-sm btn-primary">Edit</a> --}}
                <button class="ml-2 issue_OfbtnEdit btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">Edit</button>
                <button hidden class="ml-2 mr-2 issue_OfbtnSave btn btn-sm btn-success" data-toggle="tooltip" title="Save">Save</button>
                <button hidden class="issue_OfbtnCancel btn btn-sm btn-dark" data-toggle="tooltip" title="Cancel">Cancel</button>
            </td>
        </tr>
    </tbody>
</table>