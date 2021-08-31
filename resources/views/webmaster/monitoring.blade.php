@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Admin Monitoring</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <div class="row" style="width: 98%; margin: auto;">
            <div class="col-sm-4" style="background-color: #00BFFF; border-radius: 20px; color:white">
                Total Activities: {{$countactlog}}
            </div>
            <div class="col-sm-4">Space1</div>
            <div class="col-sm-4">Space2</div>
        </div>
    </div>
@endsection
