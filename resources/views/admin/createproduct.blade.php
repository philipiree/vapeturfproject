@extends('layouts.master')


@section('title')
    Create Product
@endsection


@section('content')
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-10 mx-auto">
             <div class="card">
                 <div class="card-header text-center">
                     <h1>Create Product</h1>
                 </div>
                 <hr>
                 <div class="card-body">
                     <div class="row justify-content-center">
                        <div class="col-md-7">
                            {!! Form::open(['action' =>'ProductsController@store', 'method' => 'POST']) !!}
                                <div class="form-group">
                                    {{ Form::label('name', 'Product Name') }}
                                    {{ Form::text('name', '', ['class'=> 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('maker', 'Maker') }}
                                    {{ Form::text('maker', '', ['class'=> 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('flavor', 'Flavor') }}
                                    {{ Form::text('flavor', '', ['class'=> 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('description', 'Description') }}
                                    {{ Form::textarea('description', '', ['id' => 'editor', 'class'=> 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('price', 'Price') }}
                                    {{ Form::text('price', '', ['class'=> 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('size', 'Size') }}
                                    {{ Form::text('size', '', ['class'=> 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('strength', 'Strength') }}
                                    {{ Form::text('strength', '', ['class'=> 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('quantity', 'Quantity') }}
                                    {{ Form::text('quantity', '', ['class'=> 'form-control']) }}
                                </div>
                                <div class="text-center">
                                {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                                </div>
                            {!! Form::close() !!}
                        </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endsection

@section('scripts')

@endsection

