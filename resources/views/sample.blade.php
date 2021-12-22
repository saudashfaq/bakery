@extends('layouts.app')

@section('content')
    @include('inc.sidebar')

    @foreach($parent_products as $parent_product )

        <div class="main">
            <div class="col-md-13"  ><div >
                    <section class="panell">
                        {{--                        <div class="panel-body" style="border-style: double" >--}}
                        <div class="panel-body" >
                            <div class="col-md-6">
                                {{--                                <div class="pro-img-details" >--}}
                                <div>
                                    <!-- product image -->
                                    <img src="{{url('images', $parent_product->image) }}" alt="cake image" class="rounded-circle"  width="380" height="260">
                                </div>
                                {{--                                <div class="pro-img-list">--}}
                                {{--                                    <a href="#">--}}
                                {{--                                        <img src="https://via.placeholder.com/115x100/87CEFA/000000" alt="">--}}
                                {{--                                    </a>--}}
                                {{--
                                {{--                                </div>--}}
                            </div>
                            <div class="col-md-6">
                                <h4 class="pro-d-title">
                                    {{--                                    <a href="#" class="">--}}
                                    <strong>{{$parent_product->title}}</strong>
                                    {{--                                        Leopard Shirt Dress--}}
                                    {{--                                    </a>--}}
                                </h4>
                                <p>
                                    <!-- Description-->
                                    {{$parent_product->description}}

                                </p>
                                <br>
                                <div class="product_meta">
                                    {{--                                    <span class="posted_in"> <strong>Categories:</strong> <a rel="tag" href="#">Jackets</a>, <a rel="tag" href="#">Men</a>, <a rel="tag" href="#">Shirts</a>, <a rel="tag" href="#">T-shirt</a>.</span>--}}
                                    <span class="posted_in"> <strong>Categories:</strong> {{$parent_product->category->name}}</span>
                                    {{--                            <span class="tagged_as"><strong>Size:</strong> {{$product->size}}.</span>--}}
                                    {{--                            <span class="tagged_as"><strong>Per Piece Cost:</strong> Rs. {{$product->per_piece_price}}</span>--}}
                                </div>

                                <!-- Button for show Recipe per piece  -->
                                <a class="text-secondary  btn btn-round btn-danger" type="button"
                                   href="{{ route('show.recipe', $parent_product->id) }}" title="Show recipe" >
                                    <i class="fas fa-eye text-successn  fa-lg"></i> Show Recipe
                                </a>

                                {{-- for edit button  --}}
                                <a class="text-secondary  btn btn-round btn-danger" type="button"
                                   href="{{ route('edit.recipe', $parent_product->id) }}" title="Edit">
                                    <i class="fas fa-edit text-gray-300"></i>Edit
                                </a>

                                <!-- for produce button      -->
                                <a class="text-secondary  btn btn-round btn-danger" type="button"

                                   href="{{ route('produce.product', $parent_product->id) }}" title="Produce product">
                                    <i class="fa fa-plus"></i> Produce
                                </a>
                            </div>
                        </div>
                    </section>
                    <br>
                    {{--                </div>--}}

                    {{--                    @endforeach--}}
                </div>
            </div></div>     @endforeach
@endsection
