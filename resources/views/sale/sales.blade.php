@extends('layouts.appss')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row" style="display: inline-block;">

            <div class=" top_tiles" style="margin: 10px 0;">
                <div class="col-md-3 col-sm-3  tile">
                    <h6><span>Total Sales</span></h6>
                    <h2><span>&#8360;</span>. {{$total_sale}}</h2>
                    <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
                </div>
                <div class="col-md-3 col-sm-3  tile">
                    <h6> <span>Total Profit</span></h6>
                    <h2> <span>&#8360;</span>. {{$total_profit}}</h2>


                    <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
                </div>
                <div class="col-md-3 col-sm-3  tile">
                    <h6><span>Total Order</span></h6>
                    <h2>{{$total_order}}</h2>
                    <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 125px;"></canvas>
                  </span>
                </div>
                <div class="col-md-3 col-sm-3  tile">
                    <h6><span>Success Orders </span></h6>
                    <h2>{{$success_order}}</h2>
                    <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
                </div>
            </div>
        </div>
        <br/>


        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="dashboard_graph x_panel">
                    <div class="x_title">
                        <div class="col-md-6">
{{--                            <h3>Sales Activities <small>Graph title sub-title</small></h3>--}}
                            <h3>Sales Activities </h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>
                    <div class="x_content">
                        <div class="demo-container" style="height:250px">
                            <div id="chart_plot_03" class="demo-placeholder"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel tile ">
            <div class="main">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h4>Sales </h4>
                        </div>

                    </div>
                </div>

                <table id="datatableid"  class="table table-bordered table-responsive-lg table-hover myTable ">
                    <thead class="thead-dark">
                    <tr>
                        <th>Date:</th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Attribute</th>
                        <th>Quantity</th>
                        <th>Selling Price </th>
                        <th>Total Amount</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($all_outgoing_product_to_outlets as $key => $all_outgoing_product_to_outlet)

                        <tr>
                            <td>{{ date("m-d-Y ", strtotime($all_outgoing_product_to_outlet->pivot->received_date))}} </td>

                            <td><img src="{{url('images', $all_product_detail[$key]->parent_product->image) }}"
                                     alt="cake image" width="80" height="60"></td>
                            <td><strong> {{ $all_product_detail[$key]->parent_product->title}}</strong></td>

{{--                            <td>eeee</td>--}}
                            <td>   @foreach ($all_product_detail[$key]->attributes as $attribute)

                                    {{$attribute->attributeHeads->name}}
                                    : {{$attribute->name}}

                                @endforeach</td>
                            <td>{{$all_outgoing_product_to_outlet->pivot->product_quantity}}</td>
                            <td>{{$all_outgoing_product_to_outlet->pivot->selling_price}}</td>
                            <td>{{$all_outgoing_product_to_outlet->pivot->total_amount}}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection
