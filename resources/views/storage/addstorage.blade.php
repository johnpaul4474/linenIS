@extends('layouts.app2')
@section('title', 'Storage')

@section('content')
{{-- <script src="{{ asset('js/leninaddfinish.js') }}"></script> --}}
    <div class="col-lg-12 shadow mb-3 form-inline" style="border-radius: 25px">
        <img src="../img/cabinet.png" alt="" height="50" width="50"><h1 class="h3 ml-2 mt-2"></i>Add Storage</h1>
    </div>
    <hr>
    <div class="row">
    <div class="col-6">
        <form method="POST" action="/add/storage/save" enctype="multipart/form-data">
            @csrf

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td align="center">
                            Select Stock Room Name
                        </td>
                        <td align="center">
                            Storage Name
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>
                            <div>
                                <select list="stockroom_id" class="form-control" name="stockroom_id" required>
                                    @foreach ($rooms as $item)
                                        <option value="{{$item->id}}">{{$item->room_name}}</option>
                                    @endforeach 
                                </select> 
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="storage_name" type="text" name="storage_name" class="form-control" required>
                            </div>
                        </td>

                    </tr>
                </tbody>
            </table>
            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <center><button type="submit" class="col-10 btn btn-primary">
                        {{ __('Save') }}
                    </button></center>
                </div>
            </div>
        </form>
    </div>
    <div class="col-6">
        @foreach ($rooms as $room)
        <h4 class="bg-primary text-white" style="border-radius: 10px">{{$room->room_name}}</h4>
        @foreach ($storages as $item)
            @if($room->id == $item->stockroom_id)
                <h5>{{$item->storage_name}}</h5>
            @endif
        @endforeach
        <hr>
    @endforeach
    </div>
    </div>
    
    

@endsection