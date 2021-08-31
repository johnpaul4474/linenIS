@extends('layouts.app2')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">Add Ward</h1>
    </div>
    @if ( $errors->has('confirm'))
    <h1 style="color: RED">Ward Added</h1> <br>
    @endif
    <div class="row">
        <div class="col-lg-4 shadow">
            <form method="POST" action="/add/ward/save" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0 mt-3">
                        <input type="text" class="form-control form-control" id="ward_name" name="ward_name"
                            placeholder="Add Ward">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary col-12">
                    {{ __('Save') }}
                </button>
            </form>
        </div>
        <div class="col-8 shadow">
            <div class="card shadow-mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 text-gray-800">Ward Lists</h4>
                </div>
                <div class="card-body">
                    <table class="table table-condensed table-hover" id="myTable">
                        <thead class="text-gray-800 font-weight-bold">
                            <tr>
                                <td>Ward Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wards as $ward)
                            <tr>
                                <td>
                                    {{$ward->ward_name}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
