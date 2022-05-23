@extends('cms.layouts.app')
<title>
    Add Invoice</title>
@section('content')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Add Invoice</div>
            <div class="d-flex mx-auto my-2 btn-group">
                @include('cms.includes.popupModal', [
                'title' => 'Add Customer',
                'btnClass' => 'btn-success',
                'icon' => 'fa fa-plus',
                'btnTitle' => 'Add Customer',
                'id' => 'addcustomer',
                'view' => 'cms.customers.create',
                ])
                <a href="{{ route('invoices.index') }}"
                    class="btn btn-warning my-auto py-auto px-auto ml-1"><i class="fa fa-list"></i>&nbsp;Manage
                    Invoices</a>
                @include('cms.includes.popupModal', [
                'title' => 'Import from CSV',
                'btnClass' => 'btn-primary',
                'icon' => 'fa fa-download',
                'btnTitle' => 'Import CSV',
                'id' => 'importFromCSV',
                'import' => 'import-invoices',
                ])
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="invoiceform-0" action="{{ route('invoices.store') }}" method="POST"
                enctype="multipart/form-data" autocomplete="off" novalidate="novalidate">
                @csrf
                @method('post')
                <?php $i = 0;
                $counter = 1; ?>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label form-separate font-bold">Customer<span
                                    class="my-auto" style="color: red">&nbsp;&ast;</span></label>
                            <div class="col col-sm-7">
                                <select name="customer" id="invoice_customer-0" class="form-control select2_demo_2">
                                    <option value="" selected disabled></option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-3 col-form-label font-bold">Invoice No.<span class="my-auto"
                                    style="color: red">&nbsp;&ast;</span></label>
                            <div class="col col-sm-7">
                                <input class="form-control" type="number" id="invoice_invoice_no-0" name="invoice_no"
                                    placeholder="Invoice No." value="{{ $invoice_count }}">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label class="col col-sm-2 col-form-label font-bold">Date<span class="my-auto"
                                    style="color: red">&nbsp;&ast;</span></label>
                            <div class="col col-sm-7">
                                <input class="form-control" type="date" id="invoice_date-0" name="date"
                                    placeholder="Date" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col col-sm-2 col-form-label font-bold">Details</label>
                            <div class="col col-sm-7">
                                <textarea class="form-control" type="text" id="invoice_details-0" name="details"
                                    placeholder="details"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col col-sm-2 col-form-label font-bold">Payment Type<span class="my-auto"
                            style="color: red">&nbsp;&ast;</span></label>
                    <div class="col col-sm-3">
                        <select name="payment_type" id="invoice_payment_type-0" class="form-control select2_demo_2">
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
                                <th class="text-center">invoice Price</th>
                                <th class="text-center">Sub Total</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="dynamic-field">
                            <tr id="rowinvoice_{{ $i }}-0">
                                <td>
                                    <select name="product[]" id="invoice_product{{ $i }}-0"
                                        class="form-control invoice_product">
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
                                    <input type="number" name="stock[]" readonly id="invoice_stock{{ $i }}-0"
                                        class="form-control invoice_stock">
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" min="0.01" step=".01"
                                        id="invoice_quantity{{ $i }}-0" class="form-control invoice_quantity">
                                </td>
                                <td>
                                    <input type="number" name="price[]" min="0.01" step=".01" readonly
                                        id="invoice_price{{ $i }}-0" class="form-control invoice_price">
                                </td>
                                <td>
                                    <input type="number" name="sub_total[]" readonly
                                        id="invoice_sub_total{{ $i }}-0"
                                        class="form-control invoice_sub_total">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger invoice_remove_added_item"
                                        id="invoice_{{ $i }}-0">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <button type="button" name="add_more_item" class="btn btn-info"
                                        id="invoice_add_more_item">Select More Prodcuts</button>
                                </td>
                                <td colspan="3">
                                    <div class="font-bold text-right">Total Amount:</div>
                                </td>
                                <td>
                                    <input type="number" name="total_amount" readonly id="invoice_total_amount-0"
                                        class="form-control invoice_total_amount">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info invoice_calculate">Calculate</button>
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
    {{-- let invoiceIdToEdit = "<?php echo "$invoice->id"; ?>"; --}}

    <script type="text/javascript">
        $(document).ready(function() {
            let i = "<?php echo "$i"; ?>";
            let counter = "<?php echo "$counter"; ?>";
            $('#invoice_add_more_item').click(function() {
                i++;
                counter++;
                $('#dynamic-field').append(
                    '<tr id="rowinvoice_' + i +
                    '-0" class="dynamic-added"><td><select name="product[]" id="invoice_product' + i +
                    '-0" class="form-control select2_demo_2 invoice_product"><option value="" selected disabled null>Select product</option>
                    @foreach ($products as $product)
                        <option
                            value="{{ $product->id }}.+.{{ $product->name }}.+.{{ $product->quantity }}.+.{{ $product->price }}">
                            {{ $product->name }}</option>
                    @endforeach <
                    /select></td > ' +
                    '<td><input type="number" readonly id="invoice_stock' +
                    i +
                    '-0" class="form-control invoice_stock"></td>' +
                    '<td><input type="number" name="quantity[]" min="0.01" step=".01" id="invoice_quantity' +
                    i +
                    '-0" class="form-control invoice_quantity"></td>' +
                    '<td><input type="number" name="price[]" min="0.01" step=".01" readonly id="invoice_price' +
                    i +
                    '-0" class="form-control invoice_price"></td>' +
                    '<td><input type="number" name="sub_total[]" readonly id="invoice_sub_total' +
                    i +
                    '-0" class="form-control invoice_sub_total"></td>' +
                    '<td><button type="button" class="btn btn-danger invoice_remove_added_item" id="invoice_' +
                    i +
                    '-0">Remove</button></td>'
                );
            });
            $(document).on('click', '.invoice_remove_added_item', function() {
                let button_id = $(this).attr("id");
                if (parseInt(counter) !== 1) {
                    $('#row' + button_id).remove();
                    counter--;
                } else {
                    alert('Cannot remove any more rows, at least one is recommended.');
                }
                calculations_inside_invoice(i, 0);
            });
            $(document).on('change', '.invoice_product', function() {
                calculations_inside_invoice(i, 0);
            });
            $(document).on('change', '.invoice_quantity', function() {
                calculations_inside_invoice(i, 0);
            });
            $(document).on('click', '.invoice_calculate', function() {
                calculations_inside_invoice(i, 0);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function calculations_inside_invoice(i, invoiceIdToEdit) {
            let total_amount = 0;
            total_amount = document.getElementById('invoice_total_amount-' + invoiceIdToEdit);
            total_amount.value = 0;
            for (j = 0; j <= i; j++) {
                if (document.getElementById('invoice_product' + j + '-' + invoiceIdToEdit)) {
                    let product = stock = quantity = price = sub_total = 0;
                    product = document.getElementById('invoice_product' + j + '-' + invoiceIdToEdit).value;
                    let productData = product.split('.+.');
                    stock = document.getElementById('invoice_stock' + j + '-' + invoiceIdToEdit);
                    quantity = document.getElementById('invoice_quantity' + j + '-' + invoiceIdToEdit);
                    price = document.getElementById('invoice_price' + j + '-' + invoiceIdToEdit);
                    sub_total = document.getElementById('invoice_sub_total' + j + '-' + invoiceIdToEdit);
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
