{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')
    <div class="right_col" role="main">
        {{--    <!-- top tiles -->--}}
        {{--    <div class="row" style="display: inline-block;" >--}}
        <div class="x_panel tile ">
            <div class="main">
                @include('inc.messages')
                <div style="margin-left:100px;">

                    <div style="margin-left:70px;"><h2>Create Attribute Here </h2></div>
                    <br/>
                    <form method="post" action="{{ route('store.attribute') }}">

                        <div class="table-responsive " style="width:500px;">
                            <div class="form-group">
{{--                                <div class="col-md-13">--}}
                                    <label for="AttributeHead" >Attribute Head :</label>
                                    <input type="text"  class="form-control"  id="AttributeHead" name="AttributeHead" placeholder="Enter new Attribute Head ">
{{--                                </div>--}}
                            </div>
                            <div id="attributeRow">
                                <div class="form-inline text-center">
                                    <div class="form-group">
{{--                                        <div class="col-md-20">--}}
                                            <label>Attribute:</label>
                                            <input type="text" class="form-control" id="Attribute" name="attribute[]"
                                                   placeholder="Enter Attribute ">

{{--                                        </div>--}}
                                    </div>
                                    <button type="button" id="add_attribute_button" class="btn btn-primary mb-2 "
                                            onclick="addRow()" style="width:80px;"> Add
                                    </button>
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

    <script>

        function addRow() {
            $('#attributeRow').append('<div class="form-inline text-center">' +
                '<label for="Attribute">Attribute:</label> <input type="text" class="form-control" id="Attribute" name="attribute[]" placeholder="Enter Attribute "> ' +
                '<button type="button" id="remove_Row" class="btn btn-danger mb-2 " style="width:80px;"> Remove</button> </div>   ')

        }

        $(document).ready(function () {

            /*for remove button*/
            $("#attributeRow").on("click", "#remove_Row", function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                number--;
            });

        });


    </script>




@endsection
