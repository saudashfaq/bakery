
@extends('layouts.app')
@section('content')
    @include('inc.sidebar')
 <div class="main">
    <div class="align-content-center" ><h2>Products</h2>
    <a href="/products/create" class=" btn btn-primary">Add products</a>
{{--    <a href="/products" class=" btn btn default">Go back </a>--}}
        @foreach($products as $product)
            <h1>{{$product->title}}</h1>
            <div class="img-wrapper">
                  <!-- product image -->
                <img src="{{url('images', $product->image) }}" width="200" height="200">

            <div>
                {{$product->description}}
            </div>

            <hr>
            <small>Written on  {{$product->created_at}}</small>
        @endforeach

 </div>
    </div></div>
{{--    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>--}}

{{--    --}}{{-- Delete --}}
{{--    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy' ,  $post->id ], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
{{--    {{Form::hidden('_method' , 'DELETE')}}--}}
{{--    {{Form::submit('Delete' ,['class'=>'btn btn-danger'])}}--}}
{{--    {!! Form::close() !!}--}}

@endsection

