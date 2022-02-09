@extends('layouts.websiteapp')
@section('content')
    <h3 class="text-center">@include('inc.messages')</h3>
    <div class="hero-wrap hero-bread" style="background-image:url(/esite/images/esite2.jpg);">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($cart_items->count()  == 0 )
                                <h2 class="text-center">Items not added in Cart </h2>
                            @else
                            @foreach($cart_items as $cart_item)
                                <tr class="text-center">

                                    <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
                                    <?php   $inventory = \App\Models\Inventory::with(['products.parent_product', 'products.attributes.attributeHeads'])->find($cart_item->id);
                                    ?>
                                    {{--                            <td class="image-prod"><div class="img" style="background-image: url('images', {{$inventory->products->parent_product->image}});"></div></td>--}}
                                    <td class="image-prod"><img class="img-fluid"
                                                                src="{{url('images', $inventory->products->parent_product->image) }}"
                                                                alt="{{$inventory->products->parent_product->title}}"
                                                                style="width: 150px; height: 150px"></td>

                                    <td class="product-name">
                                        <h3>{{$cart_item->name}}</h3>
                                        {{$inventory->products->parent_product->description}}
                                        {{--                                <p>{{$inventory->products->parent_product->description}}<</p>--}}
                                    </td>

                                    <td class="price">&#8360;. {{$cart_item->price}}</td>

                                    <td class="price">
                                        {{$cart_item->qty}}  </td>
                                    {{--                                <div class="input-group mb-3">--}}
                                    {{--                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">--}}
                                    {{--                                </div>--}}


                                    <?php $total_price = $cart_item->price * $cart_item->qty;
                                    $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                                    $total = \Gloudemans\Shoppingcart\Facades\Cart::total();
                                    $total_tax = \Gloudemans\Shoppingcart\Facades\Cart::tax();
                                    ?>

                                    {{--                            <td class="total">{{$total_price}}</td>--}}
                                    <td class="total">&#8360;. {{$subtotal}}</td>

                                    {{--                            <td class="total">{{$subtotal}}</td>--}}
                                    {{--                            <td class="total">{{$cart_item->total}}</td>--}}
                                    {{--                        </tr><!-- END TR-->--}}

                                    {{--                        <tr class="text-center">--}}
                                    {{--                            <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>--}}

                                    {{--                            <td class="image-prod"><div class="img" style="background-image:url(/esite/images/product-4.jpg);"></div></td>--}}

                                    {{--                            <td class="product-name">--}}
                                    {{--                                <h3>Bell Pepper</h3>--}}
                                    {{--                                <p>Far far away, behind the word mountains, far from the countries</p>--}}
                                    {{--                            </td>--}}

                                    {{--                            <td class="price">$15.70</td>--}}

                                    {{--                            <td class="quantity">--}}
                                    {{--                                <div class="input-group mb-3">--}}
                                    {{--                                    <input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">--}}
                                    {{--                                </div>--}}
                                    {{--                            </td>--}}

                                    {{--                            <td class="total">$15.70</td>--}}
                                </tr><!-- END TR-->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Coupon Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Coupon code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="#" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Estimate shipping and tax</h3>
                        <p>Enter your destination to get a shipping estimate</p>

                        <form action="{{route('ckeckout.page')}}" method="get"  name="estimate_form" id="estimate_form" class="info">
{{--                        <form action="#" method="get" name="estimate_form" id="estimate_form" class="info">--}}
                            @csrf
{{--                            <input type="hidden" name="_token" id="csrf-token"  />--}}
                            <div class="form-group">
                                <label for="">Country</label>

                                <select class="form-control text-left px-3" name="country">
                                    <option disabled selected>Select Country</option>
                                    {{--                                @foreach($shipping_charges as $shipping_charge )--}}
                                    {{--                                <option>{{$shipping_charge->country}}</option>--}}
                                    {{--                                @endforeach--}}
                                    <option value="pakistan">Pakistan</option>
                                </select>
{{--                                <input type="text" class="form-control text-left px-3" placeholder="">--}}
                            </div>
                            <div class="form-group">
                                <label for="country">State/Province</label>
                                <select class="form-control text-left px-3" name="province">
                                    <option disabled selected>Select Province</option>

                                    @foreach($shipping_charges as $shipping_charge )
                                        <option
                                            value="{{$shipping_charge->id}}">{{$shipping_charge->province }}</option>
                                    @endforeach
                                </select>
{{--                                <input type="text" class="form-control text-left px-3" placeholder="">--}}
                            </div>
                            <div class="form-group">
                                {{--                            <label for="country">Zip/Postal Code</label>--}}
                                <label for="country"> City </label>
                                <select class="form-control text-left px-3" name="city">
                                    <option disabled selected>Select City</option>
                                    @foreach($shipping_charges as $shipping_charge )
                                        <option value="{{$shipping_charge->id}}">{{$shipping_charge->city }}</option>
                                    @endforeach
                                </select>
{{--                                <input type="text" class="form-control text-left px-3" placeholder="">--}}
                            </div>

                        </form>
                    </div>

                    <p><a href="javascript:;" onclick="document.getElementById('estimate_form').submit()"
                          class="btn btn-primary py-3 px-4 ">Estimate</a></p>
                    {{--                    <p><a href="" class="btn btn-primary py-3 px-4">Estimate</a></p>--}}
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            {{--                        <span>&#8360;. {{$subtotal}}</span>--}}
                        </p>
                        <p class="d-flex">
                            <span>Tax</span>
                            <span>&#8360;.  {{$total_tax}}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>&#8360;. 0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>&#8360;. 0.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>&#8360;. {{$total}}</span>
                        </p>
                    </div>
                    <p><a href="{{route('ckeckout.page')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    @endif
    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Vegefoods</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Shop</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Journal</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span>
                                </li>
                                <li><a href="#"><span class="icon icon-phone"></span><span
                                            class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="icon-heart color-danger"
                                                                            aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>. Downloaded from <a
                            href="https://themeslab.org/" target="_blank">Themeslab</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    {{--<script>--}}
    {{--    $(document).ready(function(){--}}

    {{--        var quantitiy=0;--}}
    {{--        $('.quantity-right-plus').click(function(e){--}}

    {{--            // Stop acting like a button--}}
    {{--            e.preventDefault();--}}
    {{--            // Get the field name--}}
    {{--            var quantity = parseInt($('#quantity').val());--}}

    {{--            // If is not undefined--}}

    {{--            $('#quantity').val(quantity + 1);--}}


    {{--            // Increment--}}

    {{--        });--}}

    {{--        $('.quantity-left-minus').click(function(e){--}}
    {{--            // Stop acting like a button--}}
    {{--            e.preventDefault();--}}
    {{--            // Get the field name--}}
    {{--            var quantity = parseInt($('#quantity').val());--}}

    {{--            // If is not undefined--}}

    {{--            // Increment--}}
    {{--            if(quantity>0){--}}
    {{--                $('#quantity').val(quantity - 1);--}}
    {{--            }--}}
    {{--        });--}}

    {{--    });--}}
    {{--</script>--}}
@endsection
