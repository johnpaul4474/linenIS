@extends('layouts.app2')

@section('content')
{{-- <script src="{{ asset('js/leninaddfinish.js') }}"></script> --}}
<div class="col-lg-12 shadow mb-3 form-inline" style="border-radius: 25px">
    <img src="../img/data-warehouse.png" alt="" height="50" width="50">
    <h1 class="h3 ml-2 mt-2"></i>Add Storage</h1>
</div>
<hr>
<div class="row">
    <div class="col-6">
        <form method="POST" action="/add/stockroom/save" enctype="multipart/form-data">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td align="center">
                            Stock Room Name
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>
                            <div>
                                <input id="room_name" type="text" name="room_name" placeholder="Type Stock Name"
                                    class="form-control" required>
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
        <div class="card">
            <div class="card-body">
                @foreach ($rooms as $item)
                <h3>{{$item->room_name}}</h3>
                @endforeach
            </div>
        </div>
    </div>
</div>



@endsection