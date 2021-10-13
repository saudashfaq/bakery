@extends('layouts.app')
@section('content')
{{--    <div class="jumbotron text-center">--}}


{{--        <h1></h1>--}}
{{--    <p> This is laravel series </p>--}}
{{--        <p> <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>--}}
{{--    </div>--}}



    <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hero-image {
            /*background-image: url("/w3images/photographer.jpg");  bakery1.jpg*/
            background-image: url("bakri image.jpg");
            /*background-size: 300px 100px;*/
            background-color: #cccccc;
            height: 500px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #d9edf7;
        }
    </style>
</head>
<body>

<div class="hero-image">
    <div class="hero-text">
        <h1 style="font-size:50px">{{$title}}</h1>
        <h3>Maximize your Production efficiency</h3>
        <p> <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
        {{--            <button>Hire me</button>--}}
    </div>
</div>

<p>Page content..</p>
<p>Note that this technique will also make the image responsive: Resize the browser window to see the effect.</p>

</body>
</html>

<!--    <style type='text/css'>
    #intro-wrap{display:block}
    #main-intro{background-image:url('https://4.bp.blogspot.com/-I44AiRrmm7o/XTBEGhdr1uI/AAAAAAAAG9U/zAZ3IB0Wj0cRSCuZrdihN_NmOno8EZEywCK4BGAYYCw/s1600/subscribe.jpg')}
</style>-->

@endsection
