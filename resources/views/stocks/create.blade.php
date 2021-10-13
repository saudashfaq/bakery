{{--<h2> this is create page</h2>--}}
{{-- @extends('layouts.app')
@section('content') --}}

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2 class="font-weight-bold">Add Stock</h2>
        </div>

    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    {!! Form::open(['action' => 'App\Http\Controllers\StocksController@store' , 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('product', 'Product')}}
        {{Form::text('product', '' , ['class' =>  'form-control' , 'placeholder' => 'Product' ]) }}

    </div>
    <div class="form-group">
        {{Form::label('price', 'Price')}}
        {{Form::number('price', '' , ['class' =>  'form-control' , 'placeholder' => 'price' ]) }}
        {{--{{dd($stocks, $unit)}}--}}
    </div>
    <div class="form-group">
        {{Form::label('unit_id', 'Unit')}}
        {{Form::select('unit_id', $unit , null , ['class' =>  'form-control' , 'placeholder' => 'Select Unit' ]) }}

    </div>
    <div class="form-group">
        {{Form::label('quantity', 'Quantity')}}
        {{Form::number('quantity', '' , ['class' =>  'form-control' , 'placeholder' => 'Quantity' ]) }}

    </div>

    {{Form::submit('submit', ['class' =>  'btn btn-primary'])}}

    {!! Form::close() !!}


{{-- @endsection --}}
