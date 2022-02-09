
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

