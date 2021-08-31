@extends('layouts.app2')
@section('title', 'Raw Material')

@section('content')
<script src="{{ asset('js/linenaddraw.js') }}"></script>
<div class="col-lg-12 shadow mb-3 form-inline" style="border-radius: 25px">
    <img src="../img/bed-linen.png" alt="" height="50" width="50">
    <h1 class="h3 ml-2 mt-2">Add Raw Materials</h1>
</div>
<hr>
<div class="col-lg-12">
    <form method="POST" action="/add/raw/save" enctype="multipart/form-data">
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
            <thead>
                <tr>
                    <td align="center">
                        Material Name
                    </td>
                    <td align="center">
                        Material Unit
                    </td>
                    <td align="center">
                        Material Qty
                    </td>
                    <td align="center">
                        Material Price
                    </td>
                    <td align="center" colspan="2">
                        Date Received
                    </td>
                </tr>
            </thead>
            <tbody class="addrawmatsbody">
                <tr>

                    <td>
                        <div>
                            <input id="item_name[0]" type="text" name="item_name[0]" class="form-control">
                        </div>
                    </td>

                    <td>
                        <div>
                            <input id="item_unit[0]" type="text" name="item_unit[0]" class="form-control">
                        </div>
                    </td>

                    <td>
                        <div>
                            <input id="item_qty[0]" type="number" name="item_qty[0]" class="form-control">
                        </div>
                    </td>

                    <td>
                        <div>
                            <input id="item_price[0]" type="number" name="item_price[0]" class="form-control">
                        </div>
                    </td>

                    <td>
                        <div>
                            <input id="date_received[0]" type="date" name="date_received[0]" class="form-control">
                        </div>
                    </td>

                    <td>
                    </td>

                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <input type="button" id="add" class="add btn btn-success btn-sm pull-right" onclick="addfield()"
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
@endsection