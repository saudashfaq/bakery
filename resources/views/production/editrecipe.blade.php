{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    @include('inc.sidebar')--}}
{{--    <div class="main">--}}

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center font-weight-bolder">
            <h2 class="font-weight-bold"> Edit Product</h2>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div>
</div>
<table class="table table-bordered table-responsive-lg table-hover">
    <thead class="thead-dark">
    {{--            <div class="align-content-center"><h2>  Product recipe </h2></div>--}}
    <tr>
        <th>Product Title</th>
        <th>Category</th>
        <th>Brand Name</th>
    </tr>
    </thead>
    <tbody>
    <tr>

        <td>{{$parent_product->title}}</td>
        <td>{{$parent_product->category->name}}</td>
        <td>{{$parent_product->brand_name}}</td>

    </tr>

    </tbody>
</table>
<div class="text-center font-weight-bolder">
    <h3 class="font-weight-bold">Seclect the Attribute for edit</h3>
</div>
{!! Form::open(['action' => ['App\Http\Controllers\ProductionController@editAbleRecipe' , $parent_product->id ] , 'method' => 'POST']) !!}

<div class="form-group">


    <div class="col-md-13">
        <label for="size">Select the Size: </label><br>

        <select class="form-control" name="product_id" id="edit">
            <option value="">Select product</option>

            @foreach($products as $key => $product_attribute)

                <option
                    @for($count = 0; $count < count($inventory_productIds); $count++) {{ ($product_attribute->id) ==  $inventory_productIds[$count] ? 'disabled' : '' }}  @endfor value="{{$product_attribute->id}}" >
                    @foreach($product_attribute->attributes as $key => $value)
                        {{$value->attributeHeads->name}}
                        : {{$value->name}}
                    @endforeach

                </option>


                {{--                @else--}}
                {{--                    <option value="{{$product_attribute->id}}" > @foreach($product_attribute->attributes as $key => $value)--}}
                {{--                            {{$value->attributeHeads->name}}--}}
                {{--                            : {{$value->name}}--}}
                {{--                        @endforeach--}}

                {{--                </option>--}}
                {{--                @endif--}}
            @endforeach

        </select>

    </div>
    <br>


    {{--{{Form::submit('Edit', ['class' =>  'btn btn-danger'])}}--}}

    <div align="center">

        <button class="btn btn-block btn-primary" style="width:120px; ">Edit</button>
    </div>

</div>
<div class="text-center" style=" margin: auto;width: 422px; border-style: ridge; font-size:13px"><span  style="color:red" >  Note:</span> Disable option is not
    editable because product exist in inventory
</div>

{!! Form::close() !!}
