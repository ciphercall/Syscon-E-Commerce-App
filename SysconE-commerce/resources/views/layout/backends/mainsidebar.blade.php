<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{url('/dashboard')}}">Syscon(E-Commerce)</a>
    </div>
    <ul class="sidebar-menu">
      <li class="active"><a class="nav-link" href="{{url('/dashboard')}}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Settings</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="{{url('general-settings/1/edit')}}">General Setting</a></li>
          <li class=""><a class="nav-link" href="{{url('/currencyname')}}">Currency Setting</a></li>
          <li class=""><a class="nav-link" href="{{url('/timezone')}}">Timezone Setting</a></li>
          <li class=""><a class="nav-link" href="{{url('/status')}}">Status</a></li>
          <!-- <li class=""><a class="nav-link" href="{{url('/seller-status')}}">Seller Status</a></li> -->
          <li class=""><a class="nav-link" href="{{url('/order-status')}}">Order Status</a></li>
          <li class=""><a class="nav-link" href="{{url('/payment-status')}}">Payment Status</a></li>
          <li class=""><a class="nav-link" href="{{url('/unit')}}">Units</a></li>
        </ul>
      </li>
      
      <li class="nav-item dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>Orders</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="{{url('/all-order')}}">All Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/pending-order')}}">Pending Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/progress-order')}}">Progress Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/delivered-order')}}">Delivered Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/completed-order')}}">Completed Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/declined-order')}}">Declined Orders</a></li>
          <li class=""><a class="nav-link" href="{{url('/cash-on-delivery')}}">Cash On Delivery</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Manage Categories</span></a>
        <ul class="dropdown-menu">
          <li class="active"><a class="nav-link" href="{{url('/category')}}">Categories</a></li>
          <li class=""><a class="nav-link" href="{{url('/sub-category')}}">Sub Categories</a></li>
          <li class=""><a class="nav-link" href="{{url('/child-category')}}">Child Categories</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Manage Products</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="brands">Brands</a></li>
          <li><a class="nav-link" href="{{ route('products.create') }}">Create Product</a></li>
          <li class=""><a class="nav-link" href="{{url('/products')}}">Products</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller-products')}}">Seller Products</a></li>
          <li class=""><a class="nav-link" href="#">Seller Pending Products</a></li>
          <!-- <li class=""><a class="nav-link" href="#">Product Reviews</a></li>
          <li class=""><a class="nav-link" href="#">Product Report</a></li> -->
        </ul>
      </li>

      <li class="nav-item dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i><span>Locations</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="{{url('/country')}}">Country</a></li>
          <li class=""><a class="nav-link" href="{{url('/state')}}">State</a></li>
          <li class=""><a class="nav-link" href="{{url('/city')}}">City</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>Ecommerce</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="{{url('/campaign')}}">Campaign</a></li>
          <li class=""><a class="nav-link" href="{{url('/coupon')}}">Coupon</a></li>
          <li class=""><a class="nav-link" href="{{url('/tax')}}">Tax</a></li>
          <li class=""><a class="nav-link" href="{{url('/return-policy')}}">Return Policy</a></li>
          <li class=""><a class="nav-link" href="{{url('/specification-key')}}">Specification Key</a></li>
          <li class=""><a class="nav-link" href="{{url('/shipping')}}">Shipping</a></li>
          <li class=""><a class="nav-link" href="{{url('/discount')}}">Discount</a></li>
          <li class=""><a class="nav-link" href="{{url('payment-method/1/edit')}}">Payment Method</a></li>
        </ul>
      </li>
      
      <li class=""><a class="nav-link" href="{{url('advertisement/1/edit')}}"><i class="fas fa-ad"></i> <span>Advertisement</span></a></li>
      
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>Withdraw Payment</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="{{url('/widthdraw-method')}}">Withdraw Method</a></li>
          <li class=""><a class="nav-link" href="{{url('/seller-withdraw')}}">Seller Withdraw</a></li>
          <li class=""><a class="nav-link" href="{{url('/pending-seller-withdraw')}}">Pending Seller Withdraw</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Users</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="{{url('/user-list')}}">User List</a></li>
          <li class=""><a class="nav-link" href="">Customer List</a></li>
          <li class=""><a class="nav-link" href="">Pending Customers</a></li>
          <li class=""><a class="nav-link" href="">Seller List</a></li>
          <li class=""><a class="nav-link" href="">Pending Sellers</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-globe"></i><span>Manage Website</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="{{url('seo-setup/1/edit')}}">SEO Setup</a></li>
          <li class=""><a class="nav-link" href="{{url('topbar-contact/1/edit')}}">Topbar Contact</a></li>
          <li class=""><a class="nav-link" href="{{url('/slider')}}">Slider</a></li>
          <li class=""><a class="nav-link" href="{{url('home-page/1/edit')}}">Home Page</a></li>
          <li class=""><a class="nav-link" href="{{url('home-visibility/1/edit')}}">Home Page One Visibility</a></li>
          <li class=""><a class="nav-link" href="{{url('menu-visibility')}}">Menu visibility</a></li>
          <li class=""><a class="nav-link" href="{{url('sub-menu')}}">Sub Menu</a></li>
          <li class=""><a class="nav-link" href="{{url('shop-page/1/edit')}}">Shop Page</a></li>
          <li class=""><a class="nav-link" href="{{url('/show-homepage')}}">Show Homepage</a></li>
          <li class=""><a class="nav-link" href="{{url('/service')}}">Service</a></li>
          <li class=""><a class="nav-link" href="{{url('seller-condition/1/edit')}}">Seller Conditions</a></li>
          <li class=""><a class="nav-link" href="{{url('announcement/1/edit')}}">Announcement</a></li>
          <li class=""><a class="nav-link" href="{{url('/mega-menu-category')}}">Mega Menu</a></li>
          <li class=""><a class="nav-link" href="{{url('banner-image')}}">Banner Image</a></li>
          <li class=""><a class="nav-link" href="{{url('product-section')}}">Product Show Section</a></li>
          <li class=""><a class="nav-link" href="{{url('default-avatar/1/edit')}}">Default Avatar</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Website Footer</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="{{url('footer/1/edit')}}">Footer</a></li>
          <li class=""><a class="nav-link" href="{{url('/column-list')}}">Column List</a></li>
          <li class=""><a class="nav-link" href="{{url('/social-link')}}">Social Link</a></li>
          <li class=""><a class="nav-link" href="{{url('first-column-link')}}">First Column Link</a></li>
          <li class=""><a class="nav-link" href="{{url('second-column-link')}}">Second Column Link</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Pages</span></a>
        <ul class="dropdown-menu">
            <li class=""><a class="nav-link" href="">About Us</a></li>
            <li class=""><a class="nav-link" href="">Contact Us</a></li>
            <!-- <li class=""><a class="nav-link" href="">Custom Page</a></li> -->
            <li class=""><a class="nav-link" href="">Terms And Conditions</a></li>
            <li class=""><a class="nav-link" href="">Privacy Policy</a></li>
            <li class=""><a class="nav-link" href="">FAQ</a></li>
            <!-- <li class=""><a class="nav-link" href="">Error Page</a></li> -->
            <li class=""><a class="nav-link" href="">Login Page</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Blogs</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="">Categories</a></li>
          <li class=""><a class="nav-link" href="">Blogs</a></li>
          <li class=""><a class="nav-link" href="">Popular Blogs</a></li>
          <li class=""><a class="nav-link" href="">Comments</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i><span>Email Configuration</span></a>
        <ul class="dropdown-menu">
          <li class=""><a class="nav-link" href="">Setting</a></li>
          <li class=""><a class="nav-link" href="">Email Template</a></li>
        </ul>
      </li>
      <li class=""><a class="nav-link" href=""><i class="fas fa-user"></i> <span>Admin list</span></a></li>
    </ul>       
  </aside>
</div>
