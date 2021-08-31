@extends('layouts.app2')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">Add Office</h1>
    </div>
    @if ( $errors->has('confirm'))
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-primary text-white shadow">
              <div class="card-body">
               <h6>Office Added Successfully!</h6>
              </div>
            </div>
          </div>
    </div>
    {{-- <h1 style="color: RED">Office Added</h1> <br> --}}
    @endif
    <div class="row">
        <div class="col-lg-4 shadow">
            <form method="POST" action="/add/office/save" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0 mt-3">
                        <input type="text" class="form-control form-control" id="office_name" name="office_name"
                            placeholder="Add Office">
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
                    <h4 class="m-0 text-gray-800">Office Lists</h4>
                </div>
                <div class="card-body">
                    <table class="table table-condensed table-hover" id="myTable">
                        <thead>
                            <tr>
                                <td>Office Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>
                                   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>
@endsection
