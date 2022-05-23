@extends('cms.layouts.app')
@section('content')
    <div class="page-heading">
        <h1 class="page-title">Edit Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Edit Product</li>
        </ol>
    </div>
    <div class="btn-group"><a href="{{ route('products.index') }}" class="btn btn-primary m-b-5 m-r-2"><i
                class="ti-align-justify"> </i>Manage Products</a>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit Product</div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" role="form" method="post"
                            action="{{ route('products.update', $data['product']->id) }}"
                            id="productform-{{ $data['product']->id }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="product_name" class="col-sm-4 col-form-label font-bold">Product Name<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" tabindex="1" name="name"
                                                value="{{ $data['product']->name }}" type="text" id="product_name"
                                                placeholder="Product Name" autocomplete="off">
                                            {{-- @if ($errors->has('name'))
                                                <span class="middle validation-alert">
                                                    <p style="color: red;">{{ $errors->first('name') }}</p>
                                                </span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="strength" class="col-sm-4 col-form-label font-bold">Weight<i
                                                class="text-danger"></i></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" tabindex="1" name="weight"
                                                value="{{ $data['product']->weight }}" type="number" id="strength"
                                                placeholder="Weight" autocomplete="off">
                                            {{-- @if ($errors->has('weight'))
                                                <span class="middle validation-alert">
                                                    <p style="color: red;">{{ $errors->first('weight') }}</p>
                                                </span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="box_size" class="col-sm-4 col-form-label font-bold">Box size<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="size" value="{{ $data['product']->size }}"
                                                type="number" id="size" placeholder="Box size" tabindex="3" min="0"
                                                autocomplete="off">
                                            {{-- @if ($errors->has('size'))
                                                <span class="middle validation-alert">
                                                    <p style="color: red;">{{ $errors->first('size') }}</p>
                                                </span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="unit" class="col-sm-4 col-form-label font-bold">Unit<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-8">

                                            <select name="unit" id="" class="form-control select2_demo_2">

                                                <option value="" selected disabled></option>
                                                @foreach ($data['unit'] as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $data['product']->unit_id == $value->id ? 'selected' : '' }}>
                                                        {{ $value->unit }}</option>
                                                @endforeach
                                                {{-- @foreach ($data['unit'] as $value)
                                                    @if ($data['product']->unit_id == $value->id)
                                                        <option value="{{ $value->id }}" selected>{{ $value->unit }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $value->id }}">{{ $value->unit }}</option>
                                                    @endif
                                                @endforeach --}}
                                            </select>
                                            {{-- <select class="form-control select2-hidden-accessible" id="unit_id"
                          
                          <option value="" selected disabled></option>                  name="unit_id" tabindex="-1" aria-hidden="true" autocomplete="off">
                                                <option value="">--Select One--</option>
                                                @foreach ($data['unit'] as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $data['product']->unit_id == $value->id ? 'selected' : '' }}>
                                                        {{ $value->unit }}</option>
                                                @endforeach
                                            </select> --}}
                                            {{-- @if ($errors->has('unit_id'))
                                                <span class="middle validation-alert">
                                                    <p style="color: red;">{{ $errors->first('unit_id') }}</p>
                                                </span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-4 col-form-label font-bold">Category<span
                                                class="text-danger">&nbsp;&ast;</span></label>
                                        <div class="col-sm-8">

                                            <select name="category" id="" class="form-control select2_demo_2">

                                                <option value="" selected disabled></option>
                                                @foreach ($data['category'] as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $data['product']->category_id == $value->id ? 'selected' : '' }}>
                                                        {{ $value->category }}</option>
                                                @endforeach
                                                {{-- @foreach ($data['category'] as $value)
                                                    @if ($data['product']->category_id == $value->id)
                                                        <option value="{{ $value->id }}" selected>
                                                            {{ $value->category }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $value->id }}">{{ $value->category }}
                                                        </option>
                                                    @endif
                                                @endforeach --}}
                                            </select>

                                            {{-- <select class="form-control select2-hidden-accessible" id="category_id"
                          
                          <option value="" selected disabled></option>                  name="category_id" tabindex="-1" aria-hidden="true" autocomplete="off">
                                                @foreach ($data['category'] as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $data['product']->category_id == $value->id ? 'selected' : '' }}>
                                                        {{ $value->category }}</option>
                                                @endforeach
                                            </select> --}}
                                            {{-- @if ($errors->has('category_id'))
                                                <span class="middle validation-alert">
                                                    <p style="color: red;">{{ $errors->first('category_id') }}</p>
                                                </span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-4 col-form-label font-bold">Service Rate<i
                                                class="text-danger">&nbsp;&ast;</i> </label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-right" name="service_rate" type="number"
                                                value="{{ $data['product']->service_rate }}" onkeyup="Checkprice()"
                                                id="price" placeholder="0.00" tabindex="10" min="0" autocomplete="off">
                                            {{-- @if ($errors->has('service_rate'))
                                                <span class="middle validation-alert">
                                                    <p style="color: red;">{{ $errors->first('service_rate') }}</p>
                                                </span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="supplier" class="col-sm-4 col-form-label font-bold">supplier<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-8">
                                            <select name="supplier" id="" class="form-control select2_demo_2">

                                                <option value="" selected disabled></option>
                                                @foreach ($data['supplier'] as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $data['product']->supplier_id == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name }}</option>
                                                @endforeach
                                                {{-- @foreach ($data['supplier'] as $value)
                                                    @if ($data['product']->supplier_id == $value->id)
                                                        <option value="{{ $value->id }}" selected>{{ $value->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endif
                                                @endforeach --}}
                                            </select>
                                            <p style="color: green;cursor:pointer" data-target="#manufac_modal"
                                                data-toggle="modal"><i class="fa fa-plus"></i>Add New supplier</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">

                                        <label for="price" class="col-sm-4 col-form-label font-bold">Purchase Price<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-8">
                                            <input type="number" tabindex="13" value="{{ $data['product']->price }}"
                                                onkeyup="ProfitPrice(),checkmprice()" class="form-control text-right"
                                                name="price" placeholder="0.00" min="0" id="mprice" autocomplete="off">
                                            {{-- @if ($errors->has('price'))
                                                <span class="middle validation-alert">
                                                    <p style="color: red;">{{ $errors->first('price') }}</p>
                                                </span>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-4 col-form-label font-bold">Details</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="details" value="" id="details" rows="4"
                                                tabindex="6" placeholder="Details"
                                                autocomplete="off">{{ $data['product']->details }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="main-div">
                                            <label for="" class="col-sm-2 col-form-label font-bold">Images</label>
                                            <input type="file" name="images[]">
                                            <button type="button" class="btn btn-success clone_image_fields btn-sm"><i
                                                    class="fa fa-plus"></i>Add Images</button>
                                        </div>

                                        <div class="clone" style="display: none;">
                                            <div class="duplicate" style="margin-top:5px;">
                                                <label for="" class="col-sm-2 col-form-label font-bold"></label>
                                                <input type="file" name="images[]">
                                                <button type="button"
                                                    class="btn btn-danger remove_cloned_fields btn-sm">Remove</button>

                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            @if (isset($data['product']->images) && $data['product']->images->count() > 0)
                                                <div class="row form-group">
                                                    @foreach ($data['product']->images as $image_info)
                                                        <div class="col-sm-6 img-wrapper-div">
                                                            <img src="{{ asset('uploads/product_images/' . $image_info->images) }}"
                                                                style="height: 200px;width:auto" alt=""
                                                                class="img img-thumbnail img-fluid">
                                                            <button type="button" attr-image-id="{{ $image_info->id }}"
                                                                attr-image-remove-url="{{ route('products.remove-image', $image_info->id) }}"
                                                                class="btn btn-sm btn-danger remove-img-btn"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-form-label font-bold"> </label>
                                    <div class="col-sm-8">
                                        <button style="cursor:pointer" class="btn btn-danger" type="reset"><i
                                                class="fa fa-trash"></i> Reset</button>
                                        <button style="cursor:pointer" class="btn btn-success" type="submit"><i
                                                class="fa fa-paper-plane"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('cms.validations.formvalidation', ['id' => $data['product']->id])
@endsection
@section('js')
    <script src="{{ asset('assets/cms/js/notify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.remove-img-btn').click(function() {
                var $this = $(this);
                var image_id = $this.attr('attr-image-id');
                var img_url = $this.attr('attr-image-remove-url');

                $.ajax({
                    type: "POST",
                    url: img_url,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: image_id
                    },
                    success: function(response) {

                        var data = $.parseJSON(response);
                        if (data.error) {
                            $.notify(data.message, "warning");

                        } else {
                            $this.closest('.img-wrapper-div').remove();

                            $.notify(data.message, "success");

                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $(".clone_image_fields").click(function() {
                var inputHtml = $(".clone").html();
                $(".main-div").after(inputHtml);
            });
        });

        $("body").on("click", ".remove_cloned_fields", function() {
            $(this).parents(".duplicate").remove();
        });
    </script>
@endsection
