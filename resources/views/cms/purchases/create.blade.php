@extends('cms.layouts.app')
<title>
    Add Purchase</title>
@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Add Purchase</div>
            <div class="d-flex mx-auto my-2 btn-group">
                @include('cms.includes.popupModal', [
                'title' => 'Add Supplier',
                'btnClass' => 'btn-success',
                'icon' => 'fa fa-plus',
                'btnTitle' => 'Add Supplier',
                'id' => 'addsupplier',
                'view' => 'cms.suppliers.create',
                ])
                <a href="{{ route('purchases.index') }}"
                    class="btn btn-warning my-auto py-auto px-auto ml-1"><i class="fa fa-list"></i>&nbsp;Manage
                    purchases</a>
                @include('cms.includes.popupModal', [
                'title' => 'Import from CSV',
                'btnClass' => 'btn-primary',
                'icon' => 'fa fa-download',
                'btnTitle' => 'Import CSV',
                'id' => 'importFromCSV',
                'import' => 'import-purchases',
                ])
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="purchaseform-0" action="{{ route('purchases.store') }}" method="POST"
                enctype="multipart/form-data" autocomplete="off" novalidate="novalidate">
                @csrf
                @method('post')
                <?php $i = 0;
                $counter = 1; ?>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label form-separate font-bold">Supplier<span
                                    class="my-auto" style="color: red">&nbsp;&ast;</span></label>
                            <div class="col col-sm-7">
                                <select name="supplier" id="purchase_supplier-0" class="form-control select2_demo_2">
                                    <option value="" selected disabled></option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label font-bold">Invoice No.<span class="my-auto"
                                    style="color: red">&nbsp;&ast;</span></label>
                            <div class="col col-sm-7">
                                <input class="form-control" type="number" id="purchase_invoice_no-0" name="invoice_no"
                                    placeholder="Invoice No." value="{{ $invoice_count }}">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col col-sm-2 col-form-label font-bold">Date<span class="my-auto"
                                    style="color: red">&nbsp;&ast;</span></label>
                            <div class="col col-sm-7">
                                <input class="form-control" type="date" id="purchase_date-0" name="date"
                                    placeholder="Date" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-2 col-form-label font-bold">Details</label>
                            <div class="col col-sm-7">
                                <textarea class="form-control" type="text" id="purchase_details-0" name="details"
                                    placeholder="details"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col col-sm-2 col-form-label font-bold">Payment Type<span class="my-auto"
                            style="color: red">&nbsp;&ast;</span></label>
                    <div class="col col-sm-3">
                        <select name="payment_type" id="purchase_payment_type-0" class="form-control select2_demo_2">
                            <option value="" selected disabled></option>
                            <option value="cash">Cash Payment</option>
                            <option value="bank">Bank Payment</option>
                            <option value="due">Due Payment</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Product<span class="my-auto"
                                        style="color: red">&nbsp;&ast;</span></th>
                                <th class="text-center">Stock/Qty</th>
                                <th class="text-center">Quantity<span class="my-auto"
                                        style="color: red">&nbsp;&ast;</span></th>
                                <th class="text-center">Purchase Price</th>
                                <th class="text-center">Sub Total</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="dynamic-field">
                            <tr id="rowpurchase_{{ $i }}-0">
                                <td>
                                    <select name="product[]" id="purchase_product{{ $i }}-0"
                                        class="form-control purchase_product">
                                        <option value="" selected disabled>Select product</option>
                                        @foreach ($products as $product)
                                            <option
                                                value="{{ $product->id }}.+.{{ $product->name }}.+.{{ $product->quantity }}.+.{{ $product->price }}">
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="stock[]" readonly id="purchase_stock{{ $i }}-0"
                                        class="form-control purchase_stock">
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" min="0.01" step=".01"
                                        id="purchase_quantity{{ $i }}-0" class="form-control purchase_quantity">
                                </td>
                                <td>
                                    <input type="number" name="price[]" min="0.01" step=".01" readonly
                                        id="purchase_price{{ $i }}-0" class="form-control purchase_price">
                                </td>
                                <td>
                                    <input type="number" name="sub_total[]" readonly
                                        id="purchase_sub_total{{ $i }}-0"
                                        class="form-control purchase_sub_total">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger purchase_remove_added_item"
                                        id="purchase_{{ $i }}-0">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <button type="button" name="add_more_item" class="btn btn-info"
                                        id="purchase_add_more_item">Select More Prodcuts</button>
                                </td>
                                <td colspan="3">
                                    <div class="font-bold text-right">Total Amount:</div>
                                </td>
                                <td>
                                    <input type="number" name="total_amount" readonly id="purchase_total_amount-0"
                                        class="form-control purchase_total_amount">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info purchase_calculate">Calculate</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <button type="submit" name="submit" id="" class="btn btn-primary ml-auto mr-4" value="Submit"
                        style="">Submit</button>&nbsp;
                </div>
            </form>
        </div>
    </div>
    {{-- let purchaseIdToEdit = "<?php echo "$purchase->id"; ?>"; --}}

    <script type="text/javascript">
        $(document).ready(function() {
            let i = "<?php echo "$i"; ?>";
            let counter = "<?php echo "$counter"; ?>";
            $('#purchase_add_more_item').click(function() {
                i++;
                counter++;
                $('#dynamic-field').append(
                    '<tr id="rowpurchase_' + i +
                    '-0" class="dynamic-added"><td><select name="product[]" id="purchase_product' + i +
                    '-0" class="form-control select2_demo_2 purchase_product"><option value="" selected disabled null>Select product</option>@foreach ($products as $product)<option value="{{ $product->id }}.+.{{ $product->name }}.+.{{ $product->quantity }}.+.{{ $product->price }}">{{ $product->name }}</option>@endforeach </select></td > ' +
                    '<td><input type="number" readonly id="purchase_stock' +
                    i +
                    '-0" class="form-control purchase_stock"></td>' +
                    '<td><input type="number" name="quantity[]" min="0.01" step=".01" id="purchase_quantity' +
                    i +
                    '-0" class="form-control purchase_quantity"></td>' +
                    '<td><input type="number" name="price[]" min="0.01" step=".01" readonly id="purchase_price' +
                    i +
                    '-0" class="form-control purchase_price"></td>' +
                    '<td><input type="number" name="sub_total[]" readonly id="purchase_sub_total' +
                    i +
                    '-0" class="form-control purchase_sub_total"></td>' +
                    '<td><button type="button" class="btn btn-danger purchase_remove_added_item" id="purchase_' +
                    i +
                    '-0">Remove</button></td>'
                );
            });
            $(document).on('click', '.purchase_remove_added_item', function() {
                let button_id = $(this).attr("id");
                if (parseInt(counter) !== 1) {
                    $('#row' + button_id).remove();
                    counter--;
                } else {
                    alert('Cannot remove any more rows, at least one is recommended.');
                }
                calculations_inside_purchase(i, 0);
            });
            $(document).on('change', '.purchase_product', function() {
                calculations_inside_purchase(i, 0);
            });
            $(document).on('change', '.purchase_quantity', function() {
                calculations_inside_purchase(i, 0);
            });
            $(document).on('click', '.purchase_calculate', function() {
                calculations_inside_purchase(i, 0);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function calculations_inside_purchase(i, purchaseIdToEdit) {
            let total_amount = 0;
            total_amount = document.getElementById('purchase_total_amount-' + purchaseIdToEdit);
            total_amount.value = 0;
            for (j = 0; j <= i; j++) {
                if (document.getElementById('purchase_product' + j + '-' + purchaseIdToEdit)) {
                    let product = stock = quantity = price = sub_total = 0;
                    product = document.getElementById('purchase_product' + j + '-' + purchaseIdToEdit).value;
                    let productData = product.split('.+.');
                    stock = document.getElementById('purchase_stock' + j + '-' + purchaseIdToEdit);
                    quantity = document.getElementById('purchase_quantity' + j + '-' + purchaseIdToEdit);
                    price = document.getElementById('purchase_price' + j + '-' + purchaseIdToEdit);
                    sub_total = document.getElementById('purchase_sub_total' + j + '-' + purchaseIdToEdit);
                    stock.value = parseFloat(productData[2]);
                    price.value = parseFloat(productData[3]);
                    sub_total.value = parseFloat(quantity.value) * parseFloat(price.value);
                    total_amount.value = parseFloat(total_amount.value) + parseFloat(sub_total.value);
                }
            }
        }
    </script>
    @include('cms.validations.formvalidation', ['id' => '0'])
@endsection
