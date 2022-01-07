{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')

    <div class="right_col" role="main">
        {{--    <!-- top tiles -->--}}
        {{--    <div class="row" style="display: inline-block;" >--}}
        <div class="x_panel tile ">
            <div class="main">

                <div style="margin-left:100px;">

                    <div style="margin-left:70px;"><h2>Create Attribute Here </h2></div>
                    <br/>
                    <form method="post" action="{{ route('store.category') }}">


                        {{--        <form id="product_form" name="product_form" method="post" action="#" enctype="multipart/form-data">--}}
                        <div class="table-responsive " style="width:500px;">
                            <div class="form-group">
                                <div class="col-md-13">
                                    <label for="title">Category Name:</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Enter new category">

                                </div>
                            </div>


                            <div align="center">
                                <br>
                                <button type="submit" class="btn btn-block btn-success btn-large"> SAVE
                                </button>
                            </div>
                        </div>
                        @csrf

                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
