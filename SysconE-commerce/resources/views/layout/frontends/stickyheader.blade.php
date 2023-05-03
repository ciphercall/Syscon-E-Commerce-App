<!--sticky header area start-->
<div class="sticky_header_area sticky-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{url('frontends/assets/img/logo/sysconLogo.webp')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="sticky_header_right menu_position">
                    <div class="main_menu">
                        <nav>
                            <ul>
                                <li><a class="active" href="{{url('/')}}">home</a></li>  
                                <li><a href="{{url('/shop')}}">shop</a></li>  
                                <li><a href="{{url('/blog')}}">blog</a></li>  
                                <li><a href="{{url('/')}}">pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="{{url('/about-us')}}">About Us</a></li>
                                        <li><a href="{{url('/services')}}">services</a></li>
                                        <li><a href="{{url('/privacy-policy')}}">privacy policy</a></li>
                                        <li><a href="{{url('/frequently-questions')}}">Frequently Questions</a></li>
                                        <li><a href="{{url('/contact')}}">contact</a></li>
                                        <li><a href="{{url('/user-login')}}">login</a></li>
                                        <li><a href="{{url('/compare')}}">Compare</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url('/about-us')}}">about Us</a></li>
                                <li><a href="{{url('/contact-us')}}"> Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="middel_right_info">
                        <div class="header_wishlist">
                            <a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            <span class="wishlist_quantity">3</span>
                        </div>
                        <div class="mini_cart_wrapper">
                            <a href=""><i class="fa fa-shopping-bag"
                                    aria-hidden="true"></i></a>
                            <span class="cart_quantity">{{ count((array) session('cart')) }}</span>
                            <!--mini cart-->
                            <div class="mini_cart">
                            @foreach((array) session('cart') as $id => $details)
                                <div class="cart_item">
                                    <div class="cart_img">
                                        <a href="#"><img src="{{url('img/'.$details['image'])}}" alt=""></a>
                                    </div>
                                    <div class="cart_info">
                                        <a href="#">{{$details['name']}}</a>
                                        <p>Qty: {{$details['quantity']}} X <span> {{$details['price']}} </span></p>
                                    </div>
                                    <div class="cart_remove">
                                        <a href=""><i class="ion-android-close"></i></a>
                                    </div>
                                </div>
                            @endforeach

                                <div class="mini_cart_footer">
                                    <div class="cart_button">
                                        <a href="{{ route('cart') }}">View cart</a>
                                    </div>
                                    <div class="cart_button">
                                        <a href="{{ route('checkout') }}">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!--mini cart end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--sticky header area end-->