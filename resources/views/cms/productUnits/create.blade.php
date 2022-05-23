<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Add Product Unit</div>
    </div>
    <div class="ibox-body">
        <form action="{{ route('productunits.store') }}" class="form-horizontal" id="productunitform-0" method="POST"
            enctype="multipart/form-data" autocomplete="off" novalidate="novalidate">
            @csrf
            @method('post')
            <div class="form-group row">
                <div class="col col-sm-4">
                    <label for="unit" class="my-auto font-bold">Unit Name<span
                            style="color: red">&nbsp;&ast;</span></label>
                </div>
                <div class="col">
                    <input class="form-control mb-2 my-auto ml-1" type="text" name="unit" style="width: auto">
                </div>
            </div>
            <div class="form-group row">
                <div class="col col-sm-4">
                    <label for="status" class="my-auto font-bold mr-4">Status<span
                            style="color: red">&nbsp;&ast;</label>
                </div>
                <div class="col">
                    <label class="ui-radio ui-radio-inline ui-radio-primary ui-primary">
                        <input type="radio" value="1" name="status">
                        <span class="input-span"></span>Active
                    </label>
                    <label class=" ui-radio ui-radio-inline ui-radio-primary ui-primary">
                        <input type="radio" value="0" name="status">
                        <span class="input-span"></span>Inctive</label>
                </div>
            </div>
            <button type="submit" class="btn btn-success ml-1">Save</button>
        </form>
    </div>
</div>
@include('cms.validations.formvalidation', ['id' => '0'])
