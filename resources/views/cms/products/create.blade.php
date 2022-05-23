@extends('cms.layouts.app')
@section('content')
    <div class="page-heading">
        <h1 class="page-title">New Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Add New Product</li>
        </ol>
    </div>
    <div class="btn-group">
        @include('cms.includes.popupModal', [
        'title' => 'Import from CSV',
        'btnClass' => 'fa fa-plus m-b-5 m-r-2 btn-primary ',
        'btnTitle' => 'Import Products (CSV)',
        'id' => 'importFromCSV',
        'import' => 'import-products',
        ])
        &nbsp;&nbsp;
        <a href="{{ route('products.index') }}" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage
            Product</a>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">New Product</div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" role="form" method="post" action="{{ route('products.store') }}"
                            id="productform-0" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-4 col-form-label">Product Name<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" tabindex="1" name="name" type="text" id="name"
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
                                        <label for="strength" class="col-sm-4 col-form-label">Weight<i
                                                class="text-danger"></i></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" tabindex="1" name="weight" type="number"
                                                id="strength" placeholder="Weight" autocomplete="off">
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
                                        <label for="box_size" class="col-sm-4 col-form-label">Box size<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="size" type="number" id="size"
                                                placeholder="Box size" tabindex="3" min="0" autocomplete="off">
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
                                        <label for="unit" class="col-sm-4 col-form-label">Unit<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-8">
                                            <select name="unit" id="" class="form-control select2_demo_2">
                                                <option value="" selected disabled></option>
                                                @foreach ($data['unit'] as $value)
                                                    <option value="{{ $value->id }}">{{ $value->unit }}</option>
                                                @endforeach
                                            </select>
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
                                        <label for="category_id" class="col-sm-4 col-form-label">Category<span
                                                class="text-danger">&nbsp;&ast;</span></label>
                                        <div class="col-sm-8">
                                            <select name="category" id="" class="form-control select2_demo_2">
                                                <option value="" selected disabled></option>
                                                @foreach ($data['category'] as $value)
                                                    <option value="{{ $value->id }}">{{ $value->category }}</option>
                                                @endforeach
                                            </select>

                                            </select>
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
                                        <label for="image" class="col-sm-4 col-form-label">Service Rate<i
                                                class="text-danger">&nbsp;&ast;</i> </label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-right" name="service_rate" type="number"
                                                onkeyup="Checkprice()" id="price" placeholder="0.00"
                                                tabindex="10" min="0" autocomplete="off">
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
                                        <label for="supplier" class="col-sm-4 col-form-label">supplier<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-6">
                                            <select name="supplier" id="" class="form-control select2_demo_2">
                                                <option value="" selected disabled></option>
                                                @foreach ($data['supplier'] as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#myModal">
                                                <i class="fa fa-plus"></i> Add
                                            </button>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">

                                        <label for="price" class="col-sm-4 col-form-label">Purchase Price<i
                                                class="text-danger">&nbsp;&ast;</i></label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="13" onkeyup="ProfitPrice(),checkmprice()"
                                                class="form-control text-right" name="price" placeholder="0.00" min="0"
                                                id="mprice" autocomplete="off">
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
                                        <label for="description" class="col-sm-4 col-form-label">Details</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="details" id="details" rows="4"
                                                tabindex="6" placeholder="Details" autocomplete="off"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="main-div">
                                        <label for="" class="col-sm-2 col-form-label">Images</label>
                                        <input type="file" name="images[]">
                                        <button type="button" class="btn btn-success clone_image_fields btn-sm"><i
                                                class="fa fa-plus"></i>
                                            Add Images</button>
                                    </div>
                                    <div class="clone" style="display: none;">
                                        <div class="duplicate" style="margin-top:5px;">
                                            <label for="" class="col-sm-2 col-form-label"></label>
                                            <input type="file" name="images[]">
                                            <button type="button"
                                                class="btn btn-danger remove_cloned_fields btn-sm">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="image" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <a href="{{ route('products.index') }}" class="btn btn-danger"><i
                                                class="fa fa-trash"></i>Cancel</a>
                                        <button style="cursor:pointer" class="btn btn-success" type="submit"><i
                                                class="fa fa-paper-plane"></i>Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
      $(document).ready(function() {
          var url = window.location; 
          var element = $('ul.side-menu li a').filter(function() {
          return this.href == url || url.href.indexOf(this.href) == 0; }).parent().addClass('active');
          if (element.is('li')) { 
               element.addClass('active').parent().parent('li').addClass('active')
           }
      });
      </script> --}}
    @include('cms.validations.formvalidation', ['id' => '0']);
@endsection
@section('js')
    <script>
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
