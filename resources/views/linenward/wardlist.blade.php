@extends('layouts.app2')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">Ward List</h1>
    </div>
    <div class="col-lg-12 text-gray-800">
        <table class="table table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <td>
                        Ward
                    </td>
                    <td>
                        Action
                    </td>
                    {{-- <td>
                            Number Of Products In Ward
                        </td> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($wards as $ward)
                <tr>
                    <td>
                        <a href="/ward/{{$ward->id}}">{{$ward->ward_name}}</a>
                    </td>
                    <td>
                        <a href="/release/{{$ward->id}}"><button class="btn btn-info">Add Product</button></a>
                    </td>
                    {{-- <td>
                                @include('linenward.table')
                            </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>
@endsection
