@extends('cms.layouts.app')
<title>Add Employee</title>
@section('content')
    <div class="row justify-content-center">
        <div class="col col-sm-7">
            <a href="{{ route('employees.index') }}" class="btn btn-primary"><i
                class="fa fa-list"></i>&nbsp;Manage
            Employees</a>
            @include('hr.employees.create')
            @include('cms.validations.formvalidation', ['id' => '0'])
        </div>
    </div>
@endsection