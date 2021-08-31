@extends('layouts.app3')
@section('title', 'RIS FORM')
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
                            <div class="all text-center"><h2>REQUISITION AND ISSUE SLIP</h2></div>
                            <div class="text-center font-weight-bold">
                                LINEN ROOM UNIT
                            </div>
                        </div>
                        <div class="row">
                            <div class="col no-gutters">
                                <div class="col ris top bottom right"> Form No.: HS-GSS-011</div>
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
                <div class="col-8 ris right text-center font-weight-bold">REQUISITION
                    <div class="row">
                        <div class="col-9 ris right left bottom text-center font-weight-bold">ITEM/S</div>
                        <div class="col-3 ris bottom right text-center font-weight-bold">QUANTITY</div>
                    </div>
                </div>
                <div class="col-2 ris right text-center font-weight-bold align">ISSUED</div>
                <div class="col-2 ris text-center font-weight-bold align">RETURNED</div>
            </div>
            <div class="row">
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>
                
    
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-4 ris font-weight-bold top right">
                    <div class="row">
                        <div class="col-5 ris all">Requested by:</div>
                        <div class="col-3 ris all"></div>
                        <div class="col-4"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all dheight"></div>
                        <div class="col-10 ris top left right"></div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all"></div>
                        <div class="col-10 ris all text-center">Signature Over Printed Name</div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>
                    </div>
                </div>
                <div class="col-4 ris font-weight-bold top right">
                    <div class="row">
                        <div class="col-5 ris all">Aprroved by:</div>
                        <div class="col-3 ris all"></div>
                        <div class="col-4"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all dheight"></div>
                        <div class="col-10 ris top left right"></div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all"></div>
                        <div class="col-10 ris all text-center">Signature Over Printed Name</div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>
                    </div>
                </div>
                <div class="col-4 ris font-weight-bold top">
                    <div class="row">
                        <div class="col-5 ris all">Issued by:</div>
                        <div class="col-3 ris all"></div>
                        <div class="col-4"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all dheight"></div>
                        <div class="col-10 ris top left right"></div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all"></div>
                        <div class="col-10 ris all text-center">Signature Over Printed Name</div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100"></div><br><br><br>
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
                            <div class="all text-center"><h2>REQUISITION AND ISSUE SLIP</h2></div>
                            <div class="text-center font-weight-bold">
                                LINEN ROOM UNIT
                            </div>
                        </div>
                        <div class="row">
                            <div class="col no-gutters">
                                <div class="col ris top bottom right"> Form No.: HS-GSS-011</div>
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
                <div class="col-8 ris right text-center font-weight-bold">REQUISITION
                    <div class="row">
                        <div class="col-9 ris right left bottom text-center font-weight-bold">ITEM/S</div>
                        <div class="col-3 ris bottom right text-center font-weight-bold">QUANTITY</div>
                    </div>
                </div>
                <div class="col-2 ris right text-center font-weight-bold align">ISSUED</div>
                <div class="col-2 ris text-center font-weight-bold align">RETURNED</div>
            </div>
            <div class="row">
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>

                <div class="w-100"></div>
                <div class="col-6 ris top default"></div>
                <div class="col-2 ris top left"></div>
                <div class="col-2 ris top left right"></div>
                <div class="col-2 ris top"></div>
                
    
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-4 ris font-weight-bold top right">
                    <div class="row">
                        <div class="col-5 ris all">Requested by:</div>
                        <div class="col-3 ris all"></div>
                        <div class="col-4"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all dheight"></div>
                        <div class="col-10 ris top left right"></div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all"></div>
                        <div class="col-10 ris all text-center">Signature Over Printed Name</div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>
                    </div>
                </div>
                <div class="col-4 ris font-weight-bold top right">
                    <div class="row">
                        <div class="col-5 ris all">Aprroved by:</div>
                        <div class="col-3 ris all"></div>
                        <div class="col-4"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all dheight"></div>
                        <div class="col-10 ris top left right"></div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all"></div>
                        <div class="col-10 ris all text-center">Signature Over Printed Name</div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>
                    </div>
                </div>
                <div class="col-4 ris font-weight-bold top">
                    <div class="row">
                        <div class="col-5 ris all">Issued by:</div>
                        <div class="col-3 ris all"></div>
                        <div class="col-4"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all dheight"></div>
                        <div class="col-10 ris top left right"></div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>

                        <div class="col-1 ris all"></div>
                        <div class="col-10 ris all text-center">Signature Over Printed Name</div>
                        <div class="col-1"></div>
                        <div class="w-100"></div>
                    </div>
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
        height: 10px;
    }

    .cheight {
        height: 400px;
    }

</style>
@endsection
