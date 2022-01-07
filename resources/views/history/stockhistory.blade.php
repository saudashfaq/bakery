{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')
{{--    @include('inc.sidebar')--}}
{{--    @include('inc.side')--}}
{{--    @include('inc.nav')--}}
<div class="right_col" role="main">
{{--    <!-- top tiles -->--}}
{{--    <div class="row" style="display: inline-block;" >--}}
    <div class="x_panel tile ">
    <div class="main">
{{--        <a href="/stocks" class=" btn btn-primary">Go Back</a>--}}

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
{{--    <th>sr#</th>--}}
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
{{--            <td>{{ ++$i }}</td>--}}
            <td>{{$history->stocks->items}}</td>
            <td>{{$history->stocks->unit->name }}</td>
            <td>{{$history->stocks->quantity }}</td>
            <td>{{$history->old_price}}</td>
            <td>{{$history->new_price}}</td>
            <td style="color: green;">{{$history->increment}}</td>
            <td style="color: red;">{{$history->decrement}}</td>
            <td>{{$history->created_at->format('d.m.y')}}</td>



{{--            <td>{{$history->product}}</td>--}}
{{--            <td>{{$stock->price}}</td>--}}
{{--            <td>{{$stock->unit->name}}</td>--}}
{{--            --}}{{--                <td>{{$stock->unit_id}}</td>--}}
{{--            <td>{{$stock->quantity}}</td>--}}
{{--            --}}{{--                for edit  and delet button--}}
        </tr>
    @endforeach
    </tbody>
</table>
{{--        {!! $histories->links() !!}--}}


</div></div></div>
</div>


@endsection












{{--...............................................................................--}}


{{--copy blade code from audit site this is not use in project --}}
{{--<ul>--}}
{{--    @forelse ($audits as $audit)--}}
{{--        <li>--}}
{{--            @lang('article.updated.metadata', $audit->getMetadata())--}}

{{--            @foreach ($audit->getModified() as $attribute => $modified)--}}
{{--                <ul>--}}
{{--                    <li>@lang('article.'.$audit->event.'.modified.'.$attribute, $modified)</li>--}}
{{--                </ul>--}}
{{--            @endforeach--}}
{{--        </li>--}}
{{--    @empty--}}
{{--        <p>@lang('article.unavailable_audits')</p>--}}
{{--    @endforelse--}}
{{--</ul>--}}
