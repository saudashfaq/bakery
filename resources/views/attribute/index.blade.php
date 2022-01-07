{{--@extends('layouts.app ')--}}
@extends('layouts.appss')

@section('content')

    <div class="right_col" role="main">
        {{--    <!-- top tiles -->--}}
        {{--    <div class="row" style="display: inline-block;" >--}}
        <div class="x_panel tile ">
            <div class="main">

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h1>Attributes </h1>
                        </div>

                        <div class="pull-right">
                            {{--                    <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"--}}
                            {{--                       data-attr="{{ route('create.attribute') }}" title=" Create Attributes"> <i class="fas fa-plus-circle"></i>--}}
                            {{--                        Create Attributes--}}
                            {{--                    </a>--}}


                            <a class="btn btn-success text-light"
                               href="{{ route('create.attribute') }}" title=" Create Attributes"> <i
                                    class="fas fa-plus-circle"></i>
                                Create Attributes
                            </a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table id="datatableid" class="table table-bordered table-responsive-lg table-hover myTable ">
                    <thead class="thead-dark">
                    <tr>
                        {{--            <th>sr#</th>--}}
                        <th> Attribute Heads</th>
                        <th>Attributes</th>
                        <th style="width: auto">Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($attributeHeads as $attributeHead)
                        <tr>
                            {{--                {{dd($stock)}}--}}

                            <td>{{$attributeHead->name}}</td>
                            <td> @foreach ($attributeHead->attributes as $attribute)
                                    {{$attribute->name}}
                                @endforeach </td>

                            {{--                for edit  and delet button--}}
                            <td style="width:100px;">
                            {{--                        <form action="{{ route('edit.attribute', $stock->id ) }}" method="POST">--}}


                            <!-- Edit Button -->
                                <a class="btn btn-round btn-danger" type="button"
                                   href="{{route('edit.attribute', $attributeHead->id)}}" title="Edit">
                                    <i class="fas fa-edit text-gray-300"></i>Edit
                                </a>


                                {{--                        </form>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
@endsection
