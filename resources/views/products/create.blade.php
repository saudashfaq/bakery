@extends('layouts.app')
@section('content')

    <h1> Add Product </h1>
    <div class="row" >
    <div class="col-md-8 col-md-offset-2">
    {!! Form::open(['action' => 'App\Http\Controllers\ProductsController@store' , 'method' => 'POST', 'files'=> true]) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '' , ['class' =>  'form-control' , 'placeholder' => 'Title' ]) }}

    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', '' , ['class' =>  'form-control' , 'placeholder' => 'Description' ]) }}

    </div>
{{--        <div class="form-group">--}}
{{--            {{Form::label('price', 'Price')}}--}}
{{--            {{Form::text('price', '' , ['class' =>  'form-control' , 'placeholder' => 'Price' ]) }}--}}

{{--        </div>--}}
    <div class="form-group">
        {{Form::label('category_id', 'Category')}}
        {{Form::select('category_id', $categories , null ,['class' =>  'form-control' , 'placeholder' => 'Select Categories' ]) }}

    </div>
        <div class="form-group">
            {{Form::label('size', 'Size')}}
            {{Form::select('size', ['1pond'=>'1 Pond' , '2pond'=>'2 Pond' , 'large'=>'Large'], '' , ['class' =>  'form-control' , 'placeholder' => 'Size' ]) }}

        </div>
    <div class="form-group">
        {{Form::label('image', 'Image')}}
        {{Form::file('image', ['class' =>  'form-control' , 'placeholder' => 'Image' ]) }}

    </div>
    {{Form::submit('submit', ['class' =>  'btn btn-primary'])}}

    {!! Form::close() !!}
    </div>
    </div>

@endsection

