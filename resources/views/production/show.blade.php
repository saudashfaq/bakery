<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center font-weight-bolder">
            <h2 class="font-weight-bold">Product Recipe</h2>
        </div>
        {{-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i
                    class="fas fa-backward "></i> </a>
        </div> --}}
    </div>
</div>
{{--.................................................--}}

    <table class="table table-bordered table-responsive-lg table-hover">
        <thead class="thead-dark">
{{--        <div class="align-content-center"><h2>  Product recipe </h2></div>--}}
        <tr>
            <th> Items</th>
            <th>Quantity</th>
            <th>Unit</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products->recipe as $key => $value)
        <tr>

{{--            <td>jccnjdncceenc</td>--}}
            <td>{{$value['item']}}</td>
            <td>{{$value['quantity']}}</td>
            <td>{{$value['unit']}}</td>


{{--            {{dd('stop')}}--}}
        </tr>
        @endforeach
        </tbody>
    </table>
</div>




<!--data......-->

{{--{{$count = !empty($product['recipe']) ? count($product['recipe']): 0}}--}}

{{--            {{dump([123, 34])}}--}}{{--

--}}
{{--            {{dump($product['recipe'])}}--}}{{--

--}}
{{--        <br>--}}{{--

--}}
{{--        <br>--}}{{--

--}}
{{--        <br>--}}{{--

@for($i = $count-1; $i > 0; $i--)
    --}}
{{--                @for($i = 1 ; $i <=$count + 1;  $i--)--}}{{--


    --}}
{{--            {{var_dump($product['recipe'][$i]['item'])}}--}}{{--

    <td>{{$product['recipe'][$i]['item']}}</td>

    <td>{{'Quantity' . $product['recipe'][$i]['quantity']}}</tr>
        <br>

    <td> {{$product['recipe'][$i]['unit']}}</td>


@endfor
--}}
{{--            @endforeach--}}{{--


--}}
{{--            <td>{{$product->json_encode('item'),}}</td>--}}
