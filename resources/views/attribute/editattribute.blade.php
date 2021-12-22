@extends('layouts.app')

@section('content')
    @include('inc.sidebar')



    <div class="main">
{{--        {{dd($attributeHeads)}}--}}

        <div style="margin-left:100px;">

            <div style="margin-left:70px;"><h2>Edit Attribute Here </h2></div>
            <br/>
            <form method="post" action="{{ route('update.attribute' ,$attributeHeads->id ) }}">

                <div class="table-responsive " style="width:500px;">
{{--                    @foreach($attributeHeads as $attributeHead)--}}
                    <div class="form-group">
                        <div class="col-md-13">
                            <label for="AttributeHead">Attribute Head :</label>
                            <input type="text" class="form-control" id="AttributeHead" value="{{$attributeHeads->name}}" name="AttributeHead"
                                   placeholder="Enter new Attribute Head ">

                        </div>
                    </div>
{{--                    @endforeach--}}
                    <div id="attributeRow">
                        <div class="form-inline text-center">
                    @foreach($attributeHeads->attributes as $attribute)
                            <div class="form-group">
                                <div class="col-md-20">
                                    <label for="Attribute">Attribute:</label>
                                    <input type="text" class="form-control" id="Attribute" name="attribute[]"
                                    value="{{$attribute->name}}"  placeholder="Enter Attribute ">
                                    <input type="hidden" id="custId" name="attribute_id[]" value="{{$attribute->id}}">
                                </div>
                            </div>
                            @endforeach
                            <button type="button" id="add_attribute_button" class="btn btn-primary mb-2 "
                                    onclick="addRow()" style="width:80px;"> Add
                            </button>
                        </div>
                    </div>
                    <div align="center">
                        <br>
                        <button type="submit" class="btn btn-block btn-success btn-large"> Update
                        </button>
                    </div>

                </div>
                @csrf
            </form>
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
