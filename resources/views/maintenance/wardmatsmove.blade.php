@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Move Products To Different Ward</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <h2>{{$WardMats->item_name}}</h2>
        <form method="POST" action="/move/wardmatssave" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6">
                <input id="id" type="text" class="form-control" name="id" hidden value="{{$WardMats->id}}">
            </div>
            <div class="col-md-12" align="center">
                <label for="ward_id">{{ __('Storage Name:') }}</label>
                <select id="ward_id" type="text" class="form-control" name="ward_id">
                    @foreach ($Wards as $Ward)
                        @if ($WardMats->ward_id == $Ward->id)
                            <option selected value="{{$Ward->id}}">{{$Ward->ward_name}}</option>
                        @else
                            <option value="{{$Ward->id}}">{{$Ward->ward_name}}</option>
                        @endif
                        
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
