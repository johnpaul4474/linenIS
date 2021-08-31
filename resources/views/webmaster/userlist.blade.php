@extends('layouts.app2')

@section('content')
    <div class="col-lg-12 mb-4">
        <h1 class="h3 mb-2 text-gray-800">User List</h1>
    </div>
    <div class="col-lg-12">
        <table class="table table-striped table-hover table-condensed table-bordered text-gray-800" style="width: 100%" id="myTable">
            <thead class="font-weight-bold">
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        Role #
                    </td>
                    <td>
                        Action
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{$user->lastname}}, {{$user->firstname}} {{$user->middlename}}
                        </td>
                        <td>
                            {{$user->role_id}}
                        </td>
                        <td>
                            <a href="/edituser/{{$user->employeeid}}"><button onclick="return confirm('Edit User?');" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> EDIT</button></a>
                            <a href="/deleteuser/{{$user->employeeid}}"><button onclick="return confirm('Delete User?');" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> DELETE</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection


 



