@extends('layouts.app')

@section('content')
    @include('inc.sidebar')}
{{--<div class="main">--}}
<!--<section class="jumbotron text-center">
    <div class="main">
        <h1 class="jumbotron-heading">Inventory</h1>
    </div>
</section>-->

{{--<div class="container mb-4">--}}
<div class="main">

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
{{--                <div class="row">--}}
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h1>Inventory </h1>
                        </div>


{{--                    </div>--}}
                </div>
                <table  id="datatableid"  class="table table-striped  table table-bordered table-responsive-lg table-hover myTable" >
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Product </th>
                        <th scope="col">Name</th>
                        <th scope="col">Available</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" >Price per Piece</th>
{{--                        <th> </th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventories as $inventory)
                    <tr>
{{--                        <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>--}}
                        <td><img src="{{url('images', $inventory->product->image) }}" alt="cake image"  width="130" height="75" ></td>
                        <td>{{$inventory->product->title}}</td>
{{--                        <td> In Stock</td>--}}
{{--                        <td> In Stock</td>--}}
                        @if($inventory->finished_goods > 0)
                            <td> In Stock</td>
{{--                        @else--}}
{{--                            <td> out Stock</td>--}}
                        @endif


                        <td class="text-center">{{$inventory->finished_goods}}</td>

                        <td  class="text-center">124</td>
{{--                        <td class="text-right">124,90 €</td>--}}
{{--                        <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>--}}
                    </tr>
                    @endforeach

{{--                    <tr>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td>Sub-Total</td>--}}
{{--                        <td class="text-right">255,90 €</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td>Shipping</td>--}}
{{--                        <td class="text-right">6,90 €</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td></td>--}}
{{--                        <td><strong>Total</strong></td>--}}
{{--                        <td class="text-right"><strong>346,90 €</strong></td>--}}
{{--                    </tr>--}}
                    </tbody>
                </table>
            </div>
        </div>
{{--        <div class="col mb-2">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-12  col-md-6">--}}
{{--                    <button class="btn btn-block btn-light">Continue Shopping</button>--}}
{{--                </div>--}}
{{--                <div class="col-sm-12 col-md-6 text-right">--}}
{{--                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>

<!-- Footer -->
<!--<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>About</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Informations</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Others links</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i> My company</li>
                    <li><i class="fa fa-envelope mr-2"></i> email@example.com</li>
                    <li><i class="fa fa-phone mr-2"></i> + 33 12 14 15 16</li>
                    <li><i class="fa fa-print mr-2"></i> + 33 12 14 15 16</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
                <p class="text-right text-muted">created with <i class="fa fa-heart"></i> by <a href="https://t-php.fr/43-theme-ecommerce-bootstrap-4.html"><i>t-php</i></a> | <span>v. 1.0</span></p>
            </div>
        </div>
    </div>
</footer>-->
{{--</div>--}}
@endsection
