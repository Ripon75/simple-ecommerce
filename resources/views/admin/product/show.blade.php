@extends('admin.layout.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h1>Product Details</h1>
                            <a href="{{route('products.index')}}" class="btn btn-primary">All Product</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            Title : {{$product->title}} <br><br>
                            Price : {{$product->price}} <br><br>
                            Quantity : {{$product->quantity}} <br><br>
                            Description : {{$product->description}} <br><br>
                            Image : <br>
                            <img width="250" height="200" src="/productImage/{{$product->image}}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection