@extends('layouts.app3')
@section('title', 'CONDEMN FORM')
@section('content')
<div class="container landscape" id="container">
    <button class="btn btn-primary d-print-none button ml-2 mb-2" onclick="print()">Print</button>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="ris col-3 right">
                    <img src="/bghmc.png" class="img-thumbnail">
                </div>
                <div class="ris col">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <div class="ris all text-center">Republic of the Philippines</div>
                            <div class="ris all text-center">Department of Health</div>
                            <div class="ris all text-center font-weight-bold">BAGUIO GENERAL HOSPITAL AND MEDICAL CENTER
                            </div>
                            <div class="ris all text-center">Baguio City</div>
                        </div>
                    </div>
                    <div class="row ris left right bottom">
                        <div class="col">
                            <div class="all text-center mt-1 font-weight-bold"><h6>GENERAL SERVICE SECTION - LINEN ROOM</h6></div>
                            <div class="text-center">
                                <h3>LIST OF LINEN FOR CONDEMN</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col no-gutters">
                                <div class="col ris top bottom right"> Form No.: HS-GSS-012</div>
                                <div class="col ris bottom right"> Revision No.: Ø</div>
                                <div class="col ris bottom right mr-2">Effectivity Date: August 1, 2014</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 bheigh"></div>
        <div class="col-12">
            <div class="row">
                <span class="text-justify" style="text-indent: 150px"><h5>This is to certify that the undersigned has received the following equipment/ instrument/ supplies from: <b>BAGUIO GENERAL HOSPITAL AND MEDICAL CENTER</b></h5></span>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-1 ris font-weight-bold text-center right">Quantity</div>
                <div class="col-5 ris font-weight-bold text-center right">Description</div>
                <div class="col-2 ris font-weight-bold text-center right">Unit</div>
                <div class="col-2 ris font-weight-bold text-center right">Unit Cost</div>
                <div class="col-2 ris font-weight-bold text-center">Total Cost</div>
            </div>
            @foreach($tot as $t)
            <div class="row">
                <div class="col-1 ris font-weight-bold text-center right top default">{{$t->item_qty_deducted}}</div>
                <div class="col-5 ris font-weight-bold text-center right top">{{$t->item_name}}</div>
                <div class="col-2 ris font-weight-bold text-center right top">{{$t->item_unit}}</div>
                <div class="col-2 ris font-weight-bold text-center right top">{{$t->item_price}}</div>
                <div class="col-2 ris font-weight-bold text-center top">{{$t->total_cost}}</div>
            @endforeach
                
                

                <div class="w-100"></div>
                <div class="col-1 ris all default"></div>
                <div class="col-5 ris all"></div>
                <div class="col-2 ris all"></div>
                <div class="col-2 ris all"></div>
                <div class="col-2 ris all"></div>

                <div class="w-100"></div>
                <div class="col-6 ris right bottom default">Condemned by:</div>
                <div class="col-6 ris left bottom">Received by:</div>

                <div class="w-100"></div>
                <div class="col-6 ris top bottom right default"></div>
                <div class="col-6 ris top bottom left"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top bottom right text-center">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10 ris top left right"><center>{{ $hpersonal->lastname }},
                            {{ $hpersonal->firstname }} {{ $hpersonal->middlename }} - <small>{{\Carbon\Carbon::now()->format('F d,Y')}}</small></center></div>
                        <div class="col-1"></div>

                        <div class="w-100"></div>
                        <div class="col-1"></div>
                        <div class="col-10 text-center">Signature over Printed Name</div>
                        <div class="col-1"></div>

                        <div class="w-100"></div>
                        <div class="col-4">Designation:</div>
                        <div class="col-7 ris top left right"></div>
                        <div class="col-1"></div>
                        
                        <div class="w-100"></div>
                        <div class="col-12 ris top left right small"></div>
                    </div>
                </div>
                <div class="col-6 ris top bottom left">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10 ris top left right"><center> Copa, Irma C. - <small>{{\Carbon\Carbon::now()->format('F d,Y')}}</small></center></div>
                        <div class="col-1"></div>

                        <div class="w-100"></div>
                        <div class="col-1"></div>
                        <div class="col-10 text-center">Signature over Printed Name</div>
                        <div class="col-1"></div>

                        <div class="w-100"></div>
                        <div class="col-4">Designation:</div>
                        <div class="col-7 ris top left right"></div>
                        <div class="col-1"></div>

                        <div class="w-100"></div>
                        <div class="col-12 ris top left right small"></div>
                    </div>
                </div>
                
            </div>
        </div>
</div>

@endsection

@section('style')
<style lang="scss">
    .default {
        height: 30px;
    }
    .small {
        height: 10px;
    }
    .align{
        display: flex; 
        justify-content: center;
        align-items: center;
    }
    body {
        margin: 0;
        background: #CCCCCC;
    }

    div.landscape {
        margin: 10px auto;
        padding: 5mm;
        border: solid 1px black;
        overflow: hidden;
        page-break-after: always;
        background: white;
    }

    #container {
        position: relative;
        min-height: 100vh;
    }
    @media print {
        /* @page {size: Legal landscape; } */

        .img-thumbnail {
        border: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 5% !important;
        width: 60%;
    }


        body {
            background: none;
        }

        div.landscape {
            margin: 0;
            padding: none;
            border: none;
            background: none;
            zoom: 1.2;
        }

        div.landscape {
            /* transform: rotate(270deg) translate(-276mm, 0); */
            transform-origin: 0 0;
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
        margin-top: 2%;
        width: 60%;
    }

    .font {
        font-family: 'Helvetica', sans-serif;
    }

    .ris {
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

    .bheigh {
        height: 20px;
    }

    .cheight {
        height: 400px;
    }

    .default {
        height: 30px;
    }

</style>
@endsection
