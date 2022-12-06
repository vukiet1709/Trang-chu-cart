@extends('admin.layout.index')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product Management</h2>
            </div>
            <div class="pull-right" style="padding-bottom: 10px" >
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add </a>
                <a class="btn btn-success" href="{{ route('admin.category.index') }}"> Management Category</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Details</th>
            <th>Category</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($products as $key => $product)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_price }}</td>
            <td style="text-align: center"><img src="{{ asset('image/product/'.$product->img) }}" alt="" style=" max-width:200px; max-height:auto; "></td>
            <td>{{ $product->product_description }}</td>
            <td>{{ $product->category->category_name }}</td>
            
           
            <td>
                <form action="{{ route('products.destroy',$product->product_id ) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('products.show',$product->product_id ) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->product_id ) }}">Edit</a>
   
                    <a class="btn btn-primary" href="{{ route('products.destroy',$product->product_id ) }}">Delete</a>
   
                </form>
            </td>
        </tr>
        @endforeach
    </table>
      
@endsection
