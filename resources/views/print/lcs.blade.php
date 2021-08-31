@extends('layouts.app3')
@section('title', 'Custodian Slip')

@section('content')
<div class="container-fluid landscape" id="pure-g">
    <button class="btn btn-primary d-print-none button ml-2 mb-2" onclick="print()">Print</button>
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="lcs col-3 right">
                        <img src="/bghmc.png" class="img-thumbnail">
                    </div>
                    <div class="lcs col">
                        <div class="row">
                            <div class="col-12">
                                <div class="lcs all text-center">Republic of the Philippines</div>
                                <div class="lcs all text-center">Department of Health</div>
                                <div class="lcs all text-center font-weight-bold">BAGUIO GENERAL HOSPITAL AND MEDICAL
                                    CENTER
                                </div>
                                <div class="lcs all text-center">Baguio City</div>
                            </div>
                        </div>
                        <div class="row lcs left right bottom">
                            <div class="col">
                                <div class="po all text-center text-muted">GENERAL SERVICE SECTION - LINEN ROOM</div>
                                <div class="text-center">
                                    <h1>LINEN CUSTODIAN SLIP</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col ml-2 mr-1">
                                    <div class="col lcs top bottom right"> Form No.: HS-GSS-008</div>
                                    <div class="col lcs bottom right mr-2"> Revision No.: Ø</div>
                                    <div class="col lcs bottom right mr-2">Effectivity Date: August 1, 2014</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 bheight"></div>
            <table class="table table-bordered table-sm">
                <thead class="text-center">
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Item/Description</th>
                    <th>Amount</th>
                    <th>Serial No.</th>
                    <th>Acquisition Date</th>
                    <th>Warranty Period (mo./yrs.)</th>
                    <th>Estimated Useful Life(in years)</th>
                    <th>Remarks</th>
                </thead>
                <tbody>
                    @foreach($tot as $t)
                    <tr class="text-center">
                        <td>{{$t->item_qty_issued}}</td>
                        <td>{{$t->item_unit}}</td>
                        <td>{{$t->item_name}}</td>
                        <td>₱ {{$t->item_price}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
    
            <div class="col-12">
                <div class="row">
                    <div class="col-6 lcs font-weight-bold right">
                        <div class="row">
                            <div class="col-3 lcs all">Received by:</div>
                            <div class="col-6 lcs all"></div>
                            <div class="col-3"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all dheight"></div>
                            <div class="col-6 lcs top left right"></div>
                            <div class="col-3"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all"></div>
                            <div class="col-6 lcs all text-center">Signature Over Printed Name</div>
                            <div class="col-3"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all dheight"></div>
                            <div class="col-6 lcs top left right"></div>
                            <div class="col-3"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all"></div>
                            <div class="col-6 lcs all text-center">Position</div>
                            <div class="col-3"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all dheight"></div>
                            <div class="col-6 lcs top left right mt-4"></div>
                            <div class="col-3"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all"></div>
                            <div class="col-6 lcs all text-center">Date</div>
                            <div class="col-3"></div>
                            <div class="w-100"></div>

                        </div>
                    </div>
                    <div class="col-6 lcs font-weight-bold right">
                        <div class="row">
                            <div class="col-3 lcs all">Received from:</div>
                            <div class="col-6 lcs all"></div>
                            <div class="col-3 lcs top bottom left"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all dheight"></div>
                            <div class="col-6 lcs top left right mt-4"></div>
                            <div class="col-3 lcs top bottom left"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all"></div>
                            <div class="col-6 lcs all text-center">Signature Over Printed Name</div>
                            <div class="col-3 lcs top bottom left"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all dheight"></div>
                            <div class="col-6 lcs top left right"></div>
                            <div class="col-3 lcs top bottom left"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all"></div>
                            <div class="col-6 lcs all text-center">Position</div>
                            <div class="col-3 lcs top bottom left"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all dheight"></div>
                            <div class="col-6 lcs top left right mt-4"><center> {{\Carbon\Carbon::now()->format('F d,Y')}} </center></div>
                            <div class="col-3 lcs top bottom left"></div>
                            <div class="w-100"></div>

                            <div class="col-3 lcs all"></div>
                            <div class="col-6 lcs all text-center">Date</div>
                            <div class="col-3 lcs top bottom left"></div>
                            <div class="w-100"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('style')
<style lang="scss">
    .landscape {

        margin-top: -5% !important;
        padding: 25mm;
        border: solid 1px black;
        overflow: hidden;
        page-break-after: always;
        background: white;
    }

    body {
        margin: 0;
        background: #CCCCCC;
    }

    @media print {

        .img-thumbnail {
            border: none;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 1% !important;
            width: 55% !important;
        }

        #pure-g {
            padding-right: none !important;
            padding-left: none !important;
            margin-right: none !important;
            margin-left: none !important;
        }

        .landscape {
            margin-top: auto !important;
            padding: 5mm !important;
            border: none !important;
        }

        .cheight {
            height: 265px !important;
        }

        @page {
            size: landscape
        }

        body {
            background: none;
        }

        #container {
            border: none !important;
        }

    }

    @font-face {
        font-family: 'Helvetica';
        src: url('https://fonts.googleapis.com/css?family=Helvetica');
        font-weight: normal;
        font-style: normal;
    }

    .container {
        border: none;
    }

    .img-thumbnail {
        border: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 5%;
        width: 40%;
    }

    .font {
        font-family: 'Helvetica', sans-serif;
    }

    .lcs {
        border-collapse: collapse;
        border: 1px solid black;
    }

    .top {
        border-top: none;
    }

    .bottom {
        border-bottom: none;
    }

    .left {
        border-left: none;
    }

    .right {
        border-right: none;
    }

    .all {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: none;
    }

    .aheight {
        height: 50px;
    }

    .dheight {
        height: 40px;
    }

    .bheight {
        height: 20px;
    }

    .cheight {
        height: 400px;
    }

</style>
@endsection
