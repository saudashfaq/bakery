{{-- @extends('layouts.app')
@section('content') --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2 class="font-weight-bold">  {{ $stock->product }}</h2>
        </div>
    </div>




    <table class="table table-bordered table-responsive-lg table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Products</th>
            <th>Price</th>
            <th>Unit</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
            <tr>

                <td>{{$stock->items}}</td>
                <td>{{$stock->price}}</td>
                <td>{{$stock->unit->name}}</td>
                <td>{{$stock->quantity}}</td>
            </tr>
        </tbody>
    </table>
</div>

