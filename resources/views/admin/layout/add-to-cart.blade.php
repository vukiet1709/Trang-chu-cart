@extends('admin.layout.index') 
@section('title', 'Products') 
@section('content') 

    <div class="container products"> 

        <div class="row"> 

            @foreach($products as $product) 

                <div class="col-xs-18 col-sm-6 col-md-3"> 

                    <div class="thumbnail"> 

                        <img src="{{ asset('image/product/'.$product->image) }}" width="200" height="100"> 

                        <div class="caption"> 

                            <h4>{{ $product->name }}</h4> 

                            <p>{{$product->description}}</p> 

                            <p><strong>Price: </strong> {{ $product->price }}$</p> 

                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p> 

                        </div> 

                    </div> 

                </div> 

            @endforeach 

        </div><!-- End row --> 

    </div> 

@endsection 