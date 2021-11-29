
<h2 class="text-center">Edit Product  </h2>
<br/>
{{--{{$product->image}}--}}
{{--<div>--}}
{{--<input type="file">--}}
{{--    <img src="{{url('images', $product->image) }}" alt="cake image"--}}
{{--         class="rounded-circle" width="100" height="80">--}}
{{--</div>--}}
{!! Form::open(['action' => ['App\Http\Controllers\ProductionController@updateProduct'  , $product->id ], 'method' => 'POST']) !!}
{{--{!! Form::open(['route' => 'storeProduct.product' , 'method' => 'POST' , 'enctype'=>'multipart/form-data' ]) !!}--}}

{{--product name with image form--}}
<div class="table-responsive " style="width:600px;">
    <div class="form-group">
        <div class="col-md-11">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $product->title , ['class' =>  'form-control' , 'placeholder' => 'Product Title' ]) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-11">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $product->description , ['class' =>  'form-control' , 'placeholder' => 'Description', 'rows'=>'3']) }}
        </div>
    </div>
    {{--        <div class="form-group">--}}
    {{--            {{Form::label('price', 'Price')}}--}}
    {{--            {{Form::text('price', '' , ['class' =>  'form-control' , 'placeholder' => 'Price' ]) }}--}}

    {{--        </div>--}}

    <div class="form-group">
        <div class="col-md-11">
            {{Form::label('category_id', 'Category')}}
            {{Form::select('category_id' ,$categories , null ,['class' =>  'form-control' , 'value' => $product->category->name ]) }}

        </div>
    </div>
    <div class="form-group">
        <div class="col-md-11">
            {{Form::label('size', 'Size')}}
            {{Form::select('size',['1pond'=>'1 Pond' , '2pond'=>'2 Pond' , 'large'=>'Large'], '' , ['class' =>  'form-control' , 'value' => $product->size]) }}
        </div>
{{--    </div>--}}
{{--    <input type="file" name="image" value=" {{$product->image}}">--}}
{{--    <img src="{{url('images', $product->image) }}" alt="cake image"--}}
{{--         class="rounded-circle" width="100" height="80">--}}
{{--</div>--}}

    <div class="form-group">

        <div class="col-md-11">
            {{Form::label('image', 'Image')}}
            {{Form::file('image', ['class' =>  'form-control' , 'placeholder' => 'Image' ]) }}
        </div>
        </div>
        {{--        <div class="table-responsive">--}}
        {{--            <span id="error"></span>--}}
        <span id="result"></span>
        <table class="table table-bordered" id="item_table" style="width:90%;">
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
        <div align="center" style="width:95%;">
            {{Form::hidden('_method' , 'PUT')}}
            {{Form::submit('submit', ['class' =>  'btn btn-block btn-success btn-large' ,  'id'=>'save', ' value'=>'Save'])}}
        </div>

    {{--    </form>--}}{{--  {!! Form::close() !!}--}}
    {!! Form::close() !!}
    {{--.................................--}}

    <script>
        $(document).ready(function () {

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number) {


                html = '<tr>';
                @foreach($product->stocks as  $value )
{{--                {{dd($value->items)}}--}}
{{--                html += '<td>{{Form::select('item[]', $products, null,['class' =>  "form-control item_name"  , 'placeholder'=>"select"]) }}</td>';--}}
                html += '<td>{{Form::select('item[]' ,[$value->items] , ['class' =>  'form-control' , 'placeholder'  => 'bdshbh' ]) }}</td>';


                html += '<td> {{Form::number('quantity[]', $value->pivot->quantity , ['class' =>  "form-control item_quantity" , 'placeholder' => 'Quantity']) }}</td>';
                {{--<td> {{Form::label('unit_id', 'Unit')}}</td>--}}

                    html += '<td>{{Form::select('unit[]', $units , null , ['class' =>  "controlt", 'placeholder' => 'Select Unit' ]) }}</td>';
{{--                    html += '<td>{{Form::select('unit_id',$products, ['class' =>  'form-control' , 'placeholder' => $value->items ]) }}</td>';--}}

                if (number > 1) {
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                    $('tbody').append(html);

                } else {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                    $('tbody').html(html);
                }@endforeach

            }

            $(document).on('click', '#add', function () {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function () {
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


{{--    </div>--}}
</div>
