
@extends('layouts.app')

@section('content')
    @include('inc.sidebar')
    <div class="main">
{{--        <div class="align-content-center ">--}}
{{--            <div class="row">--}}

{{--<br />--}}
{{--<div class="container">--}}
    <h2>Product Recipe </h2>
    <br />
{{--    <h4 align="center">Enter Item Details</h4>--}}
{{--    <br />--}}
{{--...id="insert_form"            id="dynamic_form"       ,'id'=>'dynamic_form'--}}
{{--    <form method="post"  >--}}
   {!! Form::open(['route' => 'storeProduct.product' , 'method' => 'POST' , 'enctype'=>'multipart/form-data' ]) !!}
{{--{!! Form::open(['method' => 'POST' ,'id'=>'dynamic_form' , 'files'=> true]) !!}--}}
{{--product name with image form--}}
        <div class="table-responsive " style="width:600px;">
        <div class="form-group">
            <div class="col-md-13">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '' , ['class' =>  'form-control' , 'placeholder' => 'Product Title' ]) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-13">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '' , ['class' =>  'form-control' , 'placeholder' => 'Description', 'rows'=>'3']) }}
            </div>
        </div>
        {{--        <div class="form-group">--}}
        {{--            {{Form::label('price', 'Price')}}--}}
        {{--            {{Form::text('price', '' , ['class' =>  'form-control' , 'placeholder' => 'Price' ]) }}--}}

        {{--        </div>--}}

            <div class="form-group">
                <div class="col-md-13">
                    {{Form::label('category_id', 'Category')}}
                    {{Form::select('category_id' ,$categories , null ,['class' =>  'form-control' , 'placeholder' => 'Select Categories' ]) }}

                </div>
            </div>
        <div class="form-group">
            <div class="col-md-13">
            {{Form::label('size', 'Size')}}
            {{Form::select('size', ['1pond'=>'1 Pond' , '2pond'=>'2 Pond' , 'large'=>'Large'], '' , ['class' =>  'form-control' , 'placeholder' => 'Size' ]) }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-13">
            {{Form::label('image', 'Image')}}
            {{Form::file('image', ['class' =>  'form-control' , 'placeholder' => 'Image' ]) }}
            </div>
{{--        <div class="table-responsive">--}}
{{--            <span id="error"></span>--}}
            <span id="result"></span>
            <table class="table table-bordered"  id="item_table" >
                <tr>
                    <th>Enter Item Name</th>
                    <th>Enter Quantity</th>
                    <th>Select Unit</th>
{{--                    <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>--}}
                </tr>
{{--                <tbody>--}}
{{--                --}}
{{--                </tbody>--}}
            </table>
            <div align="center">
{{--                @csrf--}}
{{--                <input type="submit" name="submit" class="btn btn-info" value="Insert" />--}}
                {{Form::submit('submit', ['class' =>  'btn btn-block btn-success btn-large' ,  'id'=>'save', ' value'=>'Save'])}}
            </div>
        </div>

{{--    </form>--}} {!! Form::close() !!}

{{--</body>--}}


{{--.................................--}}


        <script>
            $(document).ready(function(){

                var count = 1;

                dynamic_field(count);

                function dynamic_field(number)
                {
                    html = '<tr >';
                    // html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
                    html += '<td>{{Form::select('item[]',$products ,null , ['class' =>  "form-control item_name" , 'placeholder' => 'Product'  , 'placeholder' => 'Select item' ,]) }}</td>';

                    html += '<td> {{Form::number('quantity[]', '' , ['class' =>  "form-control item_quantity" , 'placeholder' => 'Quantity']) }}</td>';
                {{--<td> {{Form::label('unit_id', 'Unit')}}</td>--}}

                    html += '<td>{{Form::select('unit[]', $units , null , ['class' =>  "form-control item_unit", 'placeholder' => 'Select Unit' ]) }}</td>';
                    if(number > 1)
                    {
                        html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                        $('tbody').append(html);
                    }
                    else
                    {
                        html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                        $('tbody').html(html);
                    }
                }

                $(document).on('click', '#add', function(){
                    count++;
                    dynamic_field(count);
                });

                $(document).on('click', '.remove', function(){
                    count--;
                    $(this).closest("tr").remove();
                });
                // Ajax code
                {{--$('#dynamic_form').on('submit', function(event){--}}
                {{--    event.preventDefault();--}}
                {{--    $.ajax({--}}
                {{--        url:'{{ route("createproduct.produce")}}',--}}
                {{--        method:'post',--}}
                {{--        data:$(this).serialize(),--}}
                {{--        dataType:'json',--}}
                {{--        beforeSend:function(){--}}
                {{--            $('#save').attr('disabled','disabled');--}}
                {{--        },--}}
                {{--        success:function(data)--}}
                {{--        {--}}
                {{--            if(data.error)--}}
                {{--            {--}}
                {{--                var error_html = '';--}}
                {{--                for(var count = 0; count < data.error.length; count++)--}}
                {{--                {--}}
                {{--                    error_html += '<p>'+data.error[count]+'</p>';--}}
                {{--                }--}}
                {{--                $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');--}}
                {{--            }--}}
                {{--            else--}}
                {{--            {--}}
                {{--                dynamic_field(1);--}}
                {{--                $('#result').html('<div class="alert alert-success">'+data.success+'</div>');--}}
                {{--            }--}}
                {{--            $('#save').attr('disabled', false);--}}
                {{--        }--}}
                {{--    })--}}
                {{--});--}}

            });
        </script>
    </div>
            </div>
{{--    </div>--}}
    </div>

@endsection

