@extends('layout.frontends.master')
@section('main_content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>Product Sub Category</li>
                        <li>{{$SubcategoryId->sub_categoryname}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
<!--shop  area start-->
<div class="shop_area shop_reverse mt-60 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--sidebar widget start-->
                <aside class="sidebar_widget">
                    <div class="widget_inner">
                        <div class="widget_list widget_categories">
                            <h2>Product categories</h2>
                            <ul>
                                @foreach($categories as $val)
                                    <?php 
                                    $Subcat = App\Models\Subcategory::where('category',$val->id)->get();
                                    ?>
                                    <li class="@if(sizeof($Subcat) > 1) widget_sub_categories @endif ">
                                        <a href="{{ $val->slug }}">{{ $val->c_name }}
                                        @if(sizeof($Subcat) > 1)@endif
                                        </a>
                                        @if(sizeof($Subcat) > 1)         
                                        <ul class="widget_dropdown_categories">
                                            @foreach($Subcat as $subData)
                                            <li><a href="{{$subData->slug}}">{{$subData->sub_categoryname}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul> 
                        </div>
                        <div class="widget_list widget_filter">
                            <h2>Filter by price</h2>
                            <form action="#">
                                <div id="slider-range"></div>
                                <button type="submit">Filter</button>
                                <input type="text" name="text" id="amount" />
                            </form>
                        </div>
                        <div class="widget_list">
                            <h2>Compare Products</h2>
                            <div class="recent_product_container">
                                <article class="recent_product_list">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="product-details.html"><img
                                                    src="{{url('frontends/assets/img/product/product1.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Natus erro at congue</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="old_price">$70.00</span>
                                                <span class="current_price">$65.00</span>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                                <article class="recent_product_list">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="product-details.html"><img
                                                    src="{{url('frontends/assets/img/product/product2.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Auctor gravida enim</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="old_price">$70.00</span>
                                                <span class="current_price">$65.00</span>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                                <article class="recent_product_list">
                                    <figure>
                                        <div class="product_thumb">
                                            <a href="product-details.html"><img
                                                    src="{{url('frontends/assets/img/product/product24.jpg')}}" alt=""></a>
                                        </div>
                                        <div class="product_content">
                                            <h3><a href="product-details.html">Cillum dolore tortor</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="old_price">$70.00</span>
                                                <span class="current_price">$65.00</span>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <div class="widget_list tags_widget">
                            <h2>Product tags</h2>
                            <div class="tag_cloud">
                                <a href="#">blouse</a>
                                <a href="#">clothes</a>
                                <a href="#">fashion</a>
                                <a href="#">handbag</a>
                                <a href="#">laptop</a>
                            </div>
                        </div>
                    </div>
                </aside>
                <!--sidebar widget end-->
            </div>
            
            <div class="col-lg-9 col-md-12">
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                            title="3"></button>
                        <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                            title="4"></button>
                        <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                            title="List"></button>
                    </div>

                    <div class=" niceselect_option">
                        <form class="select_option" action="#">
                            <select name="orderby" id="short">
                                <option selected value="1">Sort by average rating</option>
                                <option value="2">Sort by popularity</option>
                                <option value="3">Sort by newness</option>
                                <option value="4">Sort by price: low to high</option>
                                <option value="5">Sort by price: high to low</option>
                                <option value="6">Product Name: Z</option>
                            </select>
                        </form>
                    </div>

                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper">
                    @foreach($ProductData as $Val)   
                    <div class="col-lg-4 col-md-4 col-12 ">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{URL::to('product_details/'.$Val->slug)}}"><img
                                            src="{{ asset('img/' . $Val->img) }}" alt=""></a>
                                    <a class="secondary_img" href="{{URL::to('product_details/'.$Val->slug)}}"><img
                                            src="{{ asset('img/' . $Val->banner_img) }}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                            <li class="compare"><a href="#" title="compare"><span
                                                class="ion-levels"></span></a></li>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#modal_box" title="quick view"> <span
                                                class="ion-ios-search-strong"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="{{ route('add.to.cart', $Val->id) }}" title="add to cart">Add to cart</a>
                                    </div>
                                </div>
                                <div class="product_content grid_content">
                                    <div class="price_box">
                                        <span class="old_price">${{$Val->price}}</span>
                                        <span class="current_price">${{$Val->offer_price}}</span>
                                    </div>
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="product_name grid_name"><a href="{{$val->slug}}">{{$Val->p_name}}</a></h3>
                                </div>
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="price_box">
                                            <span class="old_price">${{$Val->price}}</span>
                                            <span class="current_price">${{$Val->offer_price}}</span>
                                        </div>
                                        <h3 class="product_name"><a href="product-details.html">{{$Val->p_name}}</a></h3>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_desc">
                                            <p>{!! $Val->long_description !!}</p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart">Add to cart</a>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="wishlist.html"
                                                    title="Add to Wishlist"><i class="fa fa-heart-o"
                                                    aria-hidden="true"></i> Add to Wishlist</a></li>
                                                <li class="compare"><a href="#" title="compare"><span
                                                    class="ion-levels"></span> Compare</a></li>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#modal_box" title="quick view"> <span
                                                    class="ion-ios-search-strong"></span> Quick View</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </figure> 
                        </article>
                    </div>
                    @endforeach
                </div>

                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        {{ $ProductData->render("pagination::default") }}
                    </div>
                </div>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
<!--shop  area end-->


@endsection