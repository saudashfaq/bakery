{{--<div class="row">--}}
{{--    <div class="col-lg-12 margin-tb">--}}
{{--        <div class="text-center font-weight-bolder">--}}
{{--            <h2 class="font-weight-bold">Product Recipe</h2>--}}
{{--        </div>--}}
{{--         <div class="pull-right">--}}
{{--            <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i--}}
{{--                    class="fas fa-backward "></i> </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--.................................................--}}
{{--<div class="text-right">--}}
<table class="table table-bordered table-responsive-lg table-hover  ">
    <thead class="thead-dark " >
    <div class="text-center"><h2> Product recipe </h2></div>
    <tr>

        <th style="width:50%">	&nbsp;Items</th>
        <th style="width:17%"> 	&nbsp;Quantity</th>
        <th style="width:20%">Unit</th>

    </tr>
    </thead>
    <tbody>


    <tr>
        @foreach($products->stocks as $key=>$value)

            <td>	&nbsp; {{ $value->items}}  </td>
            <td class="text-center"> {{ $value->pivot->quantity}}  </td>
            <td> {{ $units[$key]}}  </td>



    </tr>

    @endforeach







    {{--        @foreach($products as $key => $value )--}}


    {{--                <td>{{$value->stocks[$key]['items']}}</td>--}}


    {{--            </tr>--}}
    {{--        @endforeach--}}

    </tbody>
</table>

</div>
{{--

<div>
    <ul>
        @foreach ($products->stocks as $stock)
            <li> {{$stock->items}} </li>
            <li> {{$stock->pivot->quantity}} </li>

                @foreach ($products->units as $unit)
                    <li>  {{ $unit->name}}} </li>

                @endforeach

        @endforeach
    </ul>
</div>
--}}
