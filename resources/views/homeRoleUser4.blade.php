@extends('layouts.appUserRole4')
@section('title', 'Home')

@section('content')

  
  <body>    
            <div class="container-fluid">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-12">
                    <!-- Featured blog post-->
                   
                        
                       
                            
                            <h4 class="card-title">{{$wardList[0]->ward_name}} ISSUED LINEN</h4>

                       
                        <table id="table_id" class="stripe" style="width:100%">
                            <thead>
                                <tr>
                                    
                                    <th>Item name</th>                                    
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date Issued</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($wardList as $ward) 
                                <tr>
                                    <td>{{$ward->item_name}}</td>                                    
                                    <td>{{$ward->item_qty}}</td>
                                    <td>₱ {{$ward->item_price}}</td>
                                    <td>{{$ward->item_issued}}</td>
                                </tr>
                                @endforeach
                            
                        </table>
                        <script>
                            $(document).ready(function () {
                                $('#table_id').DataTable({
                                    "order": [[ 0, "asc" ]]
                                });
                            });

                        </script>
                    
                    <!-- Nested row for non-featured blog posts-->
                    <br>
                    <!-- <div class="row">
                        <div class="col-lg-6">
                            
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2022</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2022</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                           
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2022</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                           
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2022</div>
                                    <h2 class="card-title h4">Post Title</h2>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                  

                </div>

            </div>
        </div>
        <!-- Footer-->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>s
      

      
    </div>
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
  </body>

@endsection


