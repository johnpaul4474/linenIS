@extends('layouts.app2')
@section('title', 'Finish Product')

@section('content')
<script src="{{ asset('js/linenaddfinish.js') }}"></script>
<div class="container-fluid">
    <div class="col-lg-12 shadow mb-3 form-inline" style="border-radius: 25px">
        <img src="../img/blanket.png" alt="" height="50" width="50"><h1 class="h3 ml-2 mt-2"></i>Add Finish Product</h1>
    </div>
    <div class="col-lg-12">
        <form method="POST" action="/add/finish/save" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 form-inline">
                <label for="storage_id"
                    class="col-auto col-form-label font-weight-bold">{{ __('Select Storage') }}</label>

                <select id="storage_id" type="storage_id"
                    class="col-8 form-control{{ $errors->has('storage_id') ? ' is-invalid' : '' }}" name="storage_id">
                    @foreach ($rooms as $room)
                    <optgroup label="{{$room->room_name}}">
                        @foreach ($storages as $storage)
                        @if ($room->id == $storage->stockroom_id)
                        <option value="{{$storage->id}}">{{$storage->storage_name}}</option>
                        @endif
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
            </div>
            <hr>

            <table class="table table-bordered">
                <thead class="font-weight-bold text-center">
                    <tr>
                        <td>Material Used</td>
                        <td>Item Name</td>
                        <td>Unit</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td colspan="3">Date Created</td>
                    </tr>
                </thead>
                <tbody class="addfinishmatsbody" id="clone">
                    <tr id="clone2" nagan="c">
                        <td>
                            <div>
                                <input list="raw_mat" id="material_used" class="form-control" name="material_used" required>
                                <datalist id="raw_mat">
                                    @foreach ($Raw as $item)
                                    <option value="{{$item->item_name}}">
                                        @endforeach
                                </datalist>
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="item_name" type="text" name="item_name" class="form-control" required>
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="item_unit" type="text" name="item_unit" class="form-control" required>
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="item_qty" type="number" name="item_qty" class="form-control">
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="item_price" type="number" name="item_price" class="form-control">
                            </div>
                        </td>

                        <td>
                            <div>
                                <input id="date_created" type="date" name="date_created" class="form-control">
                            </div>
                        </td>
                        <td>
                           <button class="btn btn-danger" id="clonedel"><i class="fa fa-delete"></i>x</button> 
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            {{-- <button class="btn btn-success" id="clone">Add More</button> --}}
                            <input type="button" id="clonebtn" class="btn btn-success btn-sm pull-right"
                                value="Add More">
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="form-group row mb-0 float-right">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
