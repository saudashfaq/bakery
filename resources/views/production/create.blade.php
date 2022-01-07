{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')
{{--    @include('inc.sidebar')--}}
    <div class="right_col" role="main">
        {{--    <!-- top tiles -->--}}
        {{--    <div class="row" style="display: inline-block;" >--}}
        <div class="x_panel tile ">
            <div class="main">

                <h1> Create Product Recipe </h1>
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
                                <textarea id="description_id" name="description" rows="4"
                                          class="form-control"></textarea>
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
                        {{-- todo for image --}}
                        <div class="form-group">
                            <div class="col-md-13">
                                <label for="image">Select image</label>
                                <input type="file" class="form-control-file" id="image" name="image">

                            </div>
                        </div>

                        <div id="product_section">
                            <div style="border:groove  ;border-radius: 10px 15px;">
                                {{--for Attributes head --}}
                                <div id="attribute_section0">
                                    <div class=" form-inline">
                                        <div class="form-group">

                                            <label>Attributes Head </label>
                                            <select class="form-control input-sm"
                                                    name="product[0][attribute][0][attributeHead_id]" id="attributeHead"
                                                    style="width:160px;">
                                                <option disabled selected>Select_Attribute Head</option>
                                                @foreach($attributeHeads as $attributeHead)
                                                    <option
                                                        value="{{$attributeHead->id}}">{{$attributeHead->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        {{-- for attributes --}}
                                        <div class="form-group">

                                            <label>Attributes </label>
                                            <select class="form-control input-sm"
                                                    name="product[0][attribute][0][attribute_id]" id="attribute0"
                                                    style="width:160px;">
                                                <option disabled selected>Select_Attributes</option>
                                                <option value=""></option>
                                            </select>

                                        </div>
                                        {{-- add attribute section button --}}
                                        <button type="button" id="add_attribute_button" class="btn btn-success mb-2"
                                                onclick="attributeSection(0)"
                                                style=" margin:7px; width:75px; height: auto"> Add
                                        </button>

                                    </div>
                                </div>

                                <div id="recipe_section0">
                                    <h2 class="text-center"> Add Recipe Here</h2>
                                    <div class=" form-inline">
                                        <div class="form-group mb-2">
                                            <label for="Item">Item: </label>
                                            <select class="form-control" id="item_id2"
                                                    name="product[0][recipe][0][item]">
                                                <option value="">Select item</option>
                                                @foreach($stocks as $stock)
                                                    <option value="{{$stock->id}}">{{$stock->items}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="Item">Quantity: </label>
                                            <input type="number" class="form-control"
                                                   name="product[0][recipe][0][quantity]">
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


                                </div>{{--recipe_section .../div --}}
                                <br>
                            </div>
                        </div> {{--product_section .../div --}}

                        <br>
                        <button type="button" id="add_product_section_button"
                                onclick="addProduct_section('#product_section')"
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
        </div>
    </div>
{{--    </div>--}}


    <script>

        var count = 1;
        var increment = 0;
        var increment2 = 0;

        $('#attributeHead').on('change', function (e) {
            console.log(e);
            var attributeHead_id = e.target.value;
            //ajax
            $.get('/ajax-attribute?attributeHead_id=' + attributeHead_id, function (data) {
                var index = count;
                //success data
                console.log(data);

                $('#attribute0').empty();
                $.each(data, function (index, attributeObj) {
                    $('#attribute0').append('<option value="' + attributeObj.id + '">' + attributeObj.name + '</option>');

                });
            });
        });

        //add attribute section script
        function attributeSection(index) {
            console.log(index);
            increment++
            // var idIncrement  = count ;
            $('#attribute_section' + index).append('<div class=" form-inline"> <label ' +
                'for="size">Attributes Head</label><select class="form-control input-sm" name="product[' + index + '][attribute][' + increment + '][attributeHead_id]"' +
                ' onchange="dynamicAttribute(value,' + increment + ')" id="attributeHead" ' +
                'style="width:160px;"><option disabled selected>Select_Attribute Head' +
                '   @foreach($attributeHeads as $attributeHead)
                    <option value="{{$attributeHead->id}}">{{$attributeHead->name}}</option>@endforeach</option></select>' +
                '    <label for="size">Attributes </label> ' +
                ' <select class="form-control input-sm" name="product[' + index + '][attribute][' + increment + '][attribute_id]" id="attribute' + increment + '" style="width:160px;">' +
                '   <option disabled selected>Select_Attributes</option> <option value=""></option>' +
                ' </select> ' +
                ' <button type="button"  class="btn btn-danger" id="remove_recipe_row">remove</button></div> ');

            // increment++


        }

        function dynamicAttribute(value, idIncrement) {
            // var idynamic_d = count;

            console.log('inside');
            console.log(value);
            console.log(idIncrement);
            var attributeHead_id = value;

            // console.log(attributeHead_id);

            //ajax
            $.get('/ajax-attribute?attributeHead_id=' + attributeHead_id, function (data) {
                //success data
                console.log(data);

                $('#attribute' + idIncrement).empty();
                $.each(data, function (index, attributeObj) {
                    $('#attribute' + idIncrement).append('<option value="' + attributeObj.id + '">' + attributeObj.name + '</option>');

                });
            });


            count++
        }

        /*for add new Row*/
        function addRow(index) {

            $('#recipe_section' + index).append('<div class=" form-inline">' +
                '<label for="Item">Item: </label><select onchange="validateSameFields(' + this + ')" class="form-control" id="items_id" name="product[' + index + '][recipe][' + increment + '][item]">   <option value="" >Select item</option> @foreach($stocks as $stock)<option value="{{$stock->id}}">{{$stock->items}}</option>@endforeach</select>' +
                ' <label for="quantity">Quantity:</label><input type="number" class="form-control" name="product[' + index + '][recipe][' + increment + '][quantity]" placeholder="Quantity">' +
                ' <label for="unit">Unit:</label>  <select class="form-control" name="product[' + index + '][recipe][' + increment + '][unit_id]"> @foreach($units as $unit)<option value="{{$unit->id}}">{{$unit->name}}</option>@endforeach
                    </select> <button type="button"  class="btn btn-danger" id="remove_recipe_row">remove</button> </div>');


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

            var index = count;

            increment++

            // console.log(index)
            // console.log(increment++)
            $(product_section).append('<br><div><div  style="border:groove  ;border-radius: 10px 15px;">' +
                '<div id="attribute_section' + count + '"> ' +
                ' <div class=" form-inline"><label>Attributeshead</label><select class="form-control input-sm" name="product[' + index + '][attribute][' + count + '][attributeHead_id]"' +
                ' onchange="dynamicAttribute(value,' + increment + ')" id="attributeHead" ' +
                'style="width:160px;"><option disabled selected>Select_Attribute Head' +
                '   @foreach($attributeHeads as $attributeHead)
                    <option value="{{$attributeHead->id}}">{{$attributeHead->name}}</option>@endforeach</option></select>' +
                '   <label >Attributes </label> ' +
                ' <select class="form-control input-sm" name="product[' + index + '][attribute][' + count + '][attribute_id]" id="attribute' + increment + '" style="width:160px;">' +
                '   <option disabled selected>Select_Attributes</option> <option value=""></option> </select> ' +
                '<button type="button" id="add_attribute_button" class="btn btn-success mb-2 " onclick = "attributeSection(' + index + ')"  style="width:80px;"> Add</button></div></div>' +
                '  <h2 class="text-center"> Add Recipe Here</h2>' +
                '<div id="recipe_section' + count + '"> ' +
                ' <div class=" form-inline"><label for="Item">Item:</label><select class="form-control" name="product[' + index + '][recipe][' + count + '][item]"> <option disabled selected>Select item</option>@foreach($stocks as $stock)<option value="{{$stock->id}}">{{$stock->items}}</option>@endforeach</select>' +
                '<label for="quantity">Quantity:</label><input type="number" class="form-control" name="product[' + index + '][recipe][' + count + '][quantity]"  placeholder="Quantity">' +
                '<label for="unit">Unit:</label>   <select class="form-control" name="product[' + index + '][recipe][' + count + '][unit_id]"> @foreach($units as $unit)<option value="{{$unit->id}}">{{$unit->name}}</option>@endforeach</select>  <button type="button"  ' +
                'onclick="addRow(' + index + ')" id="add_recipe_row_button" class="btn btn-success mb-2"   style="width:70px;"> Add</button></div></div>' +
                '<button type="button" class="btn btn-danger" id="remove_product_sectionAll">Remove Product</button><br><br></div></div>');


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

            /*for remove button*/
            $(product_section).on("click", "#remove_recipe_row", function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                // number--;
            });
            /*for remove product secction */
            $(product_section).on("click", "#remove_product_sectionAll", function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                // number--;
            });


        });


    </script>

@endsection

