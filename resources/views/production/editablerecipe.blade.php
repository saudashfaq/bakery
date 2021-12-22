@extends('layouts.app')

@section('content')
    @include('inc.sidebar')

    {{--{{dump($pivotStocks)}}--}}

    <div class="main">
        <div style="margin-left:100px;">

            <div style="margin-left:200px;"><h2>Edit Recipe  </h2></div>
            <br>

        <form method="post" action="{{ route('update.recipe' , $products->id) }}">
            {{ csrf_field() }}
            <div class="table-responsive " style="width:650px;">

                <div id="product_section">

                    <div class="border border-dark">

                        <table class="table table-bordered" id="item_table">
                            <tr>
                                <th>Enter Item Name</th>
                                <th>Enter Quantity</th>
                                <th>Select Unit</th>
                            </tr>
                            <tbody>
                            <td>
                                @for($count = 0  ; $count < count($pivotStocks); $count++)
                                    <div class="form-group mb-2">
                                        <select class="form-control" id="item_id2"
                                                name="product[0][recipe][{{$count}}][item]">
                                            {{--                                            <option value="">Select item</option>--}}
                                            @foreach($stocks as $key=> $stock)

                                                <option
                                                    value="{{ $stock->id }}" {{ ( $stock->id == $pivotStocks[$count]) ? 'selected' : '' }}> {{ $stock->items }} </option>

                                            @endforeach
                                        </select>
                                        @endfor
                                    </div>
                            </td>

                            <td>

                                <div class="form-group mb-2">
                                    {{--<label for="Item">Quantity: </label>--}}
                                    {{--                                        @for($count = 0  ; $count < count($pivotStocks); $count++)--}}
                                    @foreach($products->stocks  as $key =>$stock)

                                        <input type="number" value="{{$stock->pivot->quantity}}"
                                               class="form-control" name="product[0][recipe][{{$key}}][quantity] ">
                                    @endforeach
                                </div>

                            </td>
                            <td>
                                @for($count = 0  ; $count < count($pivotunit_id); $count++)
                                    <div class="form-group mb-2">

                                        <select class="form-control" name=product[0][recipe][{{$count}}][unit_id]">
                                            @foreach($unitAll as $key=> $unit)
                                                <option
                                                    value="{{ $unit->id }}" {{ ( $unit->id == $pivotunit_id[$count]) ? 'selected' : '' }}> {{ $unit->name }} </option>
                                            @endforeach
                                        </select>
                                        @endfor
                                    </div>

                            </td>
                            <td>
                                {{--                                @for($count = 0  ; $count < count($pivotunit_id); $count++)--}}
                                <button type="button" id="add_recipe_row_button"
                                        class="btn btn-success mb-2 "
                                        onclick="addRow(0)" style="width:70px;"> Add
                                </button>
                                {{--@endfor--}}
                            </td>


                            </tbody>
                        </table>
                        <div id="recipe_section0" class="border border-white">

                        </div>

                    </div>
                </div>

                <div align="center">
                    <br>
                    <button type="submit" class="btn btn-block btn-success btn-large"> Update
                    </button>
                </div>
            </div>
            @csrf
        </form>
        </div>
    </div>



    <script>

        var count = 1;
        var increment = {{$count}};
        var increment2 = 0;


        /*for add new Row*/
        function addRow(index) {

            $('#recipe_section' + index).append('<div class=" form-inline">' +
                '<label for="Item">Item: </label><select onchange="validateSameFields(' + this + ')" class="form-control" id="items_id" name="product[' + index + '][recipe][' + increment + '][item]">   <option value="" >Select item</option> @foreach($stocks as $stock)<option value="{{$stock->id}}">{{$stock->items}}</option>@endforeach</select>' +
                ' <label for="quantity">Quantity:</label><input type="number" class="form-control" name="product[' + index + '][recipe][' + increment + '][quantity]" placeholder="Quantity">' +
                ' <label for="unit">Unit:</label>  <select class="form-control" name="product[' + index + '][recipe][' + increment + '][unit_id]"> @foreach($unitAll as $unit)<option value="{{$unit->id}}">{{$unit->name}}</option>@endforeach
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
        {{--function addProduct_section(product_section) {--}}
        {{--    // var add = index;--}}
        {{--    var index = count;--}}

        {{--    var increment = 0;--}}

        {{--    // console.log(index)--}}
        {{--    // console.log(increment++)--}}
        {{--    $(product_section).append('<br><div id="recipe_section' + count + '"> <label for="size">Size: </label><select class="form-control" id="select_append" name="product[' + count + '][size]">  ' +--}}
        {{--        '<option disabled selected>Select Size</option>@foreach($sizes as $size)<option value="{{$size->id}}">{{$size->name}}</option>@endforeach</select> ' +--}}
        {{--        '<div class=" form-inline"><label for="Item">Item:</label><select class="form-control" name="product[' + index + '][recipe][' + count + '][item]"> <option disabled selected>Select item</option>@foreach($stocks as $stock)<option value="{{$stock->id}}">{{$stock->items}}</option>@endforeach</select>' +--}}
        {{--        '<label for="quantity">Quantity:</label><input type="number" class="form-control" name="product[' + index + '][recipe][' + count + '][quantity]"  placeholder="Quantity">' +--}}
        {{--        '<label for="unit">Unit:</label>   <select class="form-control" name="product[' + index + '][recipe][' + count + '][unit_id]"> @foreach($unitAll as $unit)<option value="{{$unit->id}}">{{$unit->name}}</option>@endforeach</select>  <button type="button"  ' +--}}
        {{--        'onclick="addRow(' + index + ')" id="add_recipe_row_button" class="btn btn-success mb-2"   style="width:70px;"> Add</button></div></div>' +--}}
        {{--        '<button type="button" class="btn btn-danger" onclick="removeProductSection(' + this + ')" id="remove_product_sections ">remove Product</button>');--}}


        {{--    count++;--}}
        {{--}--}}

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
