@extends('layouts.app2')

@section('content')
    <div class="col-lg-12">
        <h1>User List</h1>
    </div>
    <hr>
    <div class="col-lg-12">
        <form method="POST" action="/edituser/save" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3 align="center">{{$employee->lastname}}, {{$employee->firstname}} {{$employee->middlename}}</h3>

            <div class="form-group row">
                <label for="ignore" class="col-md-4 col-form-label text-md-right">{{ __('EMPLOYEE ID') }}</label>

                <div class="col-md-6">
                    <input id="ignore" disabled type="text" class="form-control{{ $errors->has('ignore') ? ' is-invalid' : '' }}" name="ignore" value="{{$employee->employeeid}}">

                    @if ($errors->has('ignore'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ignore') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                    <div class="col-md-6">
                        <input id="employeeid" hidden type="text" class="form-control{{ $errors->has('employeeid') ? ' is-invalid' : '' }}" name="employeeid" value="{{$employee->employeeid}}">
    
                        @if ($errors->has('employeeid'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('employeeid') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

            <div class="form-group row">
                <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('ROLE ID') }}</label>

                <div class="col-md-6">
                    <input id="role_id" type="text" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" required>

                    @if ($errors->has('role_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('role_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <input type="submit" class="btn btn-primary" value="Save" name="submit">
                </div>
            </div>
        </form>
    </div>
    

@endsection
