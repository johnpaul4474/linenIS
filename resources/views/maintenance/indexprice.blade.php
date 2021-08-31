@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Maintenance Price</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <center class="mb-2"><span><h3>Raw Materials</h3></span></center>
        @foreach($rooms as $r)
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header bg-primary" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#collapseOne{{$r->id}}" aria-expanded="true" aria-controls="collapseOne">
                   {{$r->room_name}}
                  </button>
                </h2>
              </div>
              @if($r->id == 1)
                <div id="collapseOne{{$r->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        @foreach($storages as $s)
                        @if($r->id == $s->stockroom_id)
                        <thead>
                            <tr>
                                <th colspan="3" class="form-inline">
                                    <h5>Storage Name: <b>{{$s->storage_name}}</b></h5>
                                </th>
                            </tr>
                            <tr>
                                <td>Item Name</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($RawMats as $raw)
                                @if($s->id == $raw->storage_id)
                                    <tr>
                                        <td>{{$raw->item_name}}</td>
                                        <td>{{$raw->item_price}}</td>
                                        <td><a href="/price/raw/{{$raw->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a></td>
                                    </tr>                                    
                                @endif
                            @endforeach                                
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
              </div>
              @elseif($r->id == 2)
              <div id="collapseOne{{$r->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        @foreach($storages as $s)
                        @if($r->id == $s->stockroom_id)
                        <thead>
                            <tr>
                                <th colspan="3" class="form-inline">
                                    <h5>Storage Name: <b>{{$s->storage_name}}</b></h5>
                                </th>
                            </tr>
                            <tr>
                                <td>Item Name</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($RawMats as $raw)
                                @if($s->id == $raw->storage_id)
                                    <tr>
                                        <td>{{$raw->item_name}}</td>
                                        <td>{{$raw->item_price}}</td>
                                        <td><a href="/price/raw/{{$raw->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a></td>
                                    </tr>
                                @endif
                            @endforeach                                
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
              </div>
              @else
              <div id="collapseOne{{$r->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        @foreach($storages as $s)
                        @if($r->id == $s->stockroom_id)
                        <thead>
                            <tr>
                                <th colspan="3" class="form-inline">
                                    <h5>Storage Name: <b>{{$s->storage_name}}</b></h5>
                                </th>
                            </tr>
                            <tr>
                                <td>Item Name</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($RawMats as $raw)
                                @if($s->id == $raw->storage_id)
                                    <tr>
                                        <td>{{$raw->item_name}}</td>
                                        <td>{{$raw->item_price}}</td>
                                        <td><a href="/price/raw/{{$raw->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a></td>
                                    </tr>                                    
                                @endif
                            @endforeach                                
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
              </div>
              @endif
            </div>
        </div>
        @endforeach
        <hr>
        <center class="mt-2"><span class="mt-2 mb-2"><h3>Finish Materials</h3></span></center>
        @foreach($rooms as $a)
        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header bg-secondary" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#collapseTwo{{$a->id}}" aria-expanded="true" aria-controls="collapseTwo">
                   {{$a->room_name}}
                  </button>
                </h2>
              </div>
              @if($a->id == 1)
                <div id="collapseTwo{{$a->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        @foreach($storages as $s)
                        @if($a->id == $s->stockroom_id)
                        <thead>
                            <tr>
                                <th colspan="3" class="form-inline">
                                    <h5>Storage Name: <b>{{$s->storage_name}}</b></h5>
                                </th>
                            </tr>
                            <tr>
                                <td>Item Name</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($FinishMats as $raw)
                                @if($s->id == $raw->storage_id)
                                    <tr>
                                        <td>{{$raw->item_name}}</td>
                                        <td>{{$raw->item_price}}</td>
                                        <td><a href="/price/raw/{{$raw->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a></td>
                                    </tr>                                    
                                @endif
                            @endforeach                                
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
              </div>
              @elseif($a->id == 2)
              <div id="collapseTwo{{$a->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        @foreach($storages as $s)
                        @if($a->id == $s->stockroom_id)
                        <thead>
                            <tr>
                                <th colspan="3" class="form-inline">
                                    <h5>Storage Name: <b>{{$s->storage_name}}</b></h5>
                                </th>
                            </tr>
                            <tr>
                                <td>Item Name</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($FinishMats as $raw)
                                @if($s->id == $raw->storage_id)
                                    <tr>
                                        <td>{{$raw->item_name}}</td>
                                        <td>{{$raw->item_price}}</td>
                                        <td><a href="/price/raw/{{$raw->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a></td>
                                    </tr>
                                @endif
                            @endforeach                                
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
              </div>
              @else
              <div id="collapseTwo{{$a->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        @foreach($storages as $s)
                        @if($a->id == $s->stockroom_id)
                        <thead>
                            <tr>
                                <th colspan="3" class="form-inline">
                                    <h5>Storage Name: <b>{{$s->storage_name}}</b></h5>
                                </th>
                            </tr>
                            <tr>
                                <td>Item Name</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($FinishMats as $raw)
                                @if($s->id == $raw->storage_id)
                                    <tr>
                                        <td>{{$raw->item_name}}</td>
                                        <td>{{$raw->item_price}}</td>
                                        <td><a href="/price/raw/{{$raw->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a></td>
                                    </tr>                                    
                                @endif
                            @endforeach                                
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
              </div>
              @endif
            </div>
        </div>
        @endforeach
        
        <hr>
        <center class="mt-2"><span class="mt-2 mb-2"><h3>Products Per Ward</h3></span></center>

        <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header bg-dark" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                   WARDS
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        @foreach ($wards as $ward)
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <h5>{{$ward->ward_name}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Item Name
                                </td>
                                <td>
                                    Price
                                </td>
                                <td >
                                    Action
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wardmats as $wardmat)
                                @if ($ward->id == $wardmat->ward_id)
                                    <tr>
                                        <td>
                                            {{$wardmat->item_name}}
                                        </td>
                                        <td>
                                            {{$wardmat->item_price}}
                                        </td>
                                        <td>
                                            <a href="/price/wardmats/{{$wardmat->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        
                    @endforeach
                    </table>
                </div>
              </div>
            </div>
        </div>
          
        {{-- <h1><b>Raw Materials</b></h1>
        <table class="table-striped" style="width: 100%">
            @foreach ($rooms as $room)
                <thead>
                    <tr>
                        <td colspan="3">
                            <h2>Stock Room Name: {{$room->room_name}}</h2>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($RawMats as $raw)
                        @if($s->id == $raw->storage_id)
                            <tr>
                                <td>{{$raw->item_name}}</td>
                                <td>{{$raw->item_price}}</td>
                            </tr>
                        @endif
                    @endforeach
                        
                </tbody>
                <tbody>
                    @foreach ($storages as $storage)
                        @if ($room->id == $storage->stockroom_id)
                            <tr>
                                <td align="center" colspan="3">
                                    <h3>Storage Name: {{$storage->storage_name}}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Item Name
                                </td>
                                <td>
                                    Price
                                </td>
                                <td>
                                    Action
                                </td>
                            </tr>
                            @foreach ($RawMats as $raw)
                                @if($storage->id == $raw->storage_id)
                                    <tr>
                                        <td>
                                            {{$raw->item_name}}
                                        </td>
                                        <td>
                                            {{$raw->item_price}}
                                        </td>
                                        <td>
                                            <a href="/price/raw/{{$raw->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            @endforeach
        </table>
        <hr style="border: 20px solid royalblue; border-radius: 5px;">
        <h1><b>Finish Products</b></h1>
        <table class="table-striped" style="width: 100%">
            @foreach ($rooms as $room)
                <thead>
                    <tr>
                        <td colspan="3">
                            <h2>Stock Room Name: {{$room->room_name}}</h2>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($storages as $storage)
                        @if ($room->id == $storage->stockroom_id)
                            <tr>
                                <td align="center" colspan="3">
                                    <h3>Storage Name: {{$storage->storage_name}}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Item Name
                                </td>
                                <td>
                                    Price
                                </td>
                                <td>
                                    Action
                                </td>
                            </tr>
                            @foreach ($FinishMats as $Finish)
                                @if($storage->id == $Finish->storage_id)
                                    <tr>
                                        <td>
                                            {{$Finish->item_name}}
                                        </td>
                                        <td>
                                            {{$Finish->item_price}}
                                        </td>
                                        <td>
                                            <a href="/price/finish/{{$Finish->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            @endforeach
        </table>
        <hr style="border: 20px solid royalblue; border-radius: 5px;">
        <h1><b>Products Per Ward</b></h1>
        <table class="table-striped" style="width: 100%">
            @foreach ($wards as $ward)
                <thead>
                    <tr>
                        <td colspan="3" align="center">
                            <h3>{{$ward->ward_name}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            Item Name
                        </td>
                        <td>
                            Price
                        </td>
                        <td align="center">
                            Action
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wardmats as $wardmat)
                        @if ($ward->id == $wardmat->ward_id)
                            <tr>
                                <td align="center">
                                    {{$wardmat->item_name}}
                                </td>
                                <td align="center">
                                    {{$wardmat->item_price}}
                                </td>
                                <td align="center">
                                    <a href="/price/wardmats/{{$wardmat->id}}"><button class="btn btn-primary">CHANGE PRICE</button></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                
            @endforeach
        </table> --}}
    </div>
    

@endsection
