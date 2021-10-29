<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="#">
            Admin
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="{{asset('admin/assets/images/logo-mini.svg')}}" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class = "navbar-nav">
           
            <li class = "nav-item">
                <a  class = "nav-link" href = "{{route('products.index')}}">Home</a>
            </li>

            <li class = "nav-item">
                <a  class = "nav-link" href = "">About Us</a>
            </li>

            <li class = "nav-item mr-5">
                <a  class = "nav-link" href = "">Contact Us</a>
            </li>

            <li>

            </li>
            <form class="form-inline" action="{{route('productSearch')}}" method="get"   style="float: right;">
                @csrf
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
    
            <li>
                <x-app-layout>
    
                </x-app-layout>
            </li>
        </ul>

        

    
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
        
    </div>
</nav>