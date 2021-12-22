{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    @include('inc.sidebar')--}}
{{--    <div class="main">--}}
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center font-weight-bolder">
                    <h2 class="font-weight-bold">Produce Product</h2>
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
            <h3 class="font-weight-bold">Require Product Quantity</h3>
        </div>
        <!-- Input for required quantity of product produce -->
        {{--{!! Form::open(['action' => 'App\Http\Controllers\ProductsController@store' , 'method' => 'POST', 'files'=> true]) !!}--}}
        {!! Form::open(['action' => ['App\Http\Controllers\ProductionController@storeProducedProduct' , $parent_product->id ] , 'method' => 'POST']) !!}

        <div class="form-group">
{{--            @foreach($product_attributes as $product_attribute)--}}

{{--                @foreach($product_attribute->attributes as $key => $value)--}}
{{--                    {{$value->attributeHeads->name}}--}}
{{--                    {{$value->name}}--}}


{{--                @endforeach--}}
{{--                --}}{{--                {{dd('stop')}}--}}
{{--            @endforeach--}}

            <div class="col-md-13">
                <label for="size">Select the Product: </label><br>
                <select class="form-control" name="product_id">
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

        <div class="form-group">
            {{Form::label('require_quantity', 'Require Quantity')}}
            {{Form::number('require_quantity', '' , ['class' =>  'form-control' , 'placeholder' => 'Enter Require Quantity' ]) }}

        </div>

        {{Form::submit('submit', ['class' =>  'btn btn-primary'])}}
        {{--        {{Form::hidden('_method' , 'PUT')}}--}}
        {!! Form::close() !!}

{{--    </div>--}}
{{--@endsection--}}


{{--attributes select for produce --}}

{{--<option value="">Select product</option>--}}
{{--<option  value=""> @foreach($product_attributes->attributes as $product_attribute ){{$product_attribute->attributeHeads->name }} : {{$product_attribute->name .','}}  @endforeach</option>--}}
{{--<option value="">abc xyz</option>--}}
