{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')
{{--    @include('inc.sidebar')--}}
<div class="right_col" role="main">
    {{--    <!-- top tiles -->--}}
    {{--    <div class="row" style="display: inline-block;" >--}}
    <div class="x_panel tile ">
    <div class="main">
        <a href="/stocks" class=" btn btn-primary">Go Back</a>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h1>History </h1>
                </div>
            </div>
        </div>

        <table id="datatableid" class="table table-bordered table-responsive-lg table-hover myTable "> {{--myTable  for table design css class --}}

            <thead class="thead-dark">
            <tr>
{{--                    <th>sr#</th>--}}

                <th>Id</th>
                <th>Item</th>
                <th>Unit</th>
                <th>Quantity</th>
                <th>Old price </th>
                <th>New price </th>
                <th> <span style="color: green;">+</span> Increment </th>
                <th> <span style="color: red;">-</span> Decrement</th>
                <th >Updated at</th>
                {{--{{dd($histories->stocks)}}--}}
                {{--        {{dd(stocks)}}--}}

            </tr>
            </thead  >
            <tbody>
            @foreach ($histories as $history)
                <tr class="background-">
                    {{--            {{dd($history)}}--}}
                    {{--                {{dd($stock)}}--}}
                    <td>{{$history->stocks->id}}</td>
                    <td>{{$history->stocks->items}}</td>
                    <td>{{$history->stocks->unit->name }}</td>
                    <td>{{$history->stocks->quantity }}</td>
                    <td>{{$history->old_price}}</td>
                    <td>{{$history->new_price}}</td>
                    <td style="color: green;">{{$history->increment}}</td>
                    <td style="color: red;">{{$history->decrement}}</td>
                    <td>{{$history->created_at->format('d.m.y')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{--        {!! $histories->links() !!}--}}



    </div>

    </div></div>
@endsection

