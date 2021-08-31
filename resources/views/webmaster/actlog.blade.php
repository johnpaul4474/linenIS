@extends('layouts.app2')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
        <h1 class="h3 mb-4 text-gray-800">Activity Log</h1>
    </div>
    <div class="col-lg-12 text-gray-800">
        <div style="width: 100%; height: 700px; overflow: auto">
            <table class="table table-bordered table-striped" style="width: 100%; height: 100%" id="myTable">
                <thead class="font-weight-bold">
                    <tr style=" border: 1px solid black;">
                        <td align="center" style="width: 15%">
                            Employee
                        </td>
                        <td align="center">
                            Activity Details
                        </td>
                        <td align="center">
                            Date/Time
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actlog as $act)
                    <tr style=" border: 1px solid black;">
                        <td>
                            {{$act->lastname}}, {{$act->firstname}} {{$act->middlename}}
                        </td>
                        <td>
                            {{$act->act_details}}
                        </td>
                        <td>
                            {{date('F d Y / H:i:s', strtotime($act->created_at))}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                        <tr align="center">
                            <td colspan="3">
                                {{ $actlog->links() }}
                </td>
                </tr>
                </tfoot> --}}
            </table>
        </div>
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
