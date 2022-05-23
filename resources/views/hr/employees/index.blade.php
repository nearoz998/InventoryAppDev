@extends('cms.layouts.app')
<title>{{ __('Employees') }}</title>
@section('content')
    <div class="page-wrapper">
        <div class="page-heading">
            <h1 class="page-title">Employees</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Manage Employees</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Employees</div>
                    <div class="d-flex mx-auto my-2 btn-group">
                        @include('cms.includes.popupModal', [
                        'title' => 'Add Employee',
                        'btnClass' => 'btn-success',
                        'icon' => 'fa fa-plus',
                        'btnTitle' => 'Add Employee',
                        'modalSize' => 'lg',
                        'id' => 'addemployee',
                        'view' => 'hr.employees.create',
                        ])
                        @include('cms.includes.popupModal', [
                        'title' => 'Import from CSV',
                        'btnClass' => 'btn-primary',
                        'icon' => 'fa fa-download',
                        'btnTitle' => 'Import CSV',
                        'id' => 'importFromCSV',
                        'import' => 'import-employees',
                        ])
                        <a href="export-employees" class="btn btn-primary my-auto py-auto px-auto ml-1"
                            onclick="return confirm('Click OK to export data as CSV file')"><i
                                class="fa fa-upload"></i>&nbsp;Export CSV</a>
                    </div>
                </div>
                <div class="ibox-body" style="overflow: auto">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="example-table"
                        cellspacing="0" width="10%">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Phone</th>
                                <th>Email</th>
                                {{-- <th>Rate Type</th>
                                <th>Rate/ Salary</th>
                                <th>Blood Group</th>
                                <th>Address Line 1</th>
                                <th>Address Line 2</th>
                                <th>Picture</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Zip Code</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sn = 1; ?>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->designation->designation }}</td>
                                    <td>
                                        @if ($employee->phone)
                                            <a href="callto:{{ $employee->phone }}"><i
                                                    class="fa fa-phone"></i></a>&nbsp;&nbsp;
                                        @endif{{ $employee->phone }}
                                    </td>
                                    <td>
                                        @if ($employee->email)
                                            <a href="mailto:{{ $employee->email }}"><i class="fa fa-envelope"></i></a>
                                        @endif&nbsp;&nbsp;{{ $employee->email }}
                                    </td>
                                    {{-- <td>{{ $employee->rate_type }}</td>
                                    <td>{{ $employee->rate }}</td>
                                    <td>{{ $employee->blood_group }}</td>
                                    <td>{{ $employee->address1 }}</td>
                                    <td>{{ $employee->address2 }}</td>
                                    <td>
                                        @if ($employee->picture)
                                            <img src="/storage/employee-pictures/{{ $employee->picture }}" alt=""
                                                style="width: 70px; height:70px">
                                    </td>
                            @endif
                            <td>{{ $employee->country }}</td>
                            <td>{{ $employee->city }}</td>
                            <td>{{ $employee->zip_code }}</td> --}}
                                    <td>
                                        <div class="d-flex ml-1">
                                            <a href="{{ route('employees.show', $employee) }}"
                                                class="fa fa-info btn btn-info btn-xs my-auto py-auto px-auto"></a>
                                            <div>
                                                @include('cms.includes.popupModal', [
                                                'title' => 'Edit Employee',
                                                'btnClass' => 'btn-default fa fa-pencil btn-xs',
                                                'btnTitle' => '',
                                                'modalSize' => 'lg',
                                                'id' => $employee->id,
                                                'view' => 'hr.employees.edit',
                                                ])
                                            </div>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
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
