@extends('cms.layouts.app')
<title>{{ __('Customers') }}</title>
@section('content')
    <div class="page-wrapper">
        <div class="page-heading">
            <h1 class="page-title">{{ $title }}</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Manage {{ $title }}</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">{{ $title }}</div>
                    {{-- <div class="row"> --}}
                        <div class="d-flex mx-auto my-2 btn-group">
                            @if ($title !== 'Credit Customers')
                            <a href="{{ route('customers.creditcustomers') }}"
                                    class="btn btn-primary my-auto py-auto"><i class="fa fa-list"></i>&nbsp;Credit
                                    Customers</a>
                                
                            @endif
                            @if ($title !== 'Paid Customers')
                                <a href="{{ route('customers.paidcustomers') }}"
                                    class="btn btn-primary my-auto py-auto px-auto ml-1"><i class="fa fa-list"></i>&nbsp;Paid
                                    Customers</a>
                            @endif
                            @include('cms.includes.popupModal', [
                            'title' => 'Add Customer',
                            'btnClass' => 'btn-success',
                            'icon' => 'fa fa-plus',
                            'btnTitle' => 'Add Customer',
                            'id' => 'addcustomer',
                            'view' => 'cms.customers.create',
                            ])
                            @if ($title == 'Customers')
                                @include('cms.includes.popupModal', [
                                'title' => 'Import from CSV',
                                'btnClass' => 'btn-primary',
                                'icon' => 'fa fa-download',
                                'btnTitle' => 'Import CSV',
                                'id' => 'importFromCSV',
                                'import' => 'import-customers',
                                ])
                                <a href="export-customers"
                                    class="btn btn-primary my-auto py-auto px-auto ml-1"
                                    onclick="return confirm('Click OK to export data as CSV file')"><i class="fa fa-upload"></i>&nbsp;Export CSV</a>
                            @else
                                <a href="{{ route('customers.index') }}"
                                    class="btn btn-warning my-auto py-auto px-auto ml-1"><i class="fa fa-list"></i>&nbsp;Manage
                                    Customers</a>
                                @if ($title == 'Credit Customers')
                                    <a href="export-creditcustomers"
                                        class="btn btn-primary my-auto py-auto px-auto ml-1"
                                        onclick="return confirm('Click OK to export data as CSV file')"><i class="fa fa-upload"></i>&nbsp;Export CSV</a>
                                @elseif ($title == 'Paid Customers')
                                    <a href="export-paidcustomers"
                                        class="btn btn-primary my-auto py-auto px-auto ml-1"
                                        onclick="return confirm('Click OK to export data as CSV file')"><i class="fa fa-upload"></i>&nbsp;Export CSV</a>
                                @endif
                            @endif
                        </div>
                    {{-- </div> --}}
                </div>
                <div class="ibox-body" style="overflow: auto">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="example-table"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sn = 1;
                            $balance = 0; ?>
                            @foreach ($customers as $customer)
                                @php
                                    $balance += $customer->balance;
                                @endphp
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->mobile }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->balance }}</td>
                                    <td>
                                        <div class="d-flex ml-1">
                                            <div>
                                                @include('cms.includes.popupModal', [
                                                'title' => 'Edit Customer',
                                                'btnClass' => 'btn-default fa fa-pencil btn-xs',
                                                'btnTitle' => '',
                                                'id' => $customer->id,
                                                'view' => 'cms.customers.edit',
                                                ])
                                            </div>
                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                                class="mb-0">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-default ml-1 btn-xs"
                                                    onclick="return confirm('Are you sure to delete this?\nThis can not be undone!!')"
                                                    data-toggle="tooltip" data-original-title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            @if ($title == 'Credit Customers')
                                <tr class="font-bold">
                                    <td colspan="4" class="text-right">
                                        Total:
                                    </td>
                                    <td colspan="2">
                                        {{ $balance }}
                                    </td>
                                </tr>
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/cms/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
@endsection
