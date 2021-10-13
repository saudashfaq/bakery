q
{{--   {{-- @extends('layouts.app')
@section('content') --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center font-weight-bolder">
            <h2 class="font-weight-bold">update Price</h2>
        </div>
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('stocks.index') }}" title="Go back"> <i
                    class="fas fa-backward "></i> </a>
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
            {{--{!! Form::open(['action' => ['update' , $stock->id ] , 'method' => 'POST']) !!}--}}
        {!! Form::open(['action' => ['App\Http\Controllers\PriceUpdateRM@updatePrice'  , $stock->id ], 'method' => 'POST']) !!}


            <div class="form-group">
                {{Form::label('product', 'Product')}}
                {{Form::text('product', $stock->product , ['class' =>  'form-control' , 'placeholder' => 'Product' , 'readonly' ]) }}

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
                {{Form::select('unit_id',$unit, [ 'class' =>  'form-control' , 'placeholder' => $stock->unit_id  ]) }}

            </div>
            <div class="form-group">
                {{Form::label('quantity', 'Quantity')}}
                {{Form::number('quantity', $stock->quantity , ['class' =>  'form-control' , 'placeholder' => 'Quantity'  ,'readonly']) }}

            </div>

            {{Form::hidden('_method' , 'PUT')}}
            {{Form::submit('submit', ['class' =>  'btn btn-primary'])}}


            {!! Form::close() !!}


        </tbody>
    </table>
</div>
{{--    .......................................................--}}
