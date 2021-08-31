@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>Staff Maintenance</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-sm-12" align="center">
                <a class="dropdown-item btn" data-toggle="modal" data-target="#AddStaff"><button class="btn btn-primary">Add Staff</button></a>
                <hr>
            </div>
            <div class="col-sm-12" align="center">
                <a class="dropdown-item btn" data-toggle="modal" data-target="#RemoveStaff"><button class="btn btn-primary">Staff List</button></a>
                <hr>
            </div>
        </div>
    </div>

    {{-- MODAL ADD STAFF --}}
    <div class="modal fade" id="AddStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                @foreach ($allhpersonal as $item)
                <table style="width: 100%">
                    <tr style=" border: 1px solid black;">
                        <td style="width: 70%">
                            {{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}
                        </td>
                        <td style="width: 30%">
                            <a href="/addstaff/{{$item->employeeid}}"><button class="btn btn-success">Add As Staff</button></a>
                        </td>
                    </tr>
                </table>
                @endforeach
            </div>
        </div>
        </div>
    </div>

    {{-- MODAL REMOVE STAFF --}}
    <div class="modal fade" id="RemoveStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove Staff</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                    @foreach ($users as $item)
                    <table style="width: 100%">
                        <tr style=" border: 1px solid black;">
                            <td style="width: 70%">
                                {{$item->lastname}}, {{$item->firstname}} {{$item->middlename}}
                            </td>
                            <td style="width: 30%">
                                <a href="/removestaff/{{$item->employeeid}}"><button class="btn btn-success">Remove As Staff</button></a>
                            </td>
                        </tr>
                    </table>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
@endsection
