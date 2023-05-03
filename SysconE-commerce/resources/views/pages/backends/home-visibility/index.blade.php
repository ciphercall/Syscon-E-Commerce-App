@extends('layout.backends.home')
@section('css')
<style>
    .toggle.btn {
    min-width: 5.7rem !important;
}
</style>
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Home Page One Visibility</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Home Page One Visibility</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-3">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link active" id="slider-tab" data-toggle="tab" href="#sliderTab" role="tab" aria-controls="sliderTab" aria-selected="true">Slider</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="brand-tab" data-toggle="tab" href="#brandTab" role="tab" aria-controls="brandTab" aria-selected="true">Brand</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="campaign-tab" data-toggle="tab" href="#campaignTab" role="tab" aria-controls="campaignTab" aria-selected="true">Campaign</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="one-col-banner-tab" data-toggle="tab" href="#oneColBannerTab" role="tab" aria-controls="oneColBannerTab" aria-selected="true">Popular Category</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="first-two-col-banner-tab" data-toggle="tab" href="#firstTwoColBannerTab" role="tab" aria-controls="firstTwoColBannerTab" aria-selected="true">First Two column banner</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="flash-deal-tab" data-toggle="tab" href="#flashDealTab" role="tab" aria-controls="flashDealTab" aria-selected="true">Flash Deal</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="highlight-tab" data-toggle="tab" href="#highlightTab" role="tab" aria-controls="highlightTab" aria-selected="true">Product Highlight</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="second-two-col-banner-tab" data-toggle="tab" href="#secondTwoColBannerTab" role="tab" aria-controls="secondTwoColBannerTab" aria-selected="true">Second Two Column Banner</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="three-col-category-tab" data-toggle="tab" href="#threeColCategoryTab" role="tab" aria-controls="threeColCategoryTab" aria-selected="true">Three Column Category</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="third-two-col-banner-tab" data-toggle="tab" href="#thirdTwoColBannerTab" role="tab" aria-controls="thirdTwoColBannerTab" aria-selected="true">Third Two Column Banner</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="service-tab" data-toggle="tab" href="#serviceTab" role="tab" aria-controls="serviceTab" aria-selected="true">Service</a>
                                        </li>

                                        <li class="nav-item border rounded mb-1">
                                            <a class="nav-link" id="blog-tab" data-toggle="tab" href="#blogTab" role="tab" aria-controls="blogTab" aria-selected="true">Blog</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9">
                                    <div class="border rounded">
                                        <div class="tab-content no-padding" id="settingsContent">
                                            <div class="tab-pane fade show active" id="sliderTab" role="tabpanel" aria-labelledby="slider-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')          
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="toggle1">Status</label>
                                                                        <div>
                                                                            <input id="toggle1" type="checkbox" {{ $homevisibility->slider_status==1 ? "checked" : ""}} data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="txtSliderStatus" >   
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="">Quantity</label>
                                                                        <input type="number" name="txtSliderQuentaty" class="form-control" value="{{$homevisibility->slider_quantity}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="brandTab" role="tabpanel" aria-labelledby="brand-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">                                               
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <label for="toggle2">Status</label>
                                                                        <div>
                                                                            <input id="toggle2" type="checkbox" {{ $homevisibility->brand_status==1 ? "checked" : ""}} data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="txtBrandStatus" >   
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="">Quantity</label>
                                                                        <input type="number" name="txtBrandQuantity" class="form-control"  value="{{$homevisibility->brand_quantity}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="campaignTab" role="tabpanel" aria-labelledby="campaign-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">                                               
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <label for="toggle3">Status</label>
                                                                        <div>
                                                                            <input id="toggle3" type="checkbox" {{ $homevisibility->campaign_status==1 ? "checked" : ""}} data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="txtCampaignStatus" >   
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="">Quantity</label>
                                                                        <input type="number" name="txtCampaignQuantity" class="form-control"  value="{{$homevisibility->campaign_quantity}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="oneColBannerTab" role="tabpanel" aria-labelledby="one-col-banner-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="toggle4">Status</label>
                                                                        <div>
                                                                            @if($homevisibility->p_category_status==1)
                                                                            <div>
                                                                                <input id="toggle4" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                            </div>
                                                                            @elseif($homevisibility->p_category_status==2)
                                                                            <div>
                                                                                <input id="toggle4" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="firstTwoColBannerTab" role="tabpanel" aria-labelledby="first-two-col-banner-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="toggle5">Status</label>
                                                                        <div>
                                                                            @if($homevisibility->first_banner_status==1)
                                                                            <div>
                                                                                <input id="toggle5" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                            </div>
                                                                            @elseif($homevisibility->first_banner_status==2)
                                                                            <div>
                                                                                <input id="toggle5" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="flashDealTab" role="tabpanel" aria-labelledby="flash-deal-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">                                               
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <label for="toggle6">Status</label>
                                                                        <div>
                                                                            @if($homevisibility->flash_status==1)
                                                                            <div>
                                                                                <input id="toggle6" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                            </div>
                                                                            @elseif($homevisibility->flash_status==2)
                                                                            <div>
                                                                                <input id="toggle6" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="">Quantity</label>
                                                                        <input type="number" name="txtFlashQuantity" class="form-control"  value="{{$homevisibility->flash_quantity}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="highlightTab" role="tabpanel" aria-labelledby="highlight-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">                                               
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <label for="toggle7">Status</label>
                                                                        <div>
                                                                            @if($homevisibility->product_status==1)
                                                                            <div>
                                                                                <input id="toggle1" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                            </div>
                                                                            @elseif($homevisibility->product_status==2)
                                                                            <div>
                                                                                <input id="toggle1" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="">Quantity</label>
                                                                        <input type="number" name="txtProductQuantity" class="form-control"  value="{{$homevisibility->product_quantity}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="secondTwoColBannerTab" role="tabpanel" aria-labelledby="second-two-col-banner-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="toggle8">Status</label>
                                                                        <div>
                                                                            @if($homevisibility->second_banner_status==1)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                            </div>
                                                                            @elseif($homevisibility->second_banner_status==2)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="threeColCategoryTab" role="tabpanel" aria-labelledby="three-column-category-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">                                               
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <label for="toggle9">Status</label>
                                                                        <div>
                                                                            @if($homevisibility->col_category_status==1)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                            </div>
                                                                            @elseif($homevisibility->col_category_status==2)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="">Quantity</label>
                                                                        <input type="number" name="txtColCategoryQuantity" class="form-control"  value="{{$homevisibility->col_category_quantity}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="thirdTwoColBannerTab" role="tabpanel" aria-labelledby="third-two-col-banner-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="toggle11">Status</label>
                                                                        <div>
                                                                            @if($homevisibility->third_banner_status==1)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                            </div>
                                                                            @elseif($homevisibility->third_banner_status==2)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="serviceTab" role="tabpanel" aria-labelledby="service-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">                                               
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <label for="toggle12">Status</label>
                                                                        <div>
                                                                            @if($homevisibility->service_status==1)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                            </div>
                                                                            @elseif($homevisibility->service_status==2)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="">Quantity</label>
                                                                        <input type="number" name="txtServiceQuantity" class="form-control"  value="{{$homevisibility->service_quantity}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="blogTab" role="tabpanel" aria-labelledby="blog-tab">
                                                <div class="card m-0">
                                                    <div class="card-body">                                               
                                                        <form action="{{url('home-visibility/1')}}" method="POST">
                                                            @csrf
                                                            @method('PUT')                                                           
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <label for="toggle13">Status</label>
                                                                        <div>
                                                                            @if($homevisibility->blog_status==1)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                            </div>
                                                                            @elseif($homevisibility->blog_status==2)
                                                                            <div>
                                                                                <input id="toggle8" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="">Quantity</label>
                                                                        <input type="number" name="txtBlogQuantity" class="form-control"  value="{{$homevisibility->blog_quantity}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@section('js')
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection