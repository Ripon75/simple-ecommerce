@extends('admin.layout.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h1>Edit Product</h1>
                            <a href="{{route('products.index')}}" class="btn btn-primary">All Product</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$product->title}}" id="title">
                                  </div>

                                  <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{$product->price}}" id="price">
                                  </div>

                                  <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" id="qty">
                                  </div>

                                  <div class="form-group">
                                    <label for="des">Description</label>
                                    <input type="text" class="form-control" name="description" value="{{$product->description}}" id="des">
                                  </div>

                                  <div>
                                    <label>Old Image</label>
                                    <img width="50" height="50" src="/upload/productImages/{{$product->image}}">
                                </div>

                                  <div>
                                      <label>Change Image</label>
                                      <input type="file" class="form-control" name="image" id='img'>
                                  </div>

                                  <input type="submit" value="Update" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection