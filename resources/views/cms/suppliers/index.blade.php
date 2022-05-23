@extends('cms.layouts.app')
<title>Suppliers</title>
@section('content')
    <div class="page-wrapper">
        <div class="page-heading">
            <h1 class="page-title">Suppliers</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Manage Suppliers</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Suppliers</div>
                    <div class="d-flex mx-auto my-2 btn-group">
                        @include('cms.includes.popupModal', [
                        'title' => 'Add Supplier',
                        'btnClass' => 'btn-success',
                        'icon' => 'fa fa-plus',
                        'btnTitle' => 'Add Supplier',
                        'id' => 'addsupplier',
                        'view' => 'cms.suppliers.create',
                        ])
                        @include('cms.includes.popupModal', [
                        'title' => 'Import from CSV',
                        'btnClass' => 'btn-primary',
                        'icon' => 'fa fa-download',
                        'btnTitle' => 'Import CSV',
                        'id' => 'importFromCSV',
                        'import' => 'import-suppliers',
                        ])
                        <a href="export-suppliers" class="btn btn-primary my-auto py-auto px-auto ml-1"
                            onclick="return confirm('Click OK to export data as CSV file')"><i
                                class="fa fa-upload"></i>&nbsp;Export CSV</a>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-body" style="overflow: auto">
                        <table class="table table-striped table-bordered table-hover table-responsive" cellspacing="0"
                            id="example-table">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Balance</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 1; ?>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->mobile }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>{{ $supplier->balance }}</td>
                                        <td>{{ $supplier->details }}</td>
                                        <td>
                                            <div class="d-flex ml-1">
                                                <div>
                                                    @include('cms.includes.popupModal', [
                                                    'title' => 'Edit Supplier',
                                                    'btnClass' => 'btn-default fa fa-pencil btn-xs',
                                                    'btnTitle' => '',
                                                    'id' => $supplier->id,
                                                    'view' => 'cms.suppliers.edit',
                                                    ])
                                                </div>
                                                <form action="{{ route('suppliers.destroy', $supplier->id) }}"
                                                    method="POST" class="mb-0">
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
                        </table>
                    </div>
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
