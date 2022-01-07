{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')
{{--    @include('inc.sidebar')--}}
    <div class="right_col" role="main">
        {{--    <!-- top tiles -->--}}
        {{--    <div class="row" style="display: inline-block;" >--}}
        <div class="x_panel tile ">
            <div class="main">

                <h1>Create Ready-Made Product </h1>
                <br/>
                <form method="post" action="{{ route('store.readymadeproduct') }}" enctype="multipart/form-data">


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

                        <div class="form-group">
                            <div class="col-md-13">
                                <label for="image">Select image</label>
                                <input type="file" class="form-control-file" id="image" name="image">

                            </div>
                        </div>

                        <!-- attributes -->
                        <div id="attribute_section0">
                            <div class=" form-inline">
                                <div class="form-group">
{{--                                    <div class="col-md-13">--}}
                                        <label for="size">Attributes head </label>
                                        <select class="form-control input-sm" name="attribute[0][attributeHead_id]"
                                                id="attributeHead"
                                                style="width:160px;">
                                            <option disabled selected>Select_Attribute Head</option>
                                            @foreach($attributeHeads as $attributeHead)
                                                <option value="{{$attributeHead->id}}">{{$attributeHead->name}}</option>
                                            @endforeach
                                        </select>
{{--                                    </div>--}}
                                </div>

                                {{-- for attributes --}}
                                <div class="form-group">
{{--                                    <div class="col-md-13">--}}
                                        <label for="size">Attributes </label>
                                        <select class="form-control input-sm" name="attribute[0][attribute_id]"
                                                id="attribute0" style="width:160px;">
                                            <option disabled selected>Select_Attributes</option>
                                            <option value=""></option>
                                        </select>
{{--                                    </div>--}}
                                </div>
                                {{-- add attribute section button --}}
                                <button type="button" id="add_attribute_button" class="btn btn-success mb-2 "
                                        onclick="attributeSection()" style="width:80px;"> Add
                                </button>
                                {{--                                onclick="attributeSection(0)"  , dynamicAttribute(0)"--}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-13">
                                <label for="title">Brand Name :</label>
                                <input type="text" class="form-control" name="brand_name"
                                       placeholder="Enter brand / company Name">

                            </div>
                        </div>

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


    {{--jScript code --}}


    <script>

        var count = 1;
        var increment = 0;
        // var increment = 1;
        var increment2 = 0;

        /*................*/

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
        function attributeSection() {

            increment++
            // var idIncrement  = count ;
            $('#attribute_section0').append('<div class=" form-inline"> <label ' +
                'for="size">Attributeshead</label><select class="form-control input-sm" name="attribute[' + increment + '][attributeHead_id]"' +
                ' onchange="dynamicAttribute(value,' + increment + ')" id="attributeHead" ' +
                'style="width:160px;"><option disabled selected>Select_Attribute Head' +
                '   @foreach($attributeHeads as $attributeHead)
                    <option value="{{$attributeHead->id}}">{{$attributeHead->name}}</option>@endforeach</option></select>' +
                '    <div class="form-group"> <label for="size">Attributes </label> ' +
                ' <select class="form-control input-sm" name="attribute[' + increment + '][attribute_id]" id="attribute' + increment + '" style="width:160px;">' +
                '   <option disabled selected>Select_Attributes</option> <option value=""></option>' +
                ' </select> </div>' +
                ' <button type="button"  class="btn btn-danger" id="remove_recipe_row">remove</button>');
            // console.log(increment)

        }

        // this id todo workings
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

        $(document).ready(function () {

            var product_section = $("#attribute_section0");
            var add_more_product_button = $("#add_product_section_button");
            var recipe_section = $("#recipe_section0");
            var add_button = $("#add_recipe_row_button");
            var max = 100;
            var number = 1;


            /*for remove button*/
            $(product_section).on("click", "#remove_recipe_row", function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                // number--;
            });
        });

    </script>

@endsection


{{--@foreach($sizes as $size)
                                <option value="{{$size_value = $size->id }}">{{$size->name}}</option>
                            @endforeach--}}
