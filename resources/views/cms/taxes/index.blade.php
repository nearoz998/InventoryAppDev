@extends('cms.layouts.app')
<title>{{ __('Taxes') }}</title>
@section('content')
    <div class="page-wrapper">
        <div class="page-heading">
            <h1 class="page-title">Taxes</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Taxes</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Taxes</div>
                    <div class="d-flex mx-auto my-2 btn-group">
                        @include('cms.includes.popupModal', [
                        'title' => 'Add tax',
                        'btnClass' => 'btn-success',
                        'btnTitle' => 'Add tax',
                        'icon' => 'fa fa-plus',
                        'id' => 'addtax',
                        'view' => 'cms.taxes.create',
                        ])
                        @include('cms.includes.popupModal', [
                        'title' => 'Import from CSV',
                        'btnClass' => 'btn-primary',
                        'btnTitle' => 'Import CSV',
                        'icon' => 'fa fa-download',
                        'id' => 'importFromCSV',
                        'import' => 'import-taxes',
                        ])
                        <a href="export-taxes"
                            class="btn btn-primary my-auto py-auto px-auto ml-1"
                            onclick="return confirm('Click OK to export data as CSV file')"><i class="fa fa-upload"></i>&nbsp;Export CSV</a>
                    </div>
                </div>
                <div class="ibox-body" style="overflow: auto">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="example-table"
                        cellspacing="0" width="10%">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>tax</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sn = 1; ?>
                            @foreach ($taxes as $tax)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $tax->tax }}</td>
                                    <td>
                                        @if ($tax->status == 1)
                                            <div class="btn btn-xs bg-success" style="border-radius: 500px">Active</div>
                                        @else
                                            <div class="btn btn-xs bg-warning" style="border-radius: 500px">Disabled</div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex ml-1">
                                            <div>
                                                @include('cms.includes.popupModal', [
                                                'title' => 'Edit Tax',
                                                'btnClass' => 'btn-default fa fa-pencil btn-xs',
                                                'btnTitle' => '',
                                                'id' => $tax->id,
                                                'view' => 'cms.taxes.edit',
                                                ])
                                            </div>
                                            <form action="{{ route('taxes.destroy', $tax->id) }}" method="POST"
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
