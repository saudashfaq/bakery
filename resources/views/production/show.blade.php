

<!-- Button trigger modal -->
<div  id="showexampleModalCenter" data-toggle="modal" data-target="#exampleModalCenter">

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
{{--    <div class="modal-dialog modal-dialog-centered" role="document">--}}
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> <h2 class="modal-title text-center" id="exampleModalLongTitle">Product recipe</h2>
            </div>
            <div class="modal-body" id="modalsBody">
                <table class="table table-bordered table-responsive-lg table-hover ">
                    <thead class="thead-dark " >
{{--                    <div class=" "><h2> Product recipe </h2></div>--}}
                    <tr>
                        <th style="width:50%">	Items</th>
                        <th style="width:17%"> 	&nbsp;Quantity</th>
                        <th style="width:20%">Unit</th>

                    </tr>
                    </thead>
                    <tbody  id="tablebody">

                    </tbody>
                </table>

            </div>
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                <button type="button"  id="closemodal" class="btn btn-primary"  >Close</button>

            </div>
        </div>


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center font-weight-bolder">
            <h2 class="font-weight-bold">Produce Detail </h2>
        </div>

        {{-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i
                    class="fas fa-backward "></i> </a>
        </div> --}}
    </div>
</div>
{{--{{dd('produce page')}}--}}
{{--.................................................--}}
{{--    {{$products}}--}}
{{--.................................--}}
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
{{--...............--}}
<div>
    {{--        {{$products->title}}--}}
</div>
<table class="table table-bordered table-responsive-lg table-hover">
    <thead class="thead-dark">
    {{--            <div class="align-content-center"><h2>  Product recipe </h2></div>--}}
    <tr>
        <th>Product Title</th>
        <th>Category</th>
        {{--        <th>Size</th>--}}

    </tr>
    </thead>
    <tbody>

    <tr>

        <td>{{$parent_product->title}}</td>
        <td>{{$parent_product->category->name}}</td>
        {{--            <td>{{$products->size}}</td>--}}
        {{--            <td>{{$value['unit']}}</td>--}}


    </tr>

    </tbody>
</table>
<div class="text-center font-weight-bolder">
    <h3 class="font-weight-bold">Select Product Attribute to show Recipe </h3>
</div>
<!-- Input for required quantity of product produce -->

{{--{!! Form::open(['action' => ['App\Http\Controllers\ProductionController@storeProducedProduct' , $parent_product->id ] , 'method' => 'POST']) !!}--}}
{{--<form>--}}
<div class="form-group">
<div id="showRecipe">
    <div class="col-md-13">
{{--        <label for="size">Select the Product: </label><br>   onchange="check(value)--}}
        <select class="form-control" name="product_id"  id="selectBox" >
            <option value="">Select product</option>

            @foreach($product_attributes as $product_attribute)
                <option value="{{$product_attribute->id}}"> @foreach($product_attribute->attributes as $key => $value)
                        {{$value->attributeHeads->name}}
                        : {{$value->name}}
                    @endforeach
                </option>

            @endforeach
        </select>
        {{--                {{$product_attribute->name}}--}}
        {{--        {{Form::label('size', 'Select the Size')}}<br>--}}
        {{--        {{Form::select('size' , ['class' =>  'form-control' , 'placeholder' => 'Size' ]) }}--}}
    </div>
</div>
</div>
{{--    <div align="center">--}}

{{--    <button  class="btn btn-block btn-success " style="width:450px; " onclick="check()"> Show Recipe</button>--}}
{{--</div>--}}
{{--{{Form::submit('submit', ['class' =>  'btn btn-primary'])}}--}}
{{--        {{Form::hidden('_method' , 'PUT')}}--}}
{{--{!! Form::close() !!}--}}

<script>

    $(document).on('click', '#closemodal', function () {

            $('#exampleModalCenter').hide();

    });
    $('#closemodal').click(function() {
        $('#modalwindow').modal('hide');
    });

    $('#selectBox').on('change', function (e){
        console.log(e);
        var product_id = e.target.value;
        console.log(product_id)
        $('#showexampleModalCenter').click();

        //ajax
        $.get('/ajax-productRecipe?product_id=' + product_id, function (data) {
            // var index = count;
            // success data
            console.log(data);


            // $('#attribute0').empty();
            $('#tablebody').empty();
            $.each(data, function (index, productObj) {

                // for (var i = 0; i < productObj.stocks.length; i++) { console.log(productObj.stocks[i]['items']); }

                // console.log( productObj.stocks );
                for (var i = 0; i < productObj.stocks.length; i++) {
                $('#tablebody').append(' <tr> <td>'+productObj.stocks[i]["items"]+'</td> ' +
                    ' <td>'+productObj.stocks[i].pivot["quantity"]+'</td>' +
                    '<td>'+productObj.units[i]['name']+'</td></tr>')};

            });
        });




    });

</script>


