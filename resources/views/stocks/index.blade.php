{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')
{{--    @include('inc.sidebar')--}}
{{--    @include('inc.sidetemplate')--}}
    <div class="right_col" role="main">
        {{--    <!-- top tiles -->--}}
        {{--    <div class="row" style="display: inline-block;" >--}}
        <div class="x_panel tile ">
    <div class="main">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Raw material </h2>
            </div>


            <div class="pull-right">
                <a class="btn btn-success text-light" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                   data-attr="{{ route('stocks.create') }}" title="Add Stock"> <i class="fas fa-plus-circle"></i>
                    Add Stock
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table id="datatableid"  class="table table-bordered table-responsive-lg table-hover myTable ">
        <thead class="thead-dark">
        <tr>
{{--            <th>sr#</th>--}}
            <th>Items</th>
            <th>Price</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($stocks as $stock)
            <tr>
{{--                {{dd($stock)}}--}}
{{--                <td>{{ ++$i }}</td>--}}
                <td>{{$stock->items}}</td>
                <td>{{$stock->price}}</td>
                <td>{{$stock->unit->name}}</td>
{{--                <td>{{$stock->unit_id}}</td>--}}
                <td>{{$stock->quantity}}</td>
{{--                for edit  and delet button--}}
                <td style="width: 150px;">
                    <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">

                        <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                           data-attr="{{ route('stocks.show', $stock->id) }}" title="show">
                            <i class="fa fa-eye text-success  fa-lg" style="font-size:19px"></i>
                        </a>


                        <a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                           data-attr="{{ route('stocks.edit', $stock->id) }} " title="Edit">
                            <i class="fas fa-edit text-gray-300" style="font-size:17px"></i>
                        </a>


                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return deleteAlert()" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>

{{--                        for price  update--}}{{--//onclick="return confirm('Are you sure?')"--}}
                        <a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                           data-attr="{{ route('stock-add-page', $stock->id) }} " title="update stock">
                            <i class="fa fa-plus" style="font-size:19px"></i>
                        </a>
            <!-- for show history by items id   -->
                        <a class="text-secondary"

                           href="{{ route('history.byid', $stock->id) }}"  title="History">
                            <i class="fa fa-history text-success " style="font-size:20px;"></i>
                        </a>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

{{--    {!! $stocks->links() !!}--}}

    </div>
    </div>
    </div>

{{--..........................modal ......--}}

    <!-- small modal -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
{{--                        @include('stocks.show')--}}
                        <!-- the result to be displayed apply here -->
{{--   .................--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- medium modal -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>





@endsection
