{{-- @extends('layouts.app')
@section('content') --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center font-weight-bolder">
            <h2 class="font-weight-bold">Edit Stock</h2>
        </div>
        {{-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i
                    class="fas fa-backward "></i> </a>
        </div> --}}
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
{!! Form::open(['action' => ['App\Http\Controllers\StocksController@update' , $stock->id ] , 'method' => 'POST']) !!}
{{--            {!! Form::open(['action' => 'App\Http\Controllers\StocksController@store' , 'method' => 'POST']) !!}--}}


            <div class="form-group">
                {{Form::label('product', 'Product')}}
                {{Form::text('product', $stock->product , ['class' =>  'form-control' , 'placeholder' => 'Product' ]) }}

            </div>
{{--..........................--}}
{{----}}
            <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::number('price', $stock->price  , ['class' =>  'form-control' , 'placeholder' => 'price' ]) }}
{{--                {{dd($stocks, $unit)}}--}}
            </div>

            <div class="form-group">
                {{Form::label('unit_id', 'Unit')}}
                {{Form::select('unit_id',$unit, ['class' =>  'form-control' , 'placeholder' => $stock->unit_id ]) }}

            </div>
            <div class="form-group">
                {{Form::label('quantity', 'Quantity')}}
                {{Form::number('quantity', $stock->quantity , ['class' =>  'form-control' , 'placeholder' => 'Quantity'  ]) }}

            </div>

        {{Form::hidden('_method' , 'PUT')}}
        {{Form::submit('submit', ['class' =>  'btn btn-primary'])}}


{!! Form::close() !!}




{{--............................................................................--}}

{{--//////////////////////////////--}}
{{--            <h1> Edit Post </h1>--}}
{{--<form action="{{ route('stocks.update', $stock->id) }}" method="POST">--}}
{{--    @csrf--}}
{{--    @method('PUT')--}}

{{--    <div class="row">--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Name:</strong>--}}
{{--                <input type="text" name="name" value="{{ $project->name }}" class="form-control" placeholder="Name">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Introduction:</strong>--}}
{{--                <textarea class="form-control" style="height:50px" name="introduction"--}}
{{--                          placeholder="Introduction">{{ $project->introduction }}</textarea>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Location:</strong>--}}
{{--                <input type="text" name="location" class="form-control" placeholder="{{ $project->location }}"--}}
{{--                       value="{{ $project->location }}">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Cost:</strong>--}}
{{--                <input type="number" name="cost" class="form-control" placeholder="{{ $project->cost }}"--}}
{{--                       value="{{ $project->cost }}">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--            <a class="btn btn-primary" href="" data-dismiss="modal"> Cancel</a>--}}


{{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</form>--}}
