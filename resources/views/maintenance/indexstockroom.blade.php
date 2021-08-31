@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Maintenance Stock Room</h1>
    </div>
    @if ( $errors->has('confirm'))
        <h1 style="color: RED">Updated!</h1> <br>
    @endif
    <hr>
    <div class="col-lg-12">
        <table class="table-striped" style="width: 100%">
            <thead>
                <tr>
                    <td align="center">
                        <strong>Stock Room Name</strong>
                    </td>
                    <td align="center">
                        <strong>Action</strong>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>
                            {{$room->room_name}}
                        </td>
                        <td align="center">
                            <a href="/edit/stockroom/{{$room->id}}"><button class="btn btn-success" style="width: 80%">EDIT</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

@endsection