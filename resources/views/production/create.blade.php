@extends('layouts.app')

@section('content')
    @include('inc.sidebar')

    <div class="main">

        <h2>Product Recipe </h2>
        <br/>
        <form method="post" action="{{ route('storeProduct.product') }}" enctype="multipart/form-data">


            {{--        <form id="product_form" name="product_form" method="post" action="#" enctype="multipart/form-data">--}}
            <div class="table-responsive " style="width:650px;">
                <div class="form-group">
                    <div class="col-md-13">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title_id" name="title" placeholder="Title">

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-13">
                        <label for="description">Description: </label>
                        <textarea id="description_id" name="description" rows="4" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-13">
                        <label for="category">Category: </label>
                        <select class="form-control" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-13">
                        <label for="image">Select image</label>
                        <input type="file" class="form-control-file" id="image" name="image">

                    </div>
                </div>
                {{--                <div align="center">--}}
                {{--                <h2>Create recipe </h2>--}}
                {{--                </div>--}}
                {{--                <div class="groove">--}}
                <div id="product_section">
                    <div class="form-group">
                        <div class="col-md-13">
                            <label for="size">Size: </label>
                            {{--                            <select class="form-control" id="size_id" name="size_id[0][]">--}}
                            <select class="form-control" id="size_id" name="product[0][size]">
                                <option disabled selected>Select Size</option>
                                @foreach($sizes as $size)
                                    <option value="{{$size_value = $size->id }}">{{$size->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    {{--                    {{var_export($size_value)}}--}}
                    <div class="border border-dark">
                        <div id="recipe_section0" class="border border-white">
                            <div class=" form-inline">

                                {{--                                    <label for="Item">Item: </label>--}}
                                {{--                                    --}}{{--                                    <select class="form-control" id="item_id" name="product[0][recipe][0][item]">--}}
                                {{--                                    <select class="form-control" id="item" name="item">--}}
                                {{--                                        <option value="">Select item</option>--}}
                                {{--                                        @foreach($stocks as  $stock)--}}


                                {{--                                            @if (Input::old('item') == $stock->id)--}}
                                {{--                                                <option value="{{ $stock->id }}" selected>{{ $stock->items }}</option>--}}
                                {{--                                            @else--}}
                                {{--                                                <option value="{{ $stock->id  }}">{{ $stock->items }}</option>--}}
                                {{--                                            @endif--}}

                                {{--                                            --}}{{--               <option value="{{ $key }}" {{ (Input::old("item") == $key ? "selected":"") }}>{{ $stock }}</option>--}}
                                {{--                                            --}}{{--                                            <option value="{{$stock->id}}">{{$stock->items}}</option>--}}
                                {{--                                        @endforeach--}}
                                {{--                                    </select>--}}
                                {{--                                    --}}{{--.....--}}


                                <div class="form-group mb-2">
                                    <label for="Item">Item: </label>
                                    <select class="form-control" id="item_id2" name="product[0][recipe][0][item]">
                                        <option value="">Select item</option>
                                        @foreach($stocks as $stock)
                                            <option value="{{$stock->id}}">{{$stock->items}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="Item">Quantity: </label>
                                    <input type="number" class="form-control"  name="product[0][recipe][0][quantity]">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="Item">Unit: </label>
                                    <select class="form-control" name=product[0][recipe][0][unit_id]">
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="button" id="add_recipe_row_button" class="btn btn-success mb-2 "
                                        onclick="addRow(0)" style="width:70px;"> Add
                                </button>
                            </div>

                        </div> {{--recipe_section .../div --}}
                    </div>
                </div> {{--product_section .../div --}}

                <br>
                <button type="button" id="add_product_section_button" onclick="addProduct_section('#product_section')"
                        class="btn btn-success">Add More Product
                </button>
                <br>

                <div align="center">
                    <br>
                    <button type="submit" class="btn btn-block btn-success btn-large"> SAVE
                    </button>
                </div>
            </div>
            @csrf
        </form>
    </div>



    <script>

        var count = 1;
        var increment = 1;
        var increment2 = 0;


        /*for add new Row*/
        function addRow(index) {

            $('#recipe_section' + index).append('<div class=" form-inline">' +
                '<label for="Item">Item: </label><select onchange="validateSameFields(' + this + ')" class="form-control" id="items_id" name="product[' + index + '][recipe][' + increment + '][item]">   <option value="" >Select item</option> @foreach($stocks as $stock)<option value="{{$stock->id}}">{{$stock->items}}</option>@endforeach</select>' +
                ' <label for="quantity">Quantity:</label><input type="number" class="form-control" name="product[' + index + '][recipe][' + increment + '][quantity]" placeholder="Quantity">' +
                ' <label for="unit">Unit:</label>  <select class="form-control" name="product[' + index + '][recipe][' + increment + '][unit_id]"> @foreach($units as $unit)<option value="{{$unit->id}}">{{$unit->name}}</option>@endforeach
                    </select> <button type="button"  class="btn btn-danger" id="remove_recipe_row">remove</button> </div>');
            // number++;

            increment++
            // count++
        }

        function validateSameFields() {

            // $(this).parent('div')
            $('select').each(function () {
                $('option').each(function () {
                    if (!$(this).selected) {
                        $(this).attr('disabled', true);
                    }
                });
            });
        }


        /*for add new product section*/
        function addProduct_section(product_section) {
            // var add = index;
            var index = count;

            var increment = 0;

            // console.log(index)
            // console.log(increment++)
            $(product_section).append('<br><div id="recipe_section' + count + '"> <label for="size">Size: </label><select class="form-control" id="select_append" name="product[' + count + '][size]">  ' +
                '<option disabled selected>Select Size</option>@foreach($sizes as $size)<option value="{{$size->id}}">{{$size->name}}</option>@endforeach</select> ' +
                '<div class=" form-inline"><label for="Item">Item:</label><select class="form-control" name="product[' + index + '][recipe][' + count + '][item]"> <option disabled selected>Select item</option>@foreach($stocks as $stock)<option value="{{$stock->id}}">{{$stock->items}}</option>@endforeach</select>' +
                '<label for="quantity">Quantity:</label><input type="number" class="form-control" name="product[' + index + '][recipe][' + count + '][quantity]"  placeholder="Quantity">' +
                '<label for="unit">Unit:</label>   <select class="form-control" name="product[' + index + '][recipe][' + count + '][unit_id]"> @foreach($units as $unit)<option value="{{$unit->id}}">{{$unit->name}}</option>@endforeach</select>  <button type="button"  ' +
                'onclick="addRow(' + index + ')" id="add_recipe_row_button" class="btn btn-success mb-2"   style="width:70px;"> Add</button></div></div>' +
                '<button type="button" class="btn btn-danger" onclick="removeProductSection(' + this + ')" id="remove_product_sections ">remove Product</button>');


            count++;
        }

        $(document).ready(function () {

            var product_section = $("#product_section");
            var add_more_product_button = $("#add_product_section_button");
            var recipe_section = $("#recipe_section0");
            var add_button = $("#add_recipe_row_button");
            var max = 100;
            var number = 1;

            /*for remove button*/
            $(recipe_section).on("click", "#remove_recipe_row", function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                number--;
            });

            /*/////////////////////////////////////////////////*/
            // $('select').on('change', function() {
            //
            //     // enable all options
            //     $('option[disabled]').prop('disabled', false);
            //
            //     $('select').each(function() {
            //         $('select').not(this).find('option[value="' + this.value + '"]').prop('disabled', true);
            //     });
            //
            //
            // });
            /*/////////////////////////////////////////////////*/


            /*... fields validation for avoid same inputs...*/
            //
            // $("#item_id").change(function () {
            //     var value = $(this).val();
            //     if (value === '') return;
            //     var theDiv = $(".is" + value);
            //
            //     var option = $("option[value='" + value + "']", this);
            //     option.attr("disabled", "disabled");
            //
            //     theDiv.slideDown().removeClass("hidden");
            //     theDiv.find('a').data("option", option);
            //
            // });

            /*..................*/

            /*for remove button*/
            $(product_section).on("click", "#remove_recipe_row", function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                // number--;
            });


        });


    </script>

@endsection
