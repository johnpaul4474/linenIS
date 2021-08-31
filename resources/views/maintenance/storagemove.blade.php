@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Move Storage</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <h2>{{$STO->storage_name}}</h2>
        <form method="POST" action="/move/storagesave" enctype="multipart/form-data">
            @csrf
            
            <input id="id" type="text" name="id" class="form-control" value="{{$STO->id}}" hidden required>

            <div class="form-group row">
                <label for="stockroom_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Stock Room:') }}</label>

                <div class="col-md-6">
                    <select id="stockroom_id" type="stockroom_id" class="form-control{{ $errors->has('stockroom_id') ? ' is-invalid' : '' }}" name="stockroom_id">
                        @foreach ($SR as $item)
                            @if ($STO->stockroom_id == $item->id)
                                <option selected value="{{$item->id}}">{{$item->room_name}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->room_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

            </div>
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
