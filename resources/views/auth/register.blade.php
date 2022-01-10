<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name' , 'Baker’s Bites')}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .login-dark {
            height: 700px;
            background: #475d62 url('images/bak.jpg');
            background-size: cover;
            position: relative;
        }

        .login-dark form {
            max-width: 320px;
            width: 90%;
            background-color: #1e2833;
            padding: 40px;
            border-radius: 4px;
            transform: translate(-50%, -50%);
            position: absolute;
            top: 50%;
            left: 50%;
            color: #fff;
            box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.2);
        }

        .login-dark .illustration {
            text-align: center;
            padding: 15px 0 20px;
            font-size: 100px;
            color: #2980ef;
        }

        .login-dark form .form-control {
            background: none;
            border: none;
            border-bottom: 1px solid #434a52;
            border-radius: 0;
            box-shadow: none;
            outline: none;
            color: inherit;
        }

        .login-dark form .btn-primary {
            background: #214a80;
            border: none;
            border-radius: 4px;
            padding: 11px;
            box-shadow: none;
            margin-top: 26px;
            text-shadow: none;
            outline: none;
        }

        .login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
            background: #214a80;
            outline: none;
        }

        .login-dark form .forgot {
            display: block;
            text-align: center;
            font-size: 12px;
            color: #6f7a85;
            opacity: 0.9;
            text-decoration: none;
        }

        .login-dark form .forgot:hover, .login-dark form .forgot:active {
            opacity: 1;
            text-decoration: none;
        }

        .login-dark form .btn-primary:active {
            transform: translateY(1px);
        }


    </style>
</head>
{{--<div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>--}}
<body>
<div class="login-dark">

    {{--        <h2 class="sr-only">Login Form</h2>--}}
    {{--        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>--}}

    <div class="form-group">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div ><h6>Register your Account Here </h6></div><br>
            <div class="form-group">
                {{--                <span class="label label-default">Name:</span>--}}
                <input id="name" type="text" placeholder="Enter Name"
                       class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="email" type="email" placeholder="E-Mail Address"
                       class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                @enderror
            </div>

            <!--   for company name input -->
            {{--    <div class="form-group row">--}}
            {{--        <label for="companyName" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>--}}

            <div class="form-group">
                <input id="email" type="text" placeholder="Company Name"
                       class="form-control @error('companyName') is-invalid @enderror"
                       name="companyName" value="{{ old('companyName') }}" required autocomplete="companyName">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                @enderror
            </div>

            <!-- /end for company name input   -->

            {{--    <div class="form-group row">--}}
            {{--        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

            <div class="form-group">
                <input id="password" type="password" placeholder="Password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                @enderror
            </div>
            {{--    </div>--}}

            {{--    <div class="form-group row">--}}
            {{--        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

            <div class="form-group">
                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                       name="password_confirmation" required
                       autocomplete="new-password">
            </div>

            {{--        <label for="image" class="">Upload image</label>--}}
            <div class="form-group">
                <input type="file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Register') }}
            </button>
            <div class="text-center"><a class="btn btn-link text-right" href="/login">Log In</a></div>

        </form>


        {{--        <h2 class="sr-only">Login Form</h2>--}}
        {{--        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>--}}
        {{--        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>--}}
        {{--        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>--}}


        {{--        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>--}}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<script>
    import Index from "../../../public/vendors/Flot/examples/zooming/index.html";
    export default {
        components: {Index}
    }
</script>
<!--old registeration code-->

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                <!--   for company name input -->--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="companyName" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="text" class="form-control @error('companyName') is-invalid @enderror" name="companyName" value="{{ old('companyName') }}" required autocomplete="companyName">--}}

{{--                                @error('email')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                <!-- /end for company name input   -->--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="image" class="col-md-4 col-form-label text-md-right">Upload image</label>--}}
{{--                            <div class="col-md-6">--}}
{{--                            <input  type="file"  id="image" name="image" >--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
<script>
    import Index from "../../../public/vendors/Flot/examples/zooming/index.html";
    export default {
        components: {Index}
    }
</script>
