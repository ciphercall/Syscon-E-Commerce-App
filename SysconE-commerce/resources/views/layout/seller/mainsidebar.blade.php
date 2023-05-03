<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{url('/seller-dashboard')}}">Syscon(E-Commerce)</a>
    </div>
    <ul class="sidebar-menu">
      <li class="active"><a class="nav-link" href="{{url('/seller-dashboard')}}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
      
      <li class="nav-item dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>Orders</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="{{url('/seller/all-order')}}">All Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller/pending-order')}}">Pending Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller/progress-order')}}">Progress Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller/delivered-order')}}">Delivered Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller/completed-order')}}">Completed Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller/declined-order')}}">Declined Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller/cash-on-delivery')}}">Cash On Delivery</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Manage Products</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('products.create') }}">Product Create</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller/product')}}">Products</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller/pending-product')}}">Pending Products</a></li>
          <li class=""><a class="nav-link" href="#">Product Reviews</a></li>
          <li class=""><a class="nav-link" href="#">Product Report</a></li>
        </ul>
      </li>

      <li class=""><a class="nav-link" href=""><i class="far fa-newspaper"></i> <span>My Withdraw</span></a></li>
      <li class=""><a class="nav-link" href=""><i class="far fa-envelope"></i> <span>Message</span></a></li>
      <li class=""><a class="nav-link" href="{{url('/customer')}}"><i class="fas fa-user"></i> <span>Visit User Dashboard</span></a></li>
    </ul>       
  </aside>
</div>
