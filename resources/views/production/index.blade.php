@extends('layouts.app')

@section('content')
    @include('inc.sidebar')
    <div class="main">
{{--<h1> this is products index page</h1>--}}
{{--for successs and error messages --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @foreach($products as $product )

                <div class="col-md-13">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div class="pro-img-details">
                                    <!-- product image -->
                                    <img src="{{url('images', $product->image) }}" alt="cake image">
                                </div>
{{--                                <div class="pro-img-list">--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="https://via.placeholder.com/115x100/87CEFA/000000" alt="">--}}
{{--                                    </a>--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="https://via.placeholder.com/115x100/FF7F50/000000" alt="">--}}
{{--                                    </a>--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="https://via.placeholder.com/115x100/20B2AA/000000" alt="">--}}
{{--                                    </a>--}}
{{--                                    <a href="#">--}}
{{--                                        <img src="https://via.placeholder.com/120x100/20B2AA/000000" alt="">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-md-6">
                              <h4 class="pro-d-title">
{{--                                    <a href="#" class="">--}}
                                        <strong>{{$product->title}}</strong>
{{--                                        Leopard Shirt Dress--}}
{{--                                    </a>--}}
                                </h4>
                                <p>
                                        <!-- Description-->
                                    {{$product->description}}
                                        {{--Recipe--}}

{{--                                    {{dd($product['recipe'])}}--}}



{{--                                <pre></pre>--}}
                                {{--            {{gettype($product['recipe'])}}--}}
                                    <br>
{{--                                {{$count = !empty($product['recipe']) ? count($product['recipe']): 0}}--}}
                                {{--            {{dump([123, 34])}}--}}
                                {{--            {{dump($product['recipe'])}}--}}
                                {{--        <br>--}}
                                {{--        <br>--}}
                                {{--        <br>--}}
                                    <br>
{{--                                    {{dd($product->recipe)}}--}}
{{--                                    {{dd($product['recipe'])}}--}}
                        <!-- ....................................................-->
{{--                                    @foreach($product->recipe as $key => $value)--}}
{{--                                        {{$value['quantity']}}--}}

{{--                                    @endforeach--}}
{{--                                    {{dd('stop')}}--}}
                        <!--  .................................................... -->
{{--                                @for($i = $count-1; $i > 0; $i--)--}}

{{--                                    --}}{{--            {{var_dump($product['recipe'][$i]['item'])}}--}}
{{--                                    <br>--}}
{{--                                    {{$product['recipe'][$i]['item']}}--}}
{{--                                    <br>--}}
{{--                                                {{'Quantity' . $product['recipe'][$i]['quantity']}}--}}
{{--                                                <br>--}}
{{--                                                    {{$product['recipe'][$i]['unit']}}--}}


{{--                                    @endfor--}}
                                    {{--            {{dump($product['recipe'])}}--}}
                                    {{--            @foreach($product['recipe'] as $p)--}}
                                    {{--                {{var_dump($p)}}--}}
                                    {{--            @endforeach--}}
                                    {{--                 @continue(1);--}}





                                    {{--                                    {{$product->recipe}}--}}

{{--                                    {{var_dump(json_decode($product->recipe))}}--}}


{{--                                    {{$recipe = json_decode($product['recipe'], true)}}--}}
{{--                                    {{var_dump($product['recipe'])}}--}}

{{--                                        {{dd($recipe  )}}--}}
{{--                                    {{$recipe = json_decode($product['recipe'], true)}}--}}

{{--                                        <ul>{{gettype($recipe)}}--}}
{{--                                            {{dump($product['recipe'])}}--}}
{{--                                            @foreach($recipe as $index => $rs)--}}
{{--                                                <li> {{$index}}  {{dump($rs)}}</li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}

{{--                                    {{($product->recipe[0]["item"])}}--}}
{{----}}

{{--                                    @foreach ($product->recipe as $key =>  $w)--}}
{{--                                        {{ $key }}--}}
{{--                                    @endforeach--}}

{{--                                    Praesent ac condimentum felis. Nulla at nisl orci, at dignissim dolor, The best product descriptions address your ideal buyer directly and personally. The best product descriptions address your ideal buyer directly and personally.--}}
                                </p>

                    <div class="product_meta">
{{--                                    <span class="posted_in"> <strong>Categories:</strong> <a rel="tag" href="#">Jackets</a>, <a rel="tag" href="#">Men</a>, <a rel="tag" href="#">Shirts</a>, <a rel="tag" href="#">T-shirt</a>.</span>--}}
                        <span class="posted_in"> <strong>Categories:</strong> {{$product->category->name}}</span>
                        <span class="tagged_as"><strong>Size:</strong> {{$product->size}}.</span>
                    </div>
{{--                                <div class="m-bot15"> <strong>Price : </strong> <span class="amount-old">$544</span>  <span class="pro-price"> $300.00</span></div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Quantity</label>--}}
{{--                                    <input type="quantiy" placeholder="1" class="form-control quantity">--}}
{{--                                </div>--}}
                    <p>
                        {{-- Buttons --}}
            <form action="{{ route('stocks.destroy', $product->id) }}" method="POST">

                            <!-- Button for show Recipe per piece  -->
{{--                    <a data-toggle="modal" id="smallButton" data-target="#smallModal"--}}
{{--                       data-attr="{{ route('show.recipe', $product->id) }}" title="show"  class="btn btn-round btn-danger" type="button">--}}
{{--                        <i class="fas fa-eye text-successn  fa-lg"></i> Show Recipe--}}
{{--                    </a>--}}

                <!-- Button for show Recipe per piece  -->
                    <a class="text-secondary  btn btn-round btn-danger" type="button"  data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                       data-attr="{{ route('show.recipe', $product->id) }}" title="Show recipe" >
                        <i class="fas fa-eye text-successn  fa-lg"></i> Show Recipe
                    </a>
                        <!-- Produce Button  -->
                    <a class="text-secondary  btn btn-round btn-danger" type="button"  data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                       data-attr="{{ route('produce.product', $product->id) }}" title="Produce product" >
                        <i class="fa fa-plus" ></i> Produce
                    </a>

                    <!-- Edit Button -->
                    <a class="text-secondary  btn btn-round btn-danger" type="button" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                       data-attr="{{ route('stocks.edit', $product->id) }} " title="Edit">
                        <i class="fas fa-edit text-gray-300"></i>Edit
                    </a>


                    @csrf
                    @method('DELETE')

                    <!-- Delete Button -->
                    <button class="text-secondary  btn btn-round btn-danger" type="submit" onclick="return deleteAlert()">
                        <i class="fas fa-trash fa-lg "></i> Delete
                    </button>

                        {{--                        for price  update--}}{{--//onclick="return confirm('Are you sure?')"--}}



            </form>
{{--                                    <button class="btn btn-round btn-danger" type="button"><i class="fas fa-eye  fa-lg"></i> Show Recipe</button>--}}
{{--                                    <button class="btn btn-round btn-danger" type="button"><i class="fa fa-shopping-cart"></i>Produce</button>--}}
{{--                                    <button class="btn btn-round btn-danger" type="button"><i class="fas fa-edit text-gray-300"></i> Edit</button>--}}
{{--                                    <button class="btn btn-round btn-danger" type="button"><i class="fa fa-shopping-cart"></i>Delete</button>--}}
                                </p>
                            </div>
                        </div>
                    </section>
{{--                </div>--}}
                    @endforeach
{{--                    @endforeach--}}
            </div>


        {{--.....AJAX Functionality.........--}}

    <!-- small modal -->
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="smallBody">
                        <div>
                        {{--                        @include('stocks.show')--}}
                        <!-- the result to be displayed apply here -->
                            {{--   .................--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- medium modal -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mediumBody">
                        <div>
                            <!-- the result to be displayed apply here -->

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // display a modal (small modal)
            $(document).on('click', '#smallButton', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#smallModal').modal("show");
                        $('#smallBody').html(result).show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 8000
                })
            });
            // display a modal (medium modal)
            $(document).on('click', '#mediumButton', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#mediumModal').modal("show");
                        $('#mediumBody').html(result).show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 8000
                })
            });
        </script>


    </div>

@endsection
{{--...............OLD................--}}
{{--<div>--}}
{{--    {{$product->title}}--}}
{{--    {{$product->description}}--}}
{{--    {{$product->size}}--}}
{{--    <img src="{{url('images', $product->image) }}" width="200" height="200">--}}
{{--    --}}{{--                {{$product->image}}--}}
{{--    {{$product->recipe}}--}}
{{--</div>--}}
