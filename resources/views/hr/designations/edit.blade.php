<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Edit designation</div>
    </div>
    <div class="ibox-body">
        <form action="{{ route('designations.update', $designation->id) }}" class="form-horizontal"
            id="designationform-{{ $designation->id }}" method="POST" enctype="multipart/form-data" autocomplete="off"
            novalidate="novalidate">
            @csrf
            @method('put')
            <div class="form-group row">
                    <label class="my-auto col-sm-3 font-bold" for="designation">Designation<span
                            style="color: red">&nbsp;&ast;</span></label>
                <div class="col">
                    <input class="form-control" type="text" name="designation" placeholder="Designation" value="{{ $designation->designation }}">
                </div>
            </div>

            <div class="form-group row">
                    <label class="my-auto col-sm-3 font-bold" for="details">Details</span></label>
                <div class="col">
                    <textarea class="form-control" type="text" name="details" rows="3" placeholder="Add description about the designation">{{ $designation->details }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success ml-1">Save</button>
        </form>
    </div>
</div>
@include('cms.validations.formvalidation', ['id' => $designation->id])
