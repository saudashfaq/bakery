{{--@extends('layouts.appss')--}}

{{--@section('content')--}}

{{--    <style>--}}

{{--        /*--}}
{{--     * General styles--}}
{{--     */--}}

{{--        body, html {--}}
{{--            height: 100%;--}}
{{--            background-repeat: no-repeat;--}}
{{--            background-color: #d3d3d3;--}}
{{--            font-family: 'Oxygen', sans-serif;--}}
{{--            font-size: 14px;--}}
{{--        }--}}

{{--        .main {--}}
{{--            margin-top: 70px;--}}
{{--        }--}}

{{--        h1.title {--}}
{{--            font-size: 50px;--}}
{{--            font-family: 'Passion One', cursive;--}}
{{--            font-weight: 400;--}}
{{--        }--}}

{{--        hr {--}}
{{--            width: 10%;--}}
{{--            color: #fff;--}}
{{--        }--}}

{{--        .form-group {--}}
{{--            margin-bottom: 15px;--}}
{{--        }--}}

{{--        label {--}}
{{--            margin-bottom: 14px;--}}
{{--        }--}}

{{--        input,--}}
{{--        input::-webkit-input-placeholder {--}}
{{--            font-size: 9px;--}}
{{--            padding-top: 3px;--}}
{{--        }--}}

{{--        .main-login {--}}
{{--            background-color: #fff;--}}
{{--            /* shadows and rounded borders */--}}
{{--            -moz-border-radius: 2px;--}}
{{--            -webkit-border-radius: 2px;--}}
{{--            border-radius: 2px;--}}
{{--            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);--}}
{{--            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);--}}
{{--            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);--}}

{{--        }--}}

{{--        .main-center {--}}
{{--            margin-top: 30px;--}}
{{--            margin: 0 auto;--}}
{{--            max-width: 470px;--}}
{{--            padding: 40px 40px;--}}

{{--        }--}}

{{--        .login-button {--}}
{{--            margin-top: 3px;--}}
{{--        }--}}

{{--        .login-register {--}}
{{--            font-size: 8px;--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .switch {--}}
{{--            position: relative;--}}
{{--            display: inline-block;--}}
{{--            width: 32px;--}}
{{--            height: 17px;--}}
{{--        }--}}

{{--        /* Hide default HTML checkbox */--}}
{{--        .switch input {--}}
{{--            opacity: 0;--}}
{{--            width: 0;--}}
{{--            height: 0;--}}
{{--        }--}}

{{--        /* The slider */--}}
{{--        .slider {--}}
{{--            position: absolute;--}}
{{--            cursor: pointer;--}}
{{--            top: 0;--}}
{{--            left: 0;--}}
{{--            right: 0;--}}
{{--            bottom: 0;--}}
{{--            background-color: #ccc;--}}
{{--            -webkit-transition: .4s;--}}
{{--            transition: .4s;--}}
{{--        }--}}

{{--        .slider:before {--}}
{{--            position: absolute;--}}
{{--            content: "";--}}
{{--            height: 16px;--}}
{{--            width: 17px;--}}
{{--            left: 2px;--}}
{{--            bottom: px;--}}
{{--            background-color: #2196F3;--}}
{{--            -webkit-transition: .4s;--}}
{{--            transition: .4s;--}}
{{--        }--}}

{{--        input:checked + .slider {--}}
{{--            background-color: #2196F3;--}}
{{--        }--}}

{{--        input:focus + .slider {--}}
{{--            box-shadow: 0 0 1px #2196F3;--}}
{{--        }--}}

{{--        input:checked + .slider:before {--}}
{{--            -webkit-transform: translateX(26px);--}}
{{--            -ms-transform: translateX(26px);--}}
{{--            transform: translateX(13px);--}}
{{--        }--}}

{{--        /* Rounded sliders */--}}
{{--        .slider.round {--}}
{{--            border-radius: 34px;--}}
{{--        }--}}

{{--        .slider.round:before {--}}
{{--            border-radius: 50%;--}}
{{--        }--}}
{{--    </style>--}}

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h4>Add New Outlet</h4>
        </div>

    </div>
</div>

    {{--    <div class="container">--}}
    {{--        <div class="row main">--}}
{{--    <div class="panel-heading">--}}
{{--        <div class="panel-title text-center">--}}
{{--            <br>--}}
{{--            <h1 class="title" style="margin-top: 50px;"><b>Create Outlet </b></h1>--}}
{{--            --}}{{--                        <hr />/--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="main-login main-center">
        <form class="form-horizontal" method="post" action="{{url(route('store.outlet'))}}">
            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">{{__('Outlet Name')}}</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="outlet_name" id="outlet_name" placeholder="Outlet_name " required
                               autocomplete="name"/>
                        @error('outlet_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">{{__('Type')}}</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control @error('type') is-invalid @enderror " name="type"
                               id="email" placeholder="Type" required autocomplete="type">
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">{{__('Branch Manager Name')}}</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input id="password" type="text" placeholder="Manager Name"
                               class="form-control @error('branch_manager_name') is-invalid @enderror" name="branch_manager_name" required
                               autocomplete="new-password">

                        @error('branch_manager_name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <!--  confirm password   -->
            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">{{__('Manager Email')}}</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-check" aria-hidden="true"></i></span>
                        <input id="password-confirm" type="email"  placeholder="Manager Email" class="form-control" name="manager_email"
                               required autocomplete="new-password">

                    </div>
                </div>
            </div>
    <div class="form-group">
        <label for="email" class="cols-sm-2 control-label">{{__('Location')}}</label>
        <div class="cols-sm-10">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                <input id="location" type="text" placeholder="Location"
                       class="form-control @error('location') is-invalid @enderror" name="location" required
                       autocomplete="new-location">

                @error('location')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
    </div>
            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Submit</button>
            </div>
            @csrf
        </form>
    </div>

    {{--    <script type="text/javascript" src="assets/js/bootstrap.js"></script>--}}

{{--@endsection--}}
