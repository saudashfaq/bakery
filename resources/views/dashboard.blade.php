{{--@extends('layouts.app')--}}
@extends('layouts.appss')

@section('content')
    <div class="right_col" role="main">
        {{--    <!-- top tiles -->--}}
        {{--    <div class="row" style="display: inline-block;" >--}}

        <div class="main">
        <h1> Dashboard </h1>
        <h3>   You are logged in</h3>
    </div>
    </div>


   <script>
       var constantVariable = 60;

       console.log(constantVariable);
        var  person = {
            fname: 'hassan',
            lname: 'afzal',
            hobiees:['chess','cricket','footbal'],
            address:{street: 'street # 3', house:'house no 621' , twon:'green twon gojra', religion:{hassan: 'islam' , ali: 'islam' , jhon: 'none_muslim'
                }}
        }
        for (let i = 0 ; i<=10 ; i++){
            console.log();
        }

        console.log(person.hobiees, person.address.house);
        console.log(person.fname, person.lname, person.address.religion.hassan);


   </script>


{{--<h3>Dashboard</h3>--}}

{{--        <a href="stock" class=" btn btn-primary"> Check stock Material  </a>--}}
{{--      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--           Manage your Stock--}}
{{--           </button>--}}
{{--        <!-- Modal -->--}}
{{--        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                    <div class="modal-body">--}}
{{--                        <div class="col-md-8 col-md-offset-2">--}}
{{--                            {!! Form::open() !!}--}}
{{--                            <div class="form-group">--}}
{{--                                {{Form::label('product', 'Product')}}--}}
{{--                                {{Form::text('product', '' , ['class' =>  'form-control' , 'placeholder' => 'Product' ]) }}--}}

{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                {{Form::label('price', 'Price')}}--}}
{{--                                {{Form::text('price', '' , ['class' =>  'form-control' , 'placeholder' => 'price' ]) }}--}}

{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                {{Form::label('unit_id', 'Unit')}}--}}
{{--                                {{Form::select('unit_id', $unit , null ,['class' =>  'form-control' , 'placeholder' => 'Select Unit' ]) }}--}}

{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                {{Form::label('Quantity', 'Quantity')}}--}}
{{--                                {{Form::text('Quantity', '' , ['class' =>  'form-control' , 'placeholder' => 'Quantity' ]) }}--}}

{{--                            </div>--}}

{{--                            {{Form::submit('submit', ['class' =>  'btn btn-primary'])}}--}}

{{--                            {!! Form::close() !!}--}}

{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                        <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}



{{--        </div>--}}
@endsection


{{-- //['action' => 'stock' , 'method' => 'POST']--}}
