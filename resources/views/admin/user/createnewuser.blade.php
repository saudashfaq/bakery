@extends('layouts.appss')

@section('content')
    {{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    {{--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}
    {{--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
    {{--    <!------ Include the above in your HEAD tag ---------->--}}

    <style>

        /*
     * General styles
     */

        body, html {
            height: 100%;
            background-repeat: no-repeat;
            background-color: #d3d3d3;
            font-family: 'Oxygen', sans-serif;
            font-size: 14px;
        }

        .main {
            margin-top: 70px;
        }

        h1.title {
            font-size: 50px;
            font-family: 'Passion One', cursive;
            font-weight: 400;
        }

        hr {
            width: 10%;
            color: #fff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 14px;
        }

        input,
        input::-webkit-input-placeholder {
            font-size: 9px;
            padding-top: 3px;
        }

        .main-login {
            background-color: #fff;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

        }

        .main-center {
            margin-top: 30px;
            margin: 0 auto;
            max-width: 470px;
            padding: 40px 40px;

        }

        .login-button {
            margin-top: 3px;
        }

        .login-register {
            font-size: 8px;
            text-align: center;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 32px;
            height: 17px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 17px;
            left: 2px;
            bottom: px;
            background-color: #2196F3;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>


    {{--    <div class="container">--}}
    {{--        <div class="row main">--}}
    <div class="panel-heading">
        <div class="panel-title text-center">
            <br>
            <h2 class="title" style="margin-top: 50px;"><b>Create New User </b></h2>
            {{--                        <hr />/--}}
        </div>
    </div>
    <div class="main-login main-center">
        <form class="form-horizontal" method="post" action="{{url(route('store.newuser'))}}">

            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">{{__('Name')}}</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="name" id="name" placeholder="User Name" required
                               autocomplete="name"/>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">{{__('Email')}}</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror " name="email"
                               id="email" placeholder="User Email" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">{{__('Password')}}</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <!--  confirm password   -->
            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">{{__('Confirm-password')}}</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></span>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password">

                    </div>
                </div>
            </div>
            <div><label for="email" class="cols-sm-2 control-label">{{__('Assigning-Role ')}}</label></div>
            @foreach($roles as $role)
              <div> <label class="switch " style="margin:5px; margin-bottom: 10px;">
                    <input type="checkbox" name="role[]" value="{{$role}}">
                    <span class="slider round"></span>
                </label> <span style="font-size:17px;">{{$role}}</span></div>
            @endforeach


            <div><label for="email" class="cols-sm-2 control-label">{{__('Assigning-Permissions ')}}</label></div>
            @foreach($permissions as $permission)
                <div class="form-group">
                    <label class="switch " style="margin:5px; margin-bottom: 10px;">
                        <input type="checkbox" name="permission[]" value="{{$permission}}">
                        <span class="slider round"></span>
                    </label> <span style="font-size:17px;">{{$permission}}</span>
                </div>
            @endforeach
            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
            </div>
            @csrf
        </form>
    </div>

    {{--    <script type="text/javascript" src="assets/js/bootstrap.js"></script>--}}

@endsection
