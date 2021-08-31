@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Maintenance Raw Materials</h1>
    </div>
    <hr>
    @if ( $errors->has('confirm'))
        <h1 style="color: RED">Updated!</h1> <br>
    @endif
    <div class="col-lg-12">
        <table class="table-striped" style="width: 100%">
            @foreach ($rooms as $room)
                <thead>
                    <tr>
                        <td colspan="4">
                            <h2>Stock Room Name: {{$room->room_name}}</h2>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($storages as $storage)
                        @if ($room->id == $storage->stockroom_id)
                            <tr>
                                <td align="center" colspan="4">
                                    <h3>Storage Name: {{$storage->storage_name}}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Item Name
                                </td>
                                <td>
                                    Unit
                                </td>
                                <td>
                                    Qty
                                </td>
                                <td>
                                    Action
                                </td>
                            </tr>
                            @foreach ($RawMats as $Raw)
                                @if($storage->id == $Raw->storage_id)
                                    <tr>
                                        <td>
                                            {{$Raw->item_name}}
                                        </td>
                                        <td>
                                            {{$Raw->item_unit}}
                                        </td>
                                        <td>
                                            {{$Raw->item_qty}}
                                        </td>
                                        <td>
                                            <a href="/edit/RawMats/{{$Raw->id}}"><button class="btn btn-success">EDIT</button></a>
                                            <a href="/move/RawMats/{{$Raw->id}}"><button class="btn btn-primary">MOVE</button></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            @endforeach
        </table>
    </div>
@endsection