@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Move Finish Product To Different Storage</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <h2>{{$FinishMats->item_name}}</h2>
        <form method="POST" action="/move/FinishMatssave" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6">
                <input id="id" type="text" class="form-control" name="id" hidden value="{{$FinishMats->id}}">
            </div>
            <div class="col-md-12" align="center">
                <label for="storage_id">{{ __('Storage Name:') }}</label>
                <select id="storage_id" type="text" class="form-control" name="storage_id">
                    @foreach ($SR as $stock)
                        <optgroup label="{{$stock->room_name}}">
                            @foreach ($STO as $storage)
                                @if ($stock->id == $storage->stockroom_id)
                                    @if ($FinishMats->storage_id == $storage->id)
                                        <option selected value="{{$storage->id}}">{{$storage->storage_name}}</option>
                                    @else
                                        <option value="{{$storage->id}}">{{$storage->storage_name}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
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
