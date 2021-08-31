@extends('layouts.app2')
@section('title', 'Reports')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justfiy-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">REPORTS GENERATION</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <div class="row">
            {{-- LCS --}}
            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="h4 card-header bg-transparent text-gray-800">
                        Generate Linen Custodian Slip
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="select col-12 mr-2">
                                <div class="font-weight-bold text-gray-800 text-uppercase mb-1">select</div>        
                                    <select class="form-control" name="name" id="off_name">
                                        <option selected disabled value="">--Select--</option>
                                        <option value="0">Offices</option>
                                        <option value="1">Wards</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row no-gutters align-items-center mt-3">
                            <div class="select col-12 mr-2">
                                <div class="font-weight-bold text-gray-800 text-uppercase mb-1">select ward / office</div>        
                                    <select class="form-control" name="name" id="sel_name">
                                        <option selected disabled value="">--Select--</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-header bg-transparent text-gray-800">
                        <div class="row">
                            <div class="h4 col-6">Details</div>
                            <div class="col-6 float-right"><button class="btn btn-sm float-right btn-primary btn_Print">Print </button></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="issued"></div>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            {{-- END LCS --}}

            {{-- CONDEMN --}}
            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="h4 card-header bg-transparent text-gray-800">
                        Generate Linen Condemn
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="select col-12 mr-2">
                                <div class="font-weight-bold text-gray-800 text-uppercase mb-1">select</div>        
                                    <select class="form-control" name="name" id="con_off_name">
                                        <option selected disabled value="">--Select--</option>
                                        <option value="0">Offices</option>
                                        <option value="1">Wards</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row no-gutters align-items-center mt-3">
                            <div class="select col-12 mr-2">
                                <div class="font-weight-bold text-gray-800 text-uppercase mb-1">select ward / office</div>        
                                    <select class="form-control" name="name" id="con_sel_name">
                                        <option selected disabled value="">--Select--</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-header bg-transparent text-gray-800">
                        <div class="row">
                            <div class="col-6 h4">Details</div>
                            <div class="col-6 float-right"><button class="btn btn-sm float-right btn-primary btn_ConPrint">Print </button></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="condemn"></div>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/sweetalert2.js')}}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
        $('.btn_Print').click(function () {
            pop_searchPatient();
        });

    });

    function pop_searchPatient() {
        //window pop
        let w = 1250;
        let h = 635;
        let left = (screen.width / 2) - (w / 2);
        let top = (screen.height / 2) - (h / 2) - 50;
        $g_id = $('#g_id').val();
        var id = $g_id;
        $.get({
            url: '/printlcs/' + id,
            data: {
                id: id
            },
            success: function(data)
            {
                if(data !=null)
                {
                  childWin = window.open("/printlcs/" + id, "searchPatient", "height=" + h + ", width=" + w +
            ", status=no, toolbar=no, menubar=no, location=no,addressbar=no,directories=no,top=" + top + ", left=" +
            left);
                }
            }
        });
    }


    // CONDEMN PRINTING FUNCTION
    $(function () {
        $('.btn_ConPrint').click(function () {
            pop_getCondemn();
        });

    });

    function pop_getCondemn() {
        //window pop
        let w = 1250;
        let h = 635;
        let left = (screen.width / 2) - (w / 2);
        let top = (screen.height / 2) - (h / 2) - 50;
        $c_id = $('#c_id').val();
        var id = $c_id;
        $.get({
            url: '/printcondemn/' + id,
            data: {
                id: id
            },
            success: function(data)
            {
                if(data !=null)
                {
                  childWin = window.open("/printcondemn/" + id, "searchPatient", "height=" + h + ", width=" + w +
            ", status=no, toolbar=no, menubar=no, location=no,addressbar=no,directories=no,top=" + top + ", left=" +
            left);
                }
            }
        });
    }

</script>


@endsection
