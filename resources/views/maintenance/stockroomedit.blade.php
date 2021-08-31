@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Edit Stock Room</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <form method="POST" action="/edit/stockroomsave" enctype="multipart/form-data">
            @csrf
            
            <input id="id" type="text" name="id" class="form-control" value="{{$SR->id}}" hidden required>

            <input id="room_name" type="text" name="room_name" class="form-control" value="{{$SR->room_name}}" required>
            <hr>
            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    

@endsection
