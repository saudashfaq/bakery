@extends('layouts.appss')

@section('content')
    <style>

        body {
            background-color: #ddd;
            font-family: "Poppins", sans-serif;
            font-weight: 300
        }

        .card {
            padding: 10px;
            border: none
        }

        .height {
            height: 100vh
        }

        .inputs span {
            font-size: 13px;
            font-weight: 600;
            color: #9e9e9e
        }

        .inputs input {
            height: 48px;
            border: 2px solid #9e9e9e
        }

        .inputs input:focus {
            border: 2px solid blue;
            box-shadow: none
        }

        label.radio {
            cursor: pointer;
            width: 100%
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            padding: 7px 14px;
            border: 2px solid blue;
            display: inline-block;
            color: blue;
            border-radius: 3px;
            text-transform: uppercase;
            width: 100%;
            height: 49px;
            display: flex;
            justify-content: start;
            align-items: center
        }

        label.radio input:checked + span {
            border-color: blue;
            background-color: blue;
            color: #fff;
            width: 100%;
            height: 49px;
            display: flex;
            justify-content: start;
            align-items: center
        }

        .name {
            font-size: 13px;
            font-weight: 600;
            color: #9e9e9e;
            margin-left: 3px
        }

        .options {
            text-decoration: none
        }

        .btn-outline-primary {
            color: #0000ff;
            border-color: #0000ff
        }

        .btn-outline-primary:hover {
            background-color: #0000ff;
            border-color: #0000ff
        }
    </style>

    <form method="post" action="{{route('admin.profileupdate' , $user->id) }} " enctype="multipart/form-data" >
    {{ csrf_field() }}
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-6x" style="margin-bottom: 50px">
                <div class="card py-5">
                    <div class="inputs px-4"><span class="text-uppercase">Name</span>
                        <input type="text" class="form-control" name="name" value="{{$user->name}} ">
                    </div>
                    <div class="row mt-3 g-2">
                        <div class="col-md-12">
                            <div class="inputs px-4"><span class="text-uppercase">Email</span>
                                <input type="text" class="form-control" name="email" value="{{$user->email}}">
                            </div>
                        </div>
                        {{--                    <div class="col-md-6">--}}
                        {{--                        <div class="inputs px-4"> <span class="text-uppercase">Location</span> <input type="text" class="form-control"> </div>--}}
                        {{--                    </div>--}}
                    </div>
                    <div class="row g-2 mt-3">
                        {{--                    <span class="text-uppercase px-4 name">Billing Rates</span>--}}
                        {{--                    <div class="col-md-6">--}}
                        {{--                        <div class="px-4"> <label class="radio"> <input type="radio" name="rate" value="Hourly Rate" checked> <span>Hourly Rate</span> </label> </div>--}}
                        {{--                    </div>--}}
                        {{--                    <div class="col-md-6">--}}
                        {{--                        <div class="px-4"> <label class="radio"> <input type="radio" name="rate" value="Yearly Rate"> <span>Yealy Rate</span> </label> </div>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}
                        <div class="mt-3 px-4"><span class="text-uppercase name">Profile Picture</span>
                            <div class="d-flex flex-row align-items-center mt-2"><img
                                    src="{{url('images/user', Auth::user()->image) }}" width="60" height="50"
                                    class="rounded">
                                <div class="ml-3"><input type="file" name="image"></div>
                            </div>
                        </div>
                        <div class="mt-3 px-4 d-flex justify-content-between align-items-center">

                            <button class="btn btn-primary" type="submit">Update </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @csrf
    </form>

@endsection
