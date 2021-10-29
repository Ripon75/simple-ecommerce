<div>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      
      <li class="nav-item nav-category">Main Menu</li>
  
      {{-- <li class="nav-item">
        <a class="nav-link" href="">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li> --}}
  
      <li class="nav-item">
          <i class="menu-icon typcn typcn-coffee"></i>
          <a class="nav-link" href="{{route('products.index')}}">
          <span class="menu-title">Products</span>
        </a>
      </li>

      <li class="nav-item">
          <i class="menu-icon typcn typcn-coffee"></i>
          <a class="nav-link" href="{{route('showOrder')}}">
          <span class="menu-title">Orders</span>
        </a>
      </li>
  
    </ul>
  </nav>
</div>
