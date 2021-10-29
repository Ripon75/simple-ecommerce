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

    <!-- Banner Ends Here -->
    <div class="mb-20">
        banner
    </div>
  
    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading mt-10">

    {{--start sesession message --}}
        @if(session()->has('message'))

        <div class="alert alert-success ml-auto" style="width: 50%">
            <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
        </div>

        @endif
    {{--end sesession message --}}
                <div class="card">

                    <div class="card-header">
                      Your Selected Product
                      <a href="{{url('/')}}" class="btn btn-success btn-sm float-right">All Product</a>
                    </div>

                    <div class="card-body">

                        <form action="{{route('order')}}" method="POST">
                        @csrf
                        <table class="table">
                            <thead>

                              <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                              </tr>

                            </thead>

                            <tbody>

                             @foreach ($cards as $card)
                             <tr>
                                <td>
                                    <input
                                    type="text"
                                    name="product_name[]"
                                    value="{{$card->product_title}}"
                                    hidden="">

                                    {{$card->product_title}}

                                </td>

                                <td>
                                    <input
                                    type="text"
                                    name="quantity[]"
                                    value="{{$card->quantity}}"
                                    hidden="">

                                    {{$card->quantity}}

                                </td>

                                <td>
                                    <input
                                    type="text"
                                    name="price[]"
                                    value="{{$card->price}}"
                                    hidden="">

                                    {{$card->price}}</td>

                                <td>
                                    <a href="{{route('removeCard', $card->id)}}" class="btn btn-danger btn-sm">Remove</a>
                                </td>
                              </tr>
                             @endforeach

                            </tbody>
                          </table>
                          <button class="btn btn-success float-right">Confirm Order</button>
                        </form>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


    <!-- Additional Scripts -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/owl.js')}}"></script>
    <script src="{{asset('assets/js/slick.js')}}"></script>
    <script src="{{asset('assets/js/isotope.js')}}"></script>
    <script src="{{asset('assets/js/accordions.js')}}"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
