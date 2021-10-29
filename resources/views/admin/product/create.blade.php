@extends('admin.layout.index')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h1>Create Product</h1>
                            <a href="{{route('products.index')}}" class="btn btn-primary">All Product</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title" id="title">
                                  </div>

                                  <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" name="price" placeholder="Enter Price" id="price">
                                  </div>

                                  <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" placeholder="Enter Quantity" id="qty">
                                  </div>

                                  <div class="form-group">
                                    <label for="des">Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Enter Description" id="des">
                                  </div>

                                  <div>
                                      <input type="file" class="form-control" name="image" id='img'>
                                  </div>

                                  <input type="submit" value="Create" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection