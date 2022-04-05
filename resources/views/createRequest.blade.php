@extends('layouts.appUserRole4')
@section('title', 'Home')

@section('content')

  
  <body>    
            <div class="container-fluid">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-12">
                    <!-- Featured blog post-->
                    <h4 class="card-title">LINEN AVAILABLE PRODUCTS</h4>
                        <table id="linenProductsTable" class="stripe" style="width:100%">
                            <thead>
                                <tr>
                                     <th></th>
                                    <th>finishmats_id</th>
                                    <th>Item name</th>                                    
                                    <th>Quantity</th>
                                    <th>Status</th>                                    
                                
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($linenProducts as $product) 
                                <tr>
                                    <td></td>
                                    <td>{{$product->finishmats_id}}</td> 
                                    <td>{{$product->item_name}}</td>                                    
                                    <td>{{$product->item_qty}}</td>
                                    <td>to-do status</td>

                                </tr>
                                @endforeach
                            </tbody>    
                        </table>
      
                    
                        <button onclick="getSelected()">Get Selected</button>
                  

                </div>

            </div>
        </div>
        <!-- Footer-->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>s
      

      
    </div>

  </body>

@endsection



@section('script')

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
<style>
    table.dataTable th,td {
            font-size: 1.0em;
        }
    .bgimg {
            background-image: url('../linen_green.avif');
            background-attachment:fixed;
            background-size: 100%;
        }

            
</style>
<script>
var tbl;
$(document).ready(function() {
        tbl = $('#linenProductsTable').DataTable( {
            columnDefs: [ {
                        orderable: false,
                        className: 'select-checkbox',
                        targets:   0,  
                       
                        'checkboxes': {
                            'selectRow': true
                        }
                        },
                        {
                        targets: [ 1 ],
                        visible: false,
                        searchable: false
                        }],
            select: {
                    style:    'multi',
                    selector: 'td:first-child'
            },
            order: [[ 2, 'asc' ]],
     
        });


});
function getSelected() {
//    var selectedIds = tbl.columns().checkboxes.selected()[0];
   //onsole.log(tbl);

//    selectedIds.forEach(function(selectedId) {
//       alert(selectedId);
//    });
var rows_selected = $('#linenProductsTable').DataTable().column(0).select().data();

   // Output form data to a console     
  console.log(rows_selected);
}
 </script>

@endsection