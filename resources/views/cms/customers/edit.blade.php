<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Add Customer</div>
    </div>
    <div class="ibox-body">
        <form class="form-horizontal" id="customerform-{{ $customer->id }}"
            action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data"
            autocomplete="off" novalidate="novalidate">
            @csrf
            @method('put')
            <div class="form-group row">
                <label class="col-sm-2 col-form-label font-bold">Name<span class="my-auto"
                        style="color: red">&nbsp;&ast;</span></label>
                <div class="col">
                    <input class="form-control" type="text" name="name" placeholder="Name"
                        value="{{ $customer->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label font-bold">Mobile</label>
                <div class="col">
                    <input class="form-control" type="number" name="mobile" placeholder="Mobile"
                        value="{{ $customer->mobile }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label font-bold">Address</label>
                <div class="col">
                    <input class="form-control" type="text" name="address" placeholder="Address"
                        value="{{ $customer->address }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label font-bold">Details</label>
                <div class="col">
                    <textarea class="form-control" type="textarea" name="details" rows="3" placeholder="Details"
                        value="{{ $customer->details }}"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label font-bold">Balance</label>
                <div class="col">
                    <input class="form-control" type="number" name="balance" placeholder="Balance"
                        value="{{ $customer->balance }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col ml-sm-auto">
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('cms.validations.formvalidation', ['id' => $customer->id])
