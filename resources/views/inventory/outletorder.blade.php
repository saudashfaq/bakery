{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')


    <div class="right_col" role="main">
        {{--    <!-- top tiles -->--}}
{{--                    <div class="row" style="display: inline-block;" >--}}
        <div class="x_panel tile  ">

            {{--            <div class="main">--}}
            @include('inc.messages')
            <div class="col-18">

                {{--                <div class="row">--}}
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h4>Orders </h4>
                    </div>
                </div>
                <div style=" width:1100px; overflow-x: auto;">
                    <table id="datatableid"
                           class="table table-striped  table table-bordered table-responsive-lg table-hover myTable">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>

                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" style="width: 90px ">Status</th>
                            <th scope="col" style="width: 160px ">Assigned_by</th>
                            <th scope="col">Assigning Date</th>
                            <th scope="col">Receiving Date</th>
                            <th scope="col">Rejected Date</th>
                            <th scope="col">Selling Price</th>
                            <th scope="col">Total amount</th>
                            <th scope="col">Action</th>

                            {{--                            <th scope="col">Cost per piece</th>--}}
                            {{--                            <th scope="col">Action</th>--}}
                            {{--                                                    --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($all_outgoing_product_to_outlets as $key => $all_outgoing_product_to_outlet)

                            <tr>
                                <td><img src="{{url('images', $all_product_detail[$key]->parent_product->image) }}"
                                         alt="cake image" width="80" height="60"></td>
                                <td><strong> {{ $all_product_detail[$key]->parent_product->title}}</strong></td>
                                {{--                                <td>{{$assigned_inventory->attributes->name}}</td>--}}

                                <td>{{$all_outgoing_product_to_outlet->pivot->product_quantity}}</td>
                                @if($all_outgoing_product_to_outlet->pivot->status == 1)
                                    <td style="color:blue"> In Process</td>
                                @elseif($all_outgoing_product_to_outlet->pivot->status == 2)
                                    <td style="color:green"> Received</td>
                                @elseif($all_outgoing_product_to_outlet->pivot->status == 3)
                                    <td style="color:red"> Rejected</td>
                                @endif

                                <td>{{ App\Models\User::where(['id' => $all_outgoing_product_to_outlet->pivot->assigned_by_user_id])->pluck('name')->first() }}
                                </td>

{{--                                @if($all_outgoing_product_to_outlet->pivot->received_by_user_id == !null)--}}

{{--                                    <td style="color: green">--}}
{{--                                        <a data-toggle="tooltip" title="Received ">--}}
{{--                                            {{ App\Models\User::where(['id' => $all_outgoing_product_to_outlet->pivot->received_by_user_id])->pluck('name')->first() }}--}}

{{--                                        </a>--}}
{{--                                    </td>--}}
{{--                                @else--}}
{{--                                    <td>--}}
{{--                                        <a data-toggle="tooltip" title="Not Received ">--}}
{{--                                            Not Recived--}}
{{--                                        </a>--}}
{{--                                    </td>--}}

{{--                                @endif--}}
                                <td>{{$all_outgoing_product_to_outlet->pivot->created_at->format("m-d-Y ")}}</td>


                                @if($all_outgoing_product_to_outlet->pivot->received_date == !null)
                                    <td style="color:green;">{{ date("m-d-Y ", strtotime($all_outgoing_product_to_outlet->pivot->received_date))}}</td>
                                @else
                                    <td>Not Received</td>
                                @endif
                                @if($all_outgoing_product_to_outlet->pivot->rejected_date == !null)

                                    <td style="color:red;"> {{ date("m-d-Y ", strtotime($all_outgoing_product_to_outlet->pivot->rejected_date)) }}</td>

                                @else
                                    <td> Not Rejected</td>
                                @endif

                                <td>{{$all_outgoing_product_to_outlet->pivot->selling_price}}</td>
                                @if($all_outgoing_product_to_outlet->pivot->total_amount == !null )
                                    <td>{{$all_outgoing_product_to_outlet->pivot->total_amount}}</td>
                                @else
                                    <td>{{$all_outgoing_product_to_outlet->pivot->total_amount}}</td>
                                @endif

                                {{--                                <span class="badge badge-primary badge-pill"></span>--}}


                                {{--                                <td class="text-center" style="width:120px">bhxk</td>--}}

{{--                                <form action="{{route('outlets.receivingOrders')}}" method="POST" >--}}
                                <form
                                    action="{{route('outlets.receivingOrders',['id'=>$all_outgoing_product_to_outlet->pivot->product_id ,'pivot_id'=>$all_outgoing_product_to_outlet->pivot->id])}}"
                                    method="POST">

{{--                                        @if($all_outgoing_product_to_outlet->pivot->received_by_user_id == !null ||--}}
{{--                                                $all_outgoing_product_to_outlet->pivot->rejected_by_user_id == !null)--}}
{{--                                            <button type="submit" class="btn btn-danger" disabled> Cancel</button>--}}
{{--                                        @else--}}
{{--                                            <button type="submit" onclick="return cancelAlert()" class="btn btn-danger">--}}
{{--                                                Cancel--}}
{{--                                            </button>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
                                    <td>     <button type="submit" onclick="return cancelAlert()" class="btn btn-danger" name="cancel" value="cancel">
                                            Cancel
                                        </button>
                                       <button type="submit" class="btn btn-success" name="Received" value="Received">
                                            Received
                                        </button></td>
                                    @csrf
                                </form>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>




@endsection
