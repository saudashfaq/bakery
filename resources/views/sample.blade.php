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


{{--@extends('layouts.appss')--}}

{{--@section('content')--}}


{{--    <!-- page content -->--}}
{{--    <div class="right_col" role="main">--}}
{{--        <div class="row" style="display: inline-block;">--}}
{{--            <div class=" top_tiles" style="margin: 10px 0;">--}}
{{--                <div class="col-md-3 col-sm-3  tile">--}}
{{--                    <span>Total Sessions</span>--}}
{{--                    <h2>231,809</h2>--}}
{{--                    <span class="sparkline_one" style="height: 160px;">--}}
{{--                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>--}}
{{--                  </span>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 col-sm-3  tile">--}}
{{--                    <span>Total Revenue</span>--}}
{{--                    <h2>$ 231,809</h2>--}}
{{--                    <span class="sparkline_one" style="height: 160px;">--}}
{{--                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>--}}
{{--                  </span>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 col-sm-3  tile">--}}
{{--                    <span>Total Sessions</span>--}}
{{--                    <h2>231,809</h2>--}}
{{--                    <span class="sparkline_one" style="height: 160px;">--}}
{{--                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 125px;"></canvas>--}}
{{--                  </span>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 col-sm-3  tile">--}}
{{--                    <span>Total Sessions</span>--}}
{{--                    <h2>231,809</h2>--}}
{{--                    <span class="sparkline_one" style="height: 160px;">--}}
{{--                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>--}}
{{--                  </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <br/>--}}


{{--        <div class="row">--}}
{{--            <div class="col-md-12 col-sm-12 ">--}}
{{--                <div class="dashboard_graph x_panel">--}}
{{--                    <div class="x_title">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <h3>Network Activities <small>Graph title sub-title</small></h3>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">--}}
{{--                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>--}}
{{--                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="x_content">--}}
{{--                        <div class="demo-container" style="height:250px">--}}
{{--                            <div id="chart_plot_03" class="demo-placeholder"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}



{{--        <!-- /page content -->--}}

{{--        <!-- footer content -->--}}
{{--        <footer>--}}
{{--            <div class="pull-right">--}}
{{--                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>--}}
{{--            </div>--}}
{{--            <div class="clearfix"></div>--}}
{{--        </footer>--}}
{{--        <!-- /footer content -->--}}
{{--    </div>--}}
{{--    </div>--}}



{{--@endsection--}}


{{--///////////////////////////////////////--}}
{{--<!-- jQuery -->--}}
{{--<script src="../vendors/jquery/dist/jquery.min.js"></script>--}}
{{--<!-- Bootstrap -->--}}
{{--<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>--}}

{{--<script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>--}}
{{--<!-- morris.js -->--}}

{{--<!-- Flot -->--}}
{{--<script src="../vendors/Flot/jquery.flot.js"></script>--}}

{{--<script src="../vendors/DateJS/build/date.js"></script>--}}

{{--<script src="../build/js/custom.min.js"></script>--}}
