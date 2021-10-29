<!DOCTYPE html>
<html lang="en">
  <head>
   @include('user.layout.css_link')
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!--start header -->
   @include('user.layout.header')
   <!--end header -->

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    @include('user.layout.banner')
    <!-- Banner Ends Here -->

   <!-- start latest product -->
   <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="">view all products <i class="fa fa-angle-right"></i></a>

            <form class="form-inline" action="{{route('serach')}}" method="get" style="float: right;">
              @csrf
              <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search">
              <button class="btn btn-success" type="submit">Search</button>
            </form>
          </div>
        </div>

        @foreach ($products as $product)
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img width="150" height="100" src="upload/productImages/{{$product->image}}" alt=""></a>

            <div class="down-content">
              <a href="#"><h4>{{$product->title}}</h4></a>
              <h6>{{$product->price}}</h6>
              <p>{{$product->description}}</p>

              <form action="{{route('addCard',$product->id)}}" method="POST" class="form-inline">
                @csrf
                <button class="btn btn-success btn-sm">Add Card</button>
                <input type="number" style="width: 50px;height:30px" value="1" min="1"name="quantity">
              </form>

            </div>
          </div>
        </div>
        @endforeach
      </div>

      @if(method_exists($products, 'links'))
        <div>
          {!!$products->links()!!}
        </div>
        @endif
        
    </div>
  </div>
   <!-- end latest product -->
   
  <!--start future product -->
  @include('user.layout.future')
  <!--end future product -->

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Footer Part</p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
  @include('user.layout.script')

  </body>

</html>
