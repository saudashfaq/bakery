{{--@extends('layouts.app')--}}
@extends('layouts.appss')
@section('content')
    {{--    @include('inc.sidebar')--}}
    <div class="right_col" role="main">
        {{--    <!-- top tiles -->--}}
        {{--    <div class="row" style="display: inline-block;" >--}}
        <div class="x_panel tile ">
            <div class="main">

                {{--        <a href="/stocks" class=" btn btn-primary">Go Back</a>--}}

                <div class="row">
                    <div class="col-lg-7 margin-tb">
                        <div class="pull-left">
                            <h1>Product page </h1>
                        </div>
                    </div>
                    {{--        </div>--}}

                    {{--Search inputs--}}
                    <div class="col-lg-5 margin-tb">
                        <form type="get" action="{{ route('search.product') }}">
                            <div class="table-responsive " style="width:650px;">
                                <div class="form-group">


                                    <div class="col-md-5  text-align: right">
                                        <label for="search">Search:</label>
                                        <input type="search" class="form-control" name="search" placeholder="Search">
                                        <br>
                                    </div>
                                </div>


                                <button type="submit" style="margin-top: 16px;" class=" btn btn-success"> search
                                </button>


                            </div>


                        </form>
                    </div>
                </div>
                {{--for successs and error messages --}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @foreach($parent_products as $parent_product )

                    <div class="col-md-13">
                        <div>
                            <section class="panell">
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        {{--                                <div class="pro-img-details" >--}}
                                        <div>
                                            <!-- product image -->
                                            <img src="{{url('images', $parent_product->image) }}" alt="cake image"
                                                 class="" width="380" height="260">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="pro-d-title">
                                            <strong>{{$parent_product->title}}</strong>

                                        </h4>
                                        <p>
                                            <!-- Description-->
                                            {{$parent_product->description}}

                                        </p>
                                        <div class="product_meta">
                                            {{--                                    <span class="posted_in"> <strong>Categories:</strong> <a rel="tag" href="#">Jackets</a>, <a rel="tag" href="#">Men</a>, <a rel="tag" href="#">Shirts</a>, <a rel="tag" href="#">T-shirt</a>.</span>--}}
                                            <span class="posted_in"> <strong>Categories:</strong> {{$parent_product->category->name}}</span><br>
                                            <span class="posted_in"> <strong>Brand Name:</strong> {{$parent_product->brand_name}}</span>
                                            {{--                                    <span class="tagged_as"><strong>Size:</strong> {{$product->size}}.</span>--}}
                                            {{--                                    <span class="tagged_as"><strong>Per Piece Cost:</strong> Rs. {{$product->per_piece_price}}</span>--}}
                                        </div>

                                        <p>
                                        {{-- Buttons --}}
                                        <form action="{{ route('product.destroy', $parent_product->id) }}"
                                              method="POST">

                                            <!-- Button for show Recipe  -->
                                            <a class="btn btn-round btn-danger" type="button" style="color: whitesmoke"
                                               data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                               data-attr="{{ route('show.recipe', $parent_product->id) }}"
                                               title="Show recipe">
                                                <i class="fa fa-eye  fa-lg" style="color: whitesmoke"></i> Show Recipe
                                            </a>
{{--                                            @if(auth()->user()->can('Producer'))--}}
{{--                                        @can('producer')--}}
                                            <!-- Produce Button  -->
                                            <a class=" btn btn-round btn-danger" type="button"
                                               data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                               data-attr="{{ route('produce.product', $parent_product->id) }}"
                                               title="Produce product" style="color: whitesmoke">
                                                <i class="fa fa-plus"></i> Produce
                                            </a>
{{--                                        @endcan--}}
{{--                                            @endif--}}

                                            <!-- Edit Button -->
                                        {{--                                    <a class="text-secondary  btn btn-round btn-danger" type="button"--}}
                                        {{--                                       data-toggle="modal" id="mediumButton" data-target="#mediumModal"--}}
                                        {{--                                       data-attr="{{ route('edit.product', $parent_product->id) }} " title="Edit">--}}
                                        {{--                                        <i class="fas fa-edit text-gray-300"></i>Edit--}}
                                        {{--                                       --}}
                                        {{--                                    </a>--}}
                                        <!-- Edit_recipe  Button -->
                                            <a class="btn btn-round btn-danger" type="button"
                                               data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                               data-attr="{{ route('edit.recipe', $parent_product->id) }} " title="Edit"
                                               style="color: whitesmoke">
                                                <i class="fas fa-edit text-gray-300"></i>Edit Recipe

                                            </a>


                                        @csrf
                                        @method('DELETE')

                                        <!-- Delete Button -->
                                            {{--                                    <button class="text-secondary  btn btn-round btn-danger" type="submit"--}}
                                            {{--                                            onclick="return deleteAlert()">--}}
                                            {{--                                        <i class="fas fa-trash fa-lg "></i> Delete--}}
                                            {{--                                    </button>--}}

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
                            <br>
                            {{--                </div>--}}
                            @endforeach
                            {{--                    @endforeach--}}
                        </div>


                    {{--.....AJAX Functionality.........--}}

                    <!-- small modal -->
                        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog"
                             aria-labelledby="smallModalLabel"
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

                    </div>
            </div>
        </div>

    </div>
    <br>

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
        $(document).on('click', '#smallButton', function (event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function () {
                    $('#loader').hide();
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function (event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function () {
                    $('#loader').show();
                },
                // return the result
                success: function (result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function () {
                    $('#loader').hide();
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>



@endsection
