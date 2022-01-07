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
                {{Form::label('items', 'Items')}}
                {{Form::text('items', $stock->items , ['class' =>  'form-control' , 'placeholder' => 'Items' ]) }}

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


