    <table class="table table-sm text-gray-800">
        <thead>
            <th>Item Name</th>
            <th>Unit</th>
            <th>Price</th>
            <th>Quantity</th>
            {{-- <th>Action</th> --}}
        </thead>
        <tbody>
            <tr>
                <td class="name">{{$itemDetails->item_name}}</td>
                <td class="unit">{{$itemDetails->item_unit}}</td>
                <td class="price">{{$itemDetails->item_price}}</td>
                <td class="qty form-inline">
                    <input type="text" hidden class="item_id" value="{{$itemDetails->item_id}}">
                    <input type="text" hidden class="ward_id" value="{{$itemDetails->id}}">
                    <input disabled type="number" class="col-5 item_qty form-control form-control-sm" value="{{$itemDetails->item_qty}}"> 
                    {{-- <a href="" class="btnEdit btn btn-sm btn-primary">Edit</a> --}}
                    <button class="ml-2 btnEdit btn btn-sm btn-primary" data-toggle="tooltip" title="Edit">Edit</button>
                    <button hidden class="ml-2 mr-2 btnSave btn btn-sm btn-success" data-toggle="tooltip" title="Save">Save</button>
                    <button hidden class="btnCancel btn btn-sm btn-dark" data-toggle="tooltip" title="Cancel">Cancel</button>
                </td>
            </tr>
        </tbody>
    </table>