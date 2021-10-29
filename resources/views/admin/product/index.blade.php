@extends('admin.layout.index')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>All Product</h4>
                    <a href="{{route('products.create')}}" class="btn btn-success">Create Product</a>
                </div>

                @if(session()->has('message'))

                <div class="alert alert-success ml-auto" style="width: 50%">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}
                </div>
                              
                @endif

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                           
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->description}}</td>
                                <td>
                                    <img  src="upload/productImages/{{$product->image}}">
                                </td>
                               
                                <td>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                
                                        <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">Edit</a>

                                        <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">Show</a>
                
                                        @csrf
                                        @method('DELETE')
                
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection