@extends('cms.layouts.app')
<title>Products</title>
@section('content')
    <div class="page-wrapper">
        <div class="page-heading">
            <h1 class="page-title">Products</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Manage Products</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Products</div>
                    <div class="d-flex mx-auto btn-group my-2">
                        @include('cms.includes.popupModal', [
                        'title' => 'Add Supplier',
                        'btnClass' => 'btn-success',
                        'icon' => 'fa fa-plus',
                        'btnTitle' => 'Add Supplier',
                        'id' => 'addsupplier',
                        'view' => 'cms.suppliers.create',
                        ])
                        <a href="{{ route('products.create') }}" class="btn btn-success my-auto py-auto px-auto ml-1"><i
                                class="fa fa-plus"></i>&nbsp;Add
                            Product</a>
                        @include('cms.includes.popupModal', [
                        'title' => 'Import from CSV',
                        'btnClass' => 'btn-primary',
                        'icon' => 'fa fa-download',
                        'btnTitle' => 'Import CSV',
                        'id' => 'importFromCSV',
                        'import' => 'import-products',
                        ])
                        <a href="export-products" class="btn btn-primary my-auto py-auto px-auto ml-1"
                            onclick="return confirm('Click OK to export data as CSV file')"><i
                                class="fa fa-upload"></i>&nbsp;Export CSV</a>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-body" style="overflow:auto">
                        <table class="table table-striped table-bordered table-hover table-responsive" id="example-table"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">S.N</th>
                                    <th>Product Name</th>
                                    <th>Weight</th>
                                    <th>Size</th>
                                    <th>Unit</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Purchase Price</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($data['product']->count() > 0) --}}
                                @foreach ($data['product'] as $key => $data)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->weight }}</td>
                                        <td>{{ $data->size }}</td>
                                        <td>{{ $data->ProductUnit->unit }}</td>
                                        <td>{{ $data->ProductCategory->category }}</td>
                                        <td>{{ $data->quantity }}</td>
                                        <td>{{ $data->price }}</td>
                                        <td>
                                            @if ($data->images->count() > 0)
                                                <img src="{{ asset('/uploads/product_images/' . $data->images[0]->images) }}"
                                                    style="max-width: 80px" alt="{{ $data->name }}"
                                                    class="img img-thumbnail img-fluid">
                                        </td>
                                    @else
                                        <small>No Image Uploaded</small>
                                @endif
                                <td>
                                    <div class="d-flex ml-1">
                                        <a href="{{ route('products.edit', $data->id) }}"
                                            class="btn btn-xs fa fa-pencil btn-default" data-toggle="tooltip"
                                            data-original-title="Edit"></a>
                                        <form action="{{ route('products.destroy', $data->id) }}" method="POST"
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
                                {{-- @endif --}}
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
