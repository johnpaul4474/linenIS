@extends('layouts.app2')
@section('title', 'Stock Room List')

@section('content')
<div class="col-lg-12 shadow mb-3 form-inline" style="border-radius: 20px">
    <h1 class="h3 ml-2 mt-2">Stock Room List</h1>
</div>
<hr>
<div class="container-fluid">
    @foreach($rooms as $room)
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left bg-primary text-white" type="button" data-toggle="collapse"
                        data-target="#collapseOne{{$room->id}}" aria-expanded="true" aria-controls="collapseOne{{$room->id}}">
                        <img src="../img/folder (1).png" height="25" width="25" alt="" class="mr-2"> {{$room->room_name}}
                    </button>
                </h2>
            </div>

            <div id="collapseOne{{$room->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <h6 class="collapse-header font-weight-bold">Storage List</h6>
                    @foreach ($storages as $storage)
                    @if ($room->id == $storage->stockroom_id)
                    <a href="/storage/{{$storage->id}}"><button class="btn btn-success font-weight-bold">{{$storage->storage_name}}</button></a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- @foreach ($rooms as $room)
    <div class="col-lg-12">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoom{{$room->id}}"
            aria-expanded="true" aria-controls="collapseRoom{{$room->id}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>{{$room->room_name}}</span>
        </a>
        <div id="collapseRoom{{$room->id}}" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Storage List</h6>
                @foreach ($storages as $storage)
                @if ($room->id == $storage->stockroom_id)
                <a href="/storage/{{$storage->id}}"><button
                        class="btn btn-success">{{$storage->storage_name}}</button></a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    @endforeach --}}
</div>
@endsection