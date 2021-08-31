@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Maintenance Storage</h1>
    </div>
    @if ( $errors->has('confirm'))
        <h1 style="color: RED">Updated!</h1> <br>
    @endif
    <hr>
    <div class="col-lg-12">
        <table class="table-striped" style="width: 100%">
            @foreach ($rooms as $room)
                <thead>
                    <tr>
                        <td colspan="2">
                            <h3>Stock Room Name: {{$room->room_name}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            Storage Name
                        </td>
                        <td align="center">
                            Action
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($storages as $storage)
                        @if ($room->id == $storage->stockroom_id)
                            <tr>
                                <td align="center">
                                    {{$storage->storage_name}}
                                </td>
                                <td align="center">
                                    <a href="/edit/storage/{{$storage->id}}"><button class="btn btn-success" style="width: 20%">EDIT</button></a>
                                    <a href="/move/storage/{{$storage->id}}"><button class="btn btn-primary" style="width: 20%">CHANGE STOCK ROOM</button></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>
    

@endsection
