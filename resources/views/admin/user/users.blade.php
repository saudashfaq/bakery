{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')
    <div class="right_col" role="main">
        {{--        <div class="x_panel tile ">--}}
        {{--            <div class="main">--}}
        <style>
            body {
                color: #566787;
                background: #f5f5f5;
                font-family: 'Varela Round', sans-serif;
                font-size: 13px;
            }

            .table-responsive {
                margin: 30px 0;
            }

            .table-wrapper {
                min-width: 1000px;
                background: #fff;
                padding: 20px 25px;
                border-radius: 3px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            }

            .table-title {
                padding-bottom: 15px;
                /*background: #299be4;*/
                background: #73879cc7;
                color: #fff;
                padding: 10px 20px;
                margin: -20px -25px 10px;
                border-radius: 3px 3px 0 0;
            }

            .table-title h2 {
                margin: 2px 0 0;
                font-size: 24px;
            }

            .table-title .btn {
                /*color: #566787;*/
                /*float: right;*/
                /*font-size: 13px;*/
                /*background: #fff;*/
                /*border: none;*/
                /*min-width: 50px;*/
                /*border-radius: 2px;*/
                /*border: none;*/
                /*outline: none !important;*/
                /*margin-left: 10px;*/
            }

            .table-title .btn:hover, .table-title .btn:focus {
                color: #26b2b9;
                background: #26b2b9;
            }

            .table-title .btn i {
                float: left;
                font-size: 21px;
                margin-right: 5px;
            }

            .table-title .btn span {
                float: left;
                margin-top: 2px;
            }

            table.table tr th, table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
            }

            table.table tr th:first-child {
                width: 60px;
            }

            table.table tr th:last-child {
                width: 100px;
            }

            table.table-striped tbody tr:nth-of-type(odd) {
                background-color: #fcfcfc;
            }

            table.table-striped.table-hover tbody tr:hover {
                background: #f5f5f5;
            }

            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }

            table.table td:last-child i {
                opacity: 0.9;
                font-size: 22px;
                margin: 0 5px;
            }

            table.table td a {
                font-weight: bold;
                color: #566787;
                display: inline-block;
                text-decoration: none;
            }

            table.table td a:hover {
                color: #2196F3;
            }

            table.table td a.settings {
                color: #2196F3;
            }

            table.table td a.delete {
                color: #F44336;
            }

            table.table td i {
                font-size: 19px;
            }

            table.table .avatar {
                border-radius: 50%;
                vertical-align: middle;
                margin-right: 10px;
            }

            .status {
                font-size: 30px;
                margin: 2px 2px 0 0;
                display: inline-block;
                vertical-align: middle;
                line-height: 10px;
            }

            .text-success {
                color: #10c469;
            }

            .text-info {
                color: #62c9e8;
            }

            .text-warning {
                color: #FFC107;
            }

            .text-danger {
                color: #ff5b5b;
            }

            .pagination {
                float: right;
                margin: 0 0 5px;
            }

            .pagination li a {
                border: none;
                font-size: 13px;
                min-width: 30px;
                min-height: 30px;
                color: #999;
                margin: 0 2px;
                line-height: 30px;
                border-radius: 2px !important;
                text-align: center;
                padding: 0 6px;
            }

            .pagination li a:hover {
                color: #666;
            }

            .pagination li.active a, .pagination li.active a.page-link {
                background: #03A9F4;
            }

            .pagination li.active a:hover {
                background: #0397d6;
            }

            .pagination li.disabled i {
                color: #ccc;
            }

            .pagination li i {
                font-size: 16px;
                padding-top: 6px
            }

            .hint-text {
                float: left;
                margin-top: 10px;
                font-size: 13px;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <!-- content         -->
{{--        <div class="container-xl">--}}
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-5">
                                <h2>User <b>Management</b></h2>
                            </div>
                            <div class="col-sm-7 ">
                                <a class="btn btn-success text-light pull-right"
                                 href="{{url(route('create.newuser'))}}" title=" Add New User"> <i class="fas fa-plus-circle"></i>
                                    Add New User
                                </a>
{{--                                <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>--}}
                            </div>
                        </div>
                    </div>
                    <table id="datatableid" class="table table-striped table-hover table table-bordered table-responsive-lg table-hover myTable ">
                        <thead class="thead-dark">
                        <tr>
                            <th>#Id</th>
                            <th>Name</th>
                            <th>Date Created</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                        <tr>

                            <td>{{$user->id}}</td>
                            <td><a href="#"><img src="/images/user/{{$user->image}}" class="avatar" alt="Avatar">{{$user->name}}</a>
                            </td>
                            <td>{{$user->created_at->format('d.m.y')}}</td>
                            <td>user</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td style="width: 170px;">
                                <form action="{{route('delete.user',$user->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                <a class="btn btn-round btn-primary" type="button" href="{{route('edit.user' , $user->id)}}" title="Edit" style="color: whitesmoke ; font-size: 14px;">
                                    <i class="fas fa-edit "></i>Edit
                                </a>

                                        <button class="btn btn-round btn-danger" type="submit" onclick="return deleteFunction();" title="Edit" style="color: whitesmoke ; font-size: 14px;">
                                            <i class="fas fa-trash "></i>Delete</button>
{{--                                <a class="btn btn-round btn-danger" type="submit" title="Edit" style="color: whitesmoke ; font-size: 14px;">--}}
{{--                                    <i class="fas fa-trash "></i>Delete--}}
{{--                                </a>--}}
                                </form>
                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
{{--    </div>--}}
    <script>
        function deleteFunction() {
            if(!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>



@endsection


