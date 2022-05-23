<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Add Customer</div>
    </div>
    <div class="ibox-body">
        <form class="form-horizontal" id="customerform-0" action="{{ route('customers.store') }}" method="POST"
            enctype="multipart/form-data" autocomplete="off" novalidate="novalidate">
            @csrf
            @method('post')
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-bold">Name<span class="my-auto"
                        style="color: red">&nbsp;&ast;</span></label>
                <div class="col">
                    <input class="form-control" type="text" name="name" placeholder="Name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-bold">Mobile</label>
                <div class="col">
                    <input class="form-control" type="number" name="mobile" placeholder="Mobile">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-bold">Address</label>
                <div class="col">
                    <input class="form-control" type="text" name="address" placeholder="Address">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label font-bold my-auto">Previous Balance</label>
                <div class="col">
                    <input class="form-control" type="number" name="balance" placeholder="Previous Balance">
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
@include('cms.validations.formvalidation', ['id' => '0'])
