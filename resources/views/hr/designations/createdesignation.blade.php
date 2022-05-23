@extends('cms.layouts.app')
<title>Add Designation</title>
@section('content')
    <div class="row justify-content-center">
        <div class="col col-sm-4">
            <a href="{{ route('designations.index') }}" class="btn btn-primary my-auto py-auto px-auto ml-1"><i
                    class="fa fa-list"></i>&nbsp;Manage
                Designations</a>
            @include('hr.designations.create')
            @include('cms.validations.formvalidation', ['id' => '0'])
        </div>
    </div>
@endsection
