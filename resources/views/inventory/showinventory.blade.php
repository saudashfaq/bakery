{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')
    <!-- Button trigger modal -->
{{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--        Launch demo modal--}}
{{--    </button>--}}

    <!-- Modal -->

    <div class="right_col" role="main">

        <div class="x_panel tile ">

            <div class="main">
            @include('inc.messages')
                <div class="col-12">


                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h4>Inventory </h4>
                        </div>


                        {{--                    </div>--}}
                    </div>
                    <table id="datatableid"
                           class="table table-striped  table table-bordered table-responsive-lg table-hover myTable">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 90px ">Brand Name</th>
                            <th scope="col" style="width: 160px ">Attributes</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col">Cost per piece</th>
                            <th scope="col">Selling Price</th>
                            <th scope="col">Action</th>
                            {{--                        <th> </th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($inventories as $inventory)
                            <td><img src="{{url('images', $inventory->products->parent_product->image) }}"
                                     alt="cake image" width="130" height="75"></td>
                            <td>{{$inventory->products->parent_product->title}}</td>
                            <td>{{$inventory->products->parent_product->brand_name}}</td>

                            <td>   @foreach ($inventory->products->attributes as $attribute)

                                    {{$attribute->attributeHeads->name}}
                                    : {{$attribute->name}}

                                @endforeach</td>

                            @if($inventory->product_quantity > 0)
                                <td> In Stock</td>
                            @else
                                <td> Out of Stock</td>
                            @endif


                            <span class="badge badge-primary badge-pill"></span>

                            <td class="text-center">{{$inventory->product_quantity }} </td>

                            <td class="text-center" style="width:120px">{{$inventory->cost_per_piece}}</td>

{{--                            @if($inventory->selling_price_per_piece == !null)--}}

                                <td class="text-center" style="width:120px" title="Click to change ">
                                    @if($inventory->selling_price_per_piece == !null)

                                    <a   type="button"  data-toggle="modal" data-target="#exampleModal2">
                                        {{$inventory->selling_price_per_piece }}
                                    </a>

                                                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                     <div class="modal-dialog" role="document">

                                                         <div class="modal-content">
                                                             <div class="modal-header">
                                                                 <h5 class="modal-title text-lg-center bold" id="exampleModalLabel" style="margin-left: 70px; color: #495057"><strong> Reset the Selling Price of Product </strong></h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                             </div>
                                                             <div class="modal-body">
                                                                 <form id="reset_price_form" method = "POST" action="{{route('storeProduced.Product' , $inventory->id)}}">
{{--                                                        <input type="hidden" >--}}
                                                        <div class="form-group">
                                                            <div class="col-md-12" style=" color: #495057">
                                                                <label><h2 >Reset Selling Price </h2></label>
                                                                <input type="text" class="form-control @error('selling_price_per_piece') is-invalid @enderror " name="reset_price_per_piece"
                                                                       id="email" placeholder="Rset Selling Price" required autocomplete="reset_price_per_piece">
                                                                @error('reset_price_per_piece')
                                                                <span class="invalid-feedback" role="alert">
                                                                 <strong>{{ $message }}</strong> </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" id="reset_price_form" class="btn btn-primary">Reset </button>
                                                </div>
                                                @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                    //calculate profit
                                        $profit  = $inventory->selling_price_per_piece - $inventory->cost_per_piece ;
                                        $profit_percentage = $profit/$inventory->cost_per_piece * 100;
                                    @endphp

                                    {{--for toolip display--}}
                                    <a   data-toggle="tooltip" title="{{"Your profit is ".$profit."rs and you gain ".round($profit_percentage, 2)  ." %"}}" style=":60px; color: #17a2b8;   vertical-align: 0.55em;" > <i class="fas fa-info-circle  "></i></a>
                                        {{$inventory->id}}

                            @else
                                    <a  type="button"  data-toggle="modal" data-target="#exampleModal" title="add selling price"> <i class="fas fa-plus-circle text-success " style="font-size:19px"></i>
                                    </a>
                                        {{$inventory->id}}
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-lg-center bold" id="exampleModalLabel" style="margin-left: 70px; color: #495057"><strong> Set the Selling Price of Product </strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="selling_price_form" method = "POST" action="{{route('storeProduced.Product' , $inventory->id)}}">
                                                        <input type="hidden" >
                                                        <div class="form-group">
                                                            <div class="col-md-12" style=" color: #495057">
                                                                <label><h2 >Enter Selling Price </h2></label>
                                                                <input type="text" class="form-control @error('selling_price_per_piece') is-invalid @enderror " name="selling_price_per_piece"
                                                                       id="email" placeholder="Enter Selling Price" required autocomplete="selling_price_per_piece">
                                                                @error('selling_price_per_piece')
                                                                <span class="invalid-feedback" role="alert">
                                                                 <strong>{{ $message }}</strong> </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" id="selling_price_form" class="btn btn-primary">Save </button>
                                                </div>

                                            </div>       @csrf
                                            </form>
                                        </div>
                                    </div>



                                @endif

                                </td>
                                                        <td style="width:100px">

                                <!-- Edit Button -->
                                {{--                                        <a class="btn btn-round btn-danger" type="button"--}}
                                {{--                                           href="#" title="Edit">--}}
                                {{--                                            <i class="fas fa-edit text-gray-300"></i>Assign--}}
                                {{--                                        </a>--}}
                                <a class=" btn btn-round btn-danger"
                                   style="width: 100px; height: 34px; color: whitesmoke" type="button"
                                   data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                   data-attr="{{ route('assign.product' ,$inventory->products->id) }}"
                                   title="Assign product">
                                    <i class="fa fa-minus"></i> Assign
                                </a>

                                {{--                        </form>--}}
                            </td>
                            {{--                        <td class="text-right">124,90 €</td>--}}
                            {{--                        <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>--}}
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!--    -->


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
