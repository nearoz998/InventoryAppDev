@extends('cms.layouts.app')
<title>Edit Employee</title>
@section('content')
    <div class="row justify-content-center">
        <div class="col col-sm-7">
            <div class="d-flex btn-group">
                <a href="{{ route('employees.index') }}" class="btn btn-primary"><i class="fa fa-list"></i>&nbsp;Manage Employees</a>
                <a href="{{ route('employees.show', $employee) }}" class="btn btn-info ml-1"><i
                        class="fa fa-user"></i>&nbsp;{{ $employee->name }}</a>
            </div>
            @include('hr.employees.edit', ['employee'=>$employee])
            @include('cms.validations.formvalidation', ['id' => '0'])
        </div>
    </div>
@endsection
