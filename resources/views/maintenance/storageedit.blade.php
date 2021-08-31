@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Edit Storage</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <form method="POST" action="/edit/storagesave" enctype="multipart/form-data">
            @csrf
            
            <input id="id" type="text" name="id" class="form-control" value="{{$STO->id}}" hidden required>

            <input id="storage_name" type="text" name="storage_name" class="form-control" value="{{$STO->storage_name}}" required>
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
