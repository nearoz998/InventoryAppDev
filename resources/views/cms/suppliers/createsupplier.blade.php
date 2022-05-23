@extends('cms.layouts.app')
<title>Add Supplier</title>
@section('content')
    <div class="row justify-content-center">
        <div class="col col-sm-6">
            <a href="{{ route('suppliers.index') }}" class="btn btn-primary my-auto py-auto px-auto ml-1"><i
                    class="fa fa-list"></i>&nbsp;Manage
                Suppliers</a>
            @include('cms.suppliers.create')
            @include('cms.validations.formvalidation', ['id' => '0'])
        </div>
    </div>
@endsection
