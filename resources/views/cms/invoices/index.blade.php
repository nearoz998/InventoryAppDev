@extends('cms.layouts.app')
<title>Purchases</title>
@section('content')
    <div class="page-wrapper">
        <div class="page-heading">
            <h1 class="page-title">Purchases</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Manage Purchases</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Purchases</div>
                        <div class="d-flex mx-auto my-2 btn-group">
                            <a href="{{ route('purchases.create') }}"
                                class="btn btn-success my-auto py-auto px-auto ml-1"><i class="fa fa-plus"></i>&nbsp;Add
                                purchase</a>
                            @include('cms.includes.popupModal', [
                            'title' => 'Import from CSV',
                            'btnClass' => 'btn-primary',
                            'btnTitle' => 'Import CSV',
                            'icon' => 'fa fa-download',
                            'id' => 'importFromCSV',
                            'import' => 'import-purchases',
                            ])
                            <a href="export-purchases"
                                class="btn btn-primary my-auto py-auto px-auto ml-1"
                                onclick="return confirm('Click OK to export data as CSV file')"><i class="fa fa-upload"></i>&nbsp;Export CSV</a>
                        </div>
                </div>
                <div class="ibox">
                    <div class="ibox-body" style="overflow:auto">
                        <table class="table table-striped table-bordered table-hover table-responsive" id="example-table">
                            <thead>
                                <tr>
                                    <th class="text-center">S.N</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Invoice No.</th>
                                    <th class="text-center">Supplier</th>
                                    <th class="text-center">Payment Type</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Sub Total</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['purchases'] as $key => $data)
                                    <tr aria-rowspan="3">
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td style="width: 85px" class="text-center">{{ $data->date }}</td>
                                        <td>{{ $data->invoice_no }}</td>
                                        <td>{{ $data->supplier->name }}</td>
                                        <td>{{ $data->payment_type }}</td>
                                        <td>
                                            @php
                                                $product_ids = json_decode($data->product_id);
                                                $counter_val = count($product_ids);
                                                $counter = $counter_val;
                                            @endphp
                                            @foreach ($product_ids as $product)
                                                {{ productFromId($product) }}
                                                @php
                                                    $counter--;
                                                @endphp
                                                @if ($counter !== 0)
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $purchase_quantities = json_decode($data->quantity);
                                                $counter = $counter_val;
                                            @endphp
                                            @foreach ($purchase_quantities as $quantity)
                                                {{ $quantity }}
                                                @php
                                                    $counter--;
                                                @endphp
                                                @if ($counter !== 0)
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $purchase_prices = json_decode($data->price);
                                                $counter = $counter_val;
                                            @endphp
                                            @foreach ($purchase_prices as $price)
                                                {{ $price }}
                                                @php
                                                    $counter--;
                                                @endphp
                                                @if ($counter !== 0)
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $purchase_sub_totals = json_decode($data->sub_total);
                                                $counter = $counter_val;
                                            @endphp
                                            @foreach ($purchase_sub_totals as $sub_total)
                                                {{ $sub_total }}
                                                @php
                                                    $counter--;
                                                @endphp
                                                @if ($counter !== 0)
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-center">{{ $data->total }}</td>
                                        <td>
                                            <div class="d-flex ml-1">
                                                <a href="{{ route('purchases.edit', $data->id) }}"
                                                    class="btn btn-xs fa fa-pencil btn-default"
                                                    data-toggle="tooltip" data-original-title="Edit"></a>
                                                <form action="{{ route('purchases.destroy', $data->id) }}" method="POST"
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
