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
            <td class="issue_name">{{$getToIssue->item_name}}</td>
            <td class="issue_unit">{{$getToIssue->item_unit}}</td>
            <td class="issue_price">{{$getToIssue->item_price}}</td>
            <td class="issue_issue_qty form-inline">
                <input type="text" hidden class="issue_item_id" value="{{$getToIssue->item_id}}">
                <input disabled type="number" class="col-5 issue_item_qty form-control form-control-sm" value="{{$getToIssue->item_qty}}"> 
                {{-- <a href="" class="btnEdit btn btn-sm btn-primary">Edit</a> --}}
                <button class="ml-2 issue_btnEdit btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">Edit</button>
                <button hidden class="ml-2 mr-2 issue_btnSave btn btn-sm btn-success" data-toggle="tooltip" title="Save">Save</button>
                <button hidden class="issue_btnCancel btn btn-sm btn-dark" data-toggle="tooltip" title="Cancel">Cancel</button>
            </td>
        </tr>
    </tbody>
</table>