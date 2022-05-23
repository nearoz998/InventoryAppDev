<div class="ibox">
    <div class="ibox-head">
        <div class="ibox-title">Add Employee</div>
    </div>
    <div class="ibox-body">
        <form action="{{ route('employees.store') }}" class="form-horizontal" id="employeeform-0" method="POST"
            enctype="multipart/form-data" autocomplete="off" novalidate="novalidate">
            @csrf
            @method('post')
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="name">Name<span style="color: red">&nbsp;&ast;</span></label>
                <div class="col">
                    <input class="form-control" type="text" name="name" placeholder="name">
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="designation">Designation<span
                        style="color: red">&nbsp;&ast;</span></label>
                <div class="col">
                    <select name="designation" id="employee_designation-0" class="form-control select2_demo_">
                        <option value="" selected disabled>--Select option--</option>
                        @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="phone">Phone<span style="color: red">&nbsp;&ast;</span></label>
                <div class="col">
                    <input class="form-control" type="number" name="phone" placeholder="phone">
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="email">Email</label>
                <div class="col">
                    <input class="form-control" type="email" name="email" placeholder="email">
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="rate_type">Rate Type</label>
                <div class="col">
                    <select name="rate_type" id="employee_rate_type-0" class="form-control select2_demo_">
                        <option value="" selected disabled>--Select option--</option>
                        {{-- @foreach ($rate_types as $rate_type) --}}
                        <option value="Hourly">{{ 'Hourly' }}</option>
                        <option value="Salary">{{ 'Salary' }}</option>
                        {{-- @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="rate">Hourly Rate/ Salary</label>
                <div class="col">
                    <input class="form-control" type="rate" name="rate" placeholder="0.00">
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="blood_group">Blood Group</label>
                <div class="col">
                    <select name="blood_group" id="employee_blood_group-0" class="form-control select2_demo_">
                        <option value="" selected disabled>--Select option--</option>
                        {{-- @foreach ($blood_groups as $blood_group) --}}
                        <option value="A+">{{ 'A+' }}</option>
                        <option value="A-">{{ 'A-' }}</option>
                        <option value="B+">{{ 'B+' }}</option>
                        <option value="B-">{{ 'B-' }}</option>
                        <option value="AB+">{{ 'AB+' }}</option>
                        <option value="AB-">{{ 'AB-' }}</option>
                        <option value="O+">{{ 'O+' }}</option>
                        <option value="O-">{{ 'O-' }}</option>
                        {{-- @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="address1">Address Line 1</label>
                <div class="col">
                    <textarea class="form-control" type="text" name="address1"
                        placeholder="address line 1"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="address2">Address Line 2</label>
                <div class="col">
                    <textarea class="form-control" type="text" name="address2"
                        placeholder="address line 2"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="picture">Picture</label>
                <div class="col">
                    <input class="form-control" type="file" name="picture" placeholder="picture">
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="country">Country</label>
                <div class="col">
                    <select name="country" id="employee_country-0" class="form-control select2_demo_">
                        <option value="" selected disabled>--Select option--</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="city">City</label>
                <div class="col">
                    <input class="form-control" type="text" name="city" placeholder="city">
                </div>
            </div>
            <div class="form-group row">
                <label class="my-auto col-sm-3 font-bold" for="zip_code">Zip Code</label>
                <div class="col">
                    <input class="form-control" type="number" name="zip_code" placeholder="zip code">
                </div>
            </div>
            <button type="submit" class="btn btn-success ml-1">Save</button>
        </form>
    </div>
</div>
@include('cms.validations.formvalidation', ['id' => '0'])
