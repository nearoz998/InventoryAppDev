@extends('cms.layouts.app')
<title>{{ 'Profile: ' . $employee->name }}</title>
@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title d-flex mr-2 mx-auto btn-group">
                <a class="btn btn-default" href="{{ route('employees.index') }}"><i class="fa fa-list"></i>&nbsp;Manage
                    Employees</a>
                <a class="btn btn-default ml-1"
                    href="{{ route('employees.editemployee', ['employee' => $employee, 'viewtype' => 1]) }}"><i
                        class="fa fa-edit"></i>&nbsp;{{ $employee->name }}</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-end">
                <div class="card text-center justify-content-center bg-dark text-white" style="width: 6cm">
                    <img src="/storage/employee-pictures/{{ $employee->picture }}" alt="{{ $employee->name }}"
                        style="width:100%">
                    <br>
                    <h2>{{ $employee->name }}</h2>
                    <br>
                    <h5 style="color:slategrey">{{ $employee->designation->designation }}</h5>
                    <p>{{ 'company name' }}</p>
                </div>
            </div>
            <div class="col my-auto">
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>Phone:&nbsp;&nbsp;<a href="callto:{{ $employee->phone }}"><i class="fa fa-phone"></i></a>
                        </p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->phone }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>Email:&nbsp;&nbsp;<a href="mailto:{{ $employee->email }}"><i class="fa fa-envelope"></i></a>
                        </p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->email }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>Rate Type:</p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->rate_type }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>Rate:</p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->rate }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>Blood Group:</p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->blood_group }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>Address Line 1:</p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->address1 }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>Address Line 2:</p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->address2 }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>Country:</p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->country }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>City:</p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->city }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-3 my-auto">
                        <p>Zip Code:</p>
                    </div>
                    <div class="col my-auto">
                        <p>{{ $employee->zip_code }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
