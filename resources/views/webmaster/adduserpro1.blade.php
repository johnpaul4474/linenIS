@extends('layouts.app2')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="h3 mb-4 text-gray-800">Add User</h1>
        </div>
        <div class="col-lg-12 text-gray-800">
            <table class="table table-bordered table-condensed table-striped" style="width: 100%" id="myTable">
                <thead class="font-weight-bold">
                    <tr style=" border: 1px solid black;">
                        <td>
                            Name
                        </td>
                        <td>
                            Action
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allhpersonal as $item)
                        <tr style=" border: 1px solid black;">
                            <td>
                                {{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}
                            </td>
                            <td>
                                <a href="/adduser/pro1/{{$item->employeeid}}"><button class="btn btn-success">ADD USER TO Linen IS</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection
