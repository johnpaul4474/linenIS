@extends('layouts.app2')

@section('content')
    @if ( $errors->has('confirm'))
        <h1 style="color: RED">Saved!</h1> <br>
    @endif
<div class="container-fluid">
    <div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">Database Maintenance</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 shadow">
            <div class="card shadow-mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
                </div>
                <div class="card-body">
                    <a href="/maintenanceedit/stockroom" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-warehouse"></i>
                        </span>
                        <span class="text">Edit Stock Room</span>
                      </a>
                      <div class="my-2"></div>
                      <a href="/maintenanceedit/storage" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-warehouse"></i>
                        </span>
                        <span class="text">Edit Storage</span>
                      </a>
                      <div class="my-2"></div>
                      <a href="/maintenanceedit/rawmats" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-tshirt"></i>
                        </span>
                        <span class="text">Edit Raw Materials</span>
                      </a>
                      <div class="my-2"></div>
                      <a href="/maintenanceedit/finishmats" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fab fa-product-hunt"></i>
                        </span>
                        <span class="text">Edit Finish Products</span>
                      </a>
                      <div class="my-2"></div>
                      <a href="/maintenanceedit/wardmats" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fab fa-product-hunt"></i>
                        </span>
                        <span class="text">Edit Ward Products</span>
                      </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 shadow">
            <div class="card shadow-mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add</h6>
                </div>
                <div class="card-body">
                    <a href="/maintenanceedit/price" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add New Value to Items </span>
                      </a>
                      <div class="my-2"></div>
                      <a href="/add/ward" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Ward</span>
                      </a>
                      <div class="my-2"></div>
                      <a href="/add/office" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add Office</span>
                      </a>
                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection
