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




