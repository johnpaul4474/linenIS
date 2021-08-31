@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Storage List</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        @foreach ($rooms as $room)
        <h1>{{$room->room_name}}</h1>
            @foreach ($storages as $item)
                @if ($room->id == $item->stockroom_id)
                    <a href="/storage/{{$item->id}}"><button class="btn btn-success">{{$item->storage_name}}</button></a>
                @endif
            @endforeach
        @endforeach
    </div>
    

@endsection
