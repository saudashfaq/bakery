@extends('layouts.websiteapp')

@section('content')
    <style>
    .button {
        background-color: #04AA6D; /* Green */
        border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button1 {border-radius: 2px;}
    .button2 {border-radius: 4px;}
    .button3 {border-radius: 8px;}
    .button4 {border-radius: 12px;}
    .button5 {border-radius: 50%;}
</style>

    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url(/esite/images/esite1.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-md-12 ftco-animate text-center">
                            <!--	              <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>-->
                            <h1 class="mb-2">We serve Fresh   cookies &amp; Cakes</h1>
                            <h2 class="subheading mb-4">We deliver organic Products &amp; Tast</h2>
                            <p><a href="#" class="btn btn-primary">View Details</a></p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="slider-item" style="background-image: url(/esite/images/esite2.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-sm-12 ftco-animate text-center">
                            <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
                            <h2 class="subheading mb-4">We deliver organic Products &amp; Tast</h2>
                            <p><a href="#" class="btn btn-primary">View Details</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Free Shipping</h3>
                            <span>On order over &#8360;.  5000</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Always Fresh</h3>
                            <span>Product well package</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Superior Quality</h3>
                            <span>Quality Products</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Support</h3>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-category ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 order-md-last align-items-stretch d-flex">
                            <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(/esite/images/category.jpg);">
                                <div class="text text-center">
                                    <h2>Vegetables</h2>
                                    <p>Protect the health of every home</p>
                                    <p><a href="#" class="btn btn-primary">Shop now</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(/esite/images/category-1.jpg);">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">Fruits</a></h2>
                                </div>
                            </div>
                            <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(/esite/images/category-2.jpg);">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">Vegetables</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(/esite/images/category-3.jpg);">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">Juices</a></h2>
                        </div>
                    </div>
                    <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(/esite/images/category-4.jpg);">
                        <div class="text px-3 py-1">
                            <h2 class="mb-0"><a href="#">Dried</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Featured Products</span>
                    <h2 class="mb-4">Our Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($inventories as $inventory)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
{{--                        <img src="{{url('images', $inventory->products->parent_product->image) }}"--}}
                        <a href="{{route('product.Detail', $inventory->id)}}" class="img-prod"><img class="img-fluid" src="{{url('images', $inventory->products->parent_product->image) }}" alt="{{$inventory->products->parent_product->title}}"
                            style="width: 300px; height: 262.29px">
                            <span class="status">30%</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{$inventory->products->parent_product->title}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc">$120sw.00</span><span class="price-sale">{{$inventory->selling_price_per_piece}}</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="/indexsite" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="{{route('product.Detail',$inventory->id)}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
{{--                                    <form action="{{route('store.cart',$inventory->id)}} " method="post">--}}
{{--                                        @csrf--}}
{{--                                        <button    type="submit" class="btn  buy-now d-flex justify-content-center align-items-center mx-1"--}}
{{--                                        style="border-radius: 100%; background: #82ae46; color: white; width: 40px;height: 40px; ">--}}
{{--                                            <span><i class="ion-ios-cart"></i>  </span>--}}
{{--                                        </button>--}}

{{--                                    <a type="submit" class="buy-now d-flex justify-content-center align-items-center mx-1">--}}
{{--                                        <span><i class="ion-ios-cart"></i>  </span>--}}
{{--                                    </a>--}}

{{--                                    </form>--}}
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
<!--                -->
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="/esite/images/product-2.jpg" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">Strawberry</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>$120.00</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-md-6 col-lg-3 ftco-animate">--}}
{{--                    <div class="product">--}}
{{--                        <a href="#" class="img-prod"><img class="img-fluid" src="esite/images/product-3.jpg" alt="Colorlib Template">--}}
{{--                            <div class="overlay"></div>--}}
{{--                        </a>--}}
{{--                        <div class="text py-3 pb-4 px-3 text-center">--}}
{{--                            <h3><a href="#">Green Beans</a></h3>--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="pricing">--}}
{{--                                    <p class="price"><span>$120.00</span></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="bottom-area d-flex px-3">--}}
{{--                                <div class="m-auto d-flex">--}}
{{--                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">--}}
{{--                                        <span><i class="ion-ios-menu"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">--}}
{{--                                        <span><i class="ion-ios-cart"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">--}}
{{--                                        <span><i class="ion-ios-heart"></i></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 col-lg-3 ftco-animate">--}}
{{--                    <div class="product">--}}
{{--                        <a href="#" class="img-prod"><img class="img-fluid" src="esite/images/product-4.jpg" alt="Colorlib Template">--}}
{{--                            <div class="overlay"></div>--}}
{{--                        </a>--}}
{{--                        <div class="text py-3 pb-4 px-3 text-center">--}}
{{--                            <h3><a href="#">Purple Cabbage</a></h3>--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="pricing">--}}
{{--                                    <p class="price"><span>$120.00</span></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="bottom-area d-flex px-3">--}}
{{--                                <div class="m-auto d-flex">--}}
{{--                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">--}}
{{--                                        <span><i class="ion-ios-menu"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">--}}
{{--                                        <span><i class="ion-ios-cart"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">--}}
{{--                                        <span><i class="ion-ios-heart"></i></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="col-md-6 col-lg-3 ftco-animate">--}}
{{--                    <div class="product">--}}
{{--                        <a href="#" class="img-prod"><img class="img-fluid" src="esite/images/product-5.jpg" alt="Colorlib Template">--}}
{{--                            <span class="status">30%</span>--}}
{{--                            <div class="overlay"></div>--}}
{{--                        </a>--}}
{{--                        <div class="text py-3 pb-4 px-3 text-center">--}}
{{--                            <h3><a href="#">Tomatoe</a></h3>--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="pricing">--}}
{{--                                    <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="bottom-area d-flex px-3">--}}
{{--                                <div class="m-auto d-flex">--}}
{{--                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">--}}
{{--                                        <span><i class="ion-ios-menu"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">--}}
{{--                                        <span><i class="ion-ios-cart"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">--}}
{{--                                        <span><i class="ion-ios-heart"></i></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 col-lg-3 ftco-animate">--}}
{{--                    <div class="product">--}}
{{--                        <a href="#" class="img-prod"><img class="img-fluid" src="esite/images/product-6.jpg" alt="Colorlib Template">--}}
{{--                            <div class="overlay"></div>--}}
{{--                        </a>--}}
{{--                        <div class="text py-3 pb-4 px-3 text-center">--}}
{{--                            <h3><a href="#">Brocolli</a></h3>--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="pricing">--}}
{{--                                    <p class="price"><span>$120.00</span></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="bottom-area d-flex px-3">--}}
{{--                                <div class="m-auto d-flex">--}}
{{--                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">--}}
{{--                                        <span><i class="ion-ios-menu"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">--}}
{{--                                        <span><i class="ion-ios-cart"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">--}}
{{--                                        <span><i class="ion-ios-heart"></i></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 col-lg-3 ftco-animate">--}}
{{--                    <div class="product">--}}
{{--                        <a href="#" class="img-prod"><img class="img-fluid" src="esite/images/product-7.jpg" alt="Colorlib Template">--}}
{{--                            <div class="overlay"></div>--}}
{{--                        </a>--}}
{{--                        <div class="text py-3 pb-4 px-3 text-center">--}}
{{--                            <h3><a href="#">Carrots</a></h3>--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="pricing">--}}
{{--                                    <p class="price"><span>$120.00</span></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="bottom-area d-flex px-3">--}}
{{--                                <div class="m-auto d-flex">--}}
{{--                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">--}}
{{--                                        <span><i class="ion-ios-menu"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">--}}
{{--                                        <span><i class="ion-ios-cart"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">--}}
{{--                                        <span><i class="ion-ios-heart"></i></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 col-lg-3 ftco-animate">--}}
{{--                    <div class="product">--}}
{{--                        <a href="#" class="img-prod"><img class="img-fluid" src="esite/images/product-8.jpg" alt="Colorlib Template">--}}
{{--                            <div class="overlay"></div>--}}
{{--                        </a>--}}
{{--                        <div class="text py-3 pb-4 px-3 text-center">--}}
{{--                            <h3><a href="#">Fruit Juice</a></h3>--}}
{{--                            <div class="d-flex">--}}
{{--                                <div class="pricing">--}}
{{--                                    <p class="price"><span>$120.00</span></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="bottom-area d-flex px-3">--}}
{{--                                <div class="m-auto d-flex">--}}
{{--                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">--}}
{{--                                        <span><i class="ion-ios-menu"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">--}}
{{--                                        <span><i class="ion-ios-cart"></i></span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">--}}
{{--                                        <span><i class="ion-ios-heart"></i></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <section class="ftco-section img" style="background-image: url(esite/images/bg_3.jpg);">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <span class="subheading">Best Price For You</span>
                    <h2 class="mb-4">Deal of the day</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                    <h3><a href="#">Spinach</a></h3>
                    <span class="price">$10 <a href="#">now $5 only</a></span>
                    <div id="timer" class="d-flex mt-5">
                        <div class="time" id="days"></div>
                        <div class="time pl-3" id="hours"></div>
                        <div class="time pl-3" id="minutes"></div>
                        <div class="time pl-3" id="seconds"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Our satisfied customer says</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(esite/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(esite/images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(esite/images/person_3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(esite/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(esite/images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <section class="ftco-section ftco-partner">
        <div class="container">
            <div class="row">
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="esite/images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="esite/images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="esite/images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="esite/images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-sm ftco-animate">
                    <a href="#" class="partner"><img src="esite/images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
                </div>
            </div>
        </div>
    </section>

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
                        <h2 class="ftco-heading-2">Baker's Bites</h2>
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
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>. Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>

@endsection
<script>
    import Index from "../../../public/vendors/Flot/examples/zooming/index.html";
    export default {
        components: {Index}
    }
</script>
