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
        <th>Product</th>
        <th>Category</th>
        <th>Size</th>

    </tr>
    </thead>
    <tbody>

        <tr>

{{--                        <td>jccnjdncceenc</td>--}}
            <td>{{$products->title}}</td>
            <td>{{$products->category->name}}</td>
            <td>{{$products->size}}</td>
{{--            <td>{{$value['unit']}}</td>--}}


{{--                        {{dd('stop')}}--}}
        </tr>

    </tbody>
</table>
<div class="text-center font-weight-bolder">
    <h3 class="font-weight-bold">Require Product Quantity</h3>
</div>
    <!-- Input for required quantity of product produce -->
{{--{!! Form::open(['action' => 'App\Http\Controllers\ProductsController@store' , 'method' => 'POST', 'files'=> true]) !!}--}}
        {!! Form::open(['action' => ['App\Http\Controllers\ProductionController@storeProducedProduct' , $products->id ] , 'method' => 'POST']) !!}
        <div class="form-group">
        {{Form::label('require_quantity', 'Require Quantity')}}
        {{Form::number('require_quantity', '' , ['class' =>  'form-control' , 'placeholder' => 'Enter Require Quantity' ]) }}

        </div>
            {{Form::submit('submit', ['class' =>  'btn btn-primary'])}}
{{--        {{Form::hidden('_method' , 'PUT')}}--}}
            {!! Form::close() !!}
