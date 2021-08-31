@extends('layouts.app2')
@section('title', 'Home')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justfiy-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">total raw materials </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">@foreach($totRaw as $t) {{$t->total}} @endforeach</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-archive fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">total finish materials </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">@foreach($totFinish as $t) {{$t->total}} @endforeach</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">total issued to wards </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">@foreach($totWard as $t) {{$t->total}} @endforeach</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-door-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">total condemned to wards </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">@foreach($totCondemn as $t){{$t->total}}@endforeach</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-door-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="shadow card mb-4">
            <div class="card-header py-3 d-flex d-flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">REQUESTS</h6>
            </div>
            <div class="card-body"></div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-3">
        <div class="shadow card mb-4">
            <div class="card-header py-3 d-flex d-flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">LIST OF STORAGES CREATED</h6>
            </div>
            <div class="card-body">
                @foreach ($rooms as $r)
                    <div class="h5 text-gray-900">{{$r->room_name}}</div>
                    @foreach ($storage as $s)
                        @if($r->id == $s->stockroom_id)
                           <h6><small>{{$s->storage_name}}</small></h6>
                        @endif
                    @endforeach
                    <hr>
                @endforeach
            </div>
    </div>
</div>

</div>
@endsection
