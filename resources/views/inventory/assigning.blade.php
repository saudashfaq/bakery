<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center font-weight-bolder">
            <h1>Assign Inventory </h1>
        </div>
        {{-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i
                    class="fas fa-backward "></i> </a>
        </div> --}}
    </div>
</div>

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

        <td>sample product</td>
        <td>cake</td>
        {{--            <td>{{$products->size}}</td>--}}
        {{--            <td>{{$value['unit']}}</td>--}}


    </tr>

    </tbody>
</table>
{{--{--{!! Form::open(['action' => ['App\Http\Controllers\ProductionController@assigendInventory'] , 'method' => 'POST']) !!}--}}
<form method="post" action="{{ route('assigned.inventory',$product->id) }}">

    <div class="form-group">
        <div class="col-md-13">
            <label for="size">Select the outlet: </label><br>
            <select class="form-control" name="outlet_id">
                <option value="">Select outlet</option>

                @foreach($outlets as $outlet)
                    <option value="{{$outlet->id}}">
                        {{$outlet->outlet_name}}
                        : {{$outlet->location}}
                        @endforeach
                    </option>
            </select>
        </div>
    </div>

    <div class="form-group">
        {{Form::label('product_quantity', 'Product Quantity')}}
        {{Form::number('product_quantity', '' , ['class' =>  'form-control' , 'placeholder' => 'Enter Product Quantity' ]) }}

    </div>
    <div align="center">
        <br>
        <button type="submit" class="btn btn-block btn-success btn-large"> Assign
        </button>
    </div>
    {{--<div class="text-center">--}}
    {{--{{Form::submit('Assign', ['class' =>  'btn btn-primary'])}}--}}
    {{--</div>--}}
    {{--{!! Form::close() !!}--}}

    @csrf
</form>
