var index = 1;
function addfield(){
    var item_name = $('.item_name').html();
    var tr = '<tr><td> <div> <input id="item_name['+index+']" type="text" name="item_name['+index+']" class="form-control"> </div> </td> <td> <div> <input id="item_unit['+index+']" type="text" name="item_unit['+index+']" class="form-control"> </div> </td> <td> <div> <input id="item_qty['+index+']" type="number" name="item_qty['+index+']" class="form-control"> </div> </td> <td> <div> <input id="item_price['+index+']" type="number" name="item_price['+index+']" class="form-control"> </div> </td> <td> <div> <input id="date_received['+index+']" type="date" name="date_received['+index+']" class="form-control"> </div> </td><td><input type="button" class="btn btn-danger delete" onclick="deletefield()" value="X"></td></tr>';

        
    index++;
    console.log('Add People Involved index : ' + index);
    $('.addrawmatsbody').append(tr);

}

function deletefield(){
$('.addrawmatsbody').delegate('.delete', 'click', function(){
    $(this).parent().parent().remove();
});
}