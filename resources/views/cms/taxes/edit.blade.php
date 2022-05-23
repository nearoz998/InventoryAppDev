<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Edit Tax</div>
    </div>
    <div class="ibox-body">
        <form action="{{ route('taxes.update', $tax->id) }}" class="form-horizontal"
            id="taxform-{{ $tax->id }}" method="POST" enctype="multipart/form-data" autocomplete="off"
            novalidate="novalidate">
            @csrf
            @method('put')
            <div class="form-group row">
                <div class="col col-sm-4">
                    <label for="tax" class="my-auto font-bold">Tax<span
                            style="color: red">&nbsp;&ast;</span></label>
                </div>
                <div class="col">
                    <input class="form-control mb-2 my-auto ml-1" type="number" step=".001" name="tax" style="width: auto"
                        value="{{ old('tax', $tax->tax) }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col col-sm-4">
                    <label for="status" class="my-auto font-bold mr-4">Status<span
                            style="color: red">&nbsp;&ast;</label>
                </div>
                <div class="col">
                    @if ($tax->status == 1)
                        <label class="ui-radio ui-radio-inline ui-radio-primary ui-primary">
                            <input type="radio" value="1" checked name="status">
                            <span class="input-span"></span>Active
                        </label>
                        <label class=" ui-radio ui-radio-inline ui-radio-primary ui-primary">
                            <input type="radio" value="0" name="status">
                            <span class="input-span"></span>Inctive</label>
                    @else
                        <label class="ui-radio ui-radio-inline ui-radio-primary ui-primary">
                            <input type="radio" value="1" name="status">
                            <span class="input-span"></span>Active</label>
                        <label class=" ui-radio ui-radio-inline ui-radio-primary ui-primary">
                            <input type="radio" value="0" checked name="status">
                            <span class="input-span"></span>Inctive</label>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-success ml-1">Save</button>
        </form>
    </div>
</div>
@include('cms.validations.formvalidation', ['id' => $tax->id])
