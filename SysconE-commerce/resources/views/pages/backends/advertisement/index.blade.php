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
            <h1>Advertisement</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Advertisement</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-3">
                                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                    <li class="nav-item border rounded mb-1">
                                        <a class="nav-link active" id="error-tab-1" data-toggle="tab" href="#errorTab-1" role="tab" aria-controls="errorTab-1" aria-selected="true">Mega Menu Banner</a>
                                    </li>

                                    <li class="nav-item border rounded mb-1">
                                        <a class="nav-link" id="one-column-banner-tab" data-toggle="tab" href="#oneColumnBanner" role="tab" aria-controls="oneColumnBanner" aria-selected="true">Home Page One Column Banner</a>
                                    </li>

                                    <li class="nav-item border rounded mb-1">
                                        <a class="nav-link" id="two-column-banner-first" data-toggle="tab" href="#twoColumnBannerFirst" role="tab" aria-controls="twoColumnBannerFirst" aria-selected="true">Home Page First Two Column Banner</a>
                                    </li>

                                    <li class="nav-item border rounded mb-1">
                                        <a class="nav-link" id="two-column-banner-second" data-toggle="tab" href="#twoColumnBannerSecond" role="tab" aria-controls="twoColumnBannerSecond" aria-selected="true">Home Page Second Two Column Banner</a>
                                    </li>

                                    <li class="nav-item border rounded mb-1">
                                        <a class="nav-link" id="two-column-banner-third" data-toggle="tab" href="#twoColumnBannerThird" role="tab" aria-controls="twoColumnBannerThird" aria-selected="true">Home Page Third Two Column Banner</a>
                                    </li>

                                    <li class="nav-item border rounded mb-1">
                                        <a class="nav-link" id="shop-page" data-toggle="tab" href="#shopPage" role="tab" aria-controls="shopPage" aria-selected="true">Shop Page Banner</a>
                                    </li>

                                    <li class="nav-item border rounded mb-1">
                                        <a class="nav-link" id="product-details" data-toggle="tab" href="#productDetails" role="tab" aria-controls="productDetails" aria-selected="true">Product Details</a>
                                    </li>

                                    <li class="nav-item border rounded mb-1">
                                        <a class="nav-link" id="cart-bottom-banner" data-toggle="tab" href="#cartBottomBanner" role="tab" aria-controls="cartBottomBanner" aria-selected="true">Shopping Cart Bottom</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-9">
                                <div class="border rounded">
                                    <div class="tab-content no-padding" id="settingsContent">
                                        <div class="tab-pane fade show active" id="errorTab-1" role="tabpanel" aria-labelledby="error-tab-1">
                                            <div class="card m-0">
                                                <div class="card-body">
                                                    <form action="{{url('advertisement/1')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')                                                       
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Current Banner</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->megamenu_img)}}" alt="" sizes="" srcset="" height="150px" width="200px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="filemegabanner" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtMegaTitle" class="form-control" value="{{$advertisement->megamenu_title}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtMegaDescription" class="form-control" value="{{$advertisement->megamenu_description}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtMegaButtonlink" class="form-control" value="{{$advertisement->megamenu_buttonlink}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Button Text <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtMegaButtontext" class="form-control" value="{{$advertisement->megamenu_buttontext}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label for="toggle6">Status<span class="text-danger">*</span></label>
                                                                <select id="txtMegaStatus" class="form-control" name="txtMegaStatus" required>   
                                                                    @foreach ($ststus as $sts)
                                                                    <option value="{{ $sts->s_name }}" {{ ( $sts->s_name == $advertisement->megamenu_status) ? 'selected' : '' }}>
                                                                    {{ $sts->s_name }}  
                                                                    </option>
                                                                    @endforeach
                                                                </select>
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

                                        <div class="tab-pane fade" id="oneColumnBanner" role="tabpanel" aria-labelledby="one-column-banner-tab">
                                            <div class="card m-0">
                                                <div class="card-body">
                                                    <form action="{{url('advertisement/1')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')                                                       
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Current Banner</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->homepage_img)}}" alt="" sizes="" srcset="" height="400px" width="200px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="filehomeimg" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageTitle" class="form-control" value="{{$advertisement->homepage_title}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageDescription" class="form-control" value="{{$advertisement->homepage_description}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageBlink" class="form-control" value="{{$advertisement->homepage_buttonlink}}">
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

                                        <div class="tab-pane fade" id="twoColumnBannerFirst" role="tabpanel" aria-labelledby="two-column-banner-first">
                                            <div class="card m-0">
                                                <div class="card-body">
                                                    <form action="{{url('advertisement/1')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')                                                        
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Banner One</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->homepage_first_imgone)}}" alt="" sizes="" srcset="" height="120px" width="270px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="filehomefirstimgone" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageFirsttitleone" class="form-control" value="{{$advertisement->homepage_first_titleone}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageFirstDescone" class="form-control" value="{{$advertisement->homepage_first_descriptionone}}">
                                                            </div>
                                                            
                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageFirstBLinkone"  class="form-control" value="{{$advertisement->homepage_first_buttonlinkone}}">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Banner Two</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->homepage_first_imgtwo)}}" alt="" sizes="" srcset="" height="110px" width="280px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="filehomefirstimgtwo" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageFirsttitletwo" class="form-control" value="{{$advertisement->homepage_first_titletwo}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageFirstDesctwo" class="form-control" value="{{$advertisement->homepage_first_descriptiontwo}}">
                                                            </div>
                                                            
                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageFirstBLinktwo" class="form-control" value="{{$advertisement->homepage_first_buttonlinktwo}}">
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

                                        <div class="tab-pane fade" id="twoColumnBannerSecond" role="tabpanel" aria-labelledby="two-column-banner-second">
                                            <div class="card m-0">
                                                <div class="card-body">
                                                    <form action="{{url('advertisement/1')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')                                                       
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Banner One</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->homepage_second_imgone)}}" alt="" sizes="" srcset="" height="110px" width="250px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="filehomesecondimgone" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageSecondtitleone" class="form-control" value="{{$advertisement->homepage_second_titleone}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageSecondDescone" class="form-control" value="{{$advertisement->homepage_second_descriptionone}}">
                                                            </div>
                                                            
                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageSecondBLinkone"  class="form-control" value="{{$advertisement->homepage_second_buttonlinkone}}">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Banner Two</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->homepage_second_imgtwo)}}" alt="" sizes="" srcset="" height="110px" width="250px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="filehomesecondimgtwo" class="form-control-file">
                                                            </div>
                                                            
                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageSecondtitletwo" class="form-control" value="{{$advertisement->homepage_second_titletwo}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageSecondDesctwo" class="form-control" value="{{$advertisement->homepage_second_descriptiontwo}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageSecondBLinktwo" class="form-control" value="{{$advertisement->homepage_second_buttonlinktwo}}">
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

                                        <div class="tab-pane fade" id="twoColumnBannerThird" role="tabpanel" aria-labelledby="two-column-banner-third">
                                            <div class="card m-0">
                                                <div class="card-body">
                                                    <form action="{{url('advertisement/1')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')                                                        
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Banner One</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->homepage_third_imgone)}}" alt="" sizes="" srcset="" height="110px" width="250px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="filehomethirdimgone" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageThirdtitleone" class="form-control" value="{{$advertisement->homepage_third_titleone}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageThirdDescone" class="form-control" value="{{$advertisement->homepage_third_descriptionone}}">
                                                            </div>
                                                            
                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageThirdBLinkone"  class="form-control" value="{{$advertisement->homepage_third_buttonlinkone}}">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Banner Two</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->homepage_third_imgtwo)}}" alt="" sizes="" srcset="" height="110px" width="250px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="filehomethirdimgtwo" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageThirdtitletwo" class="form-control" value="{{$advertisement->homepage_third_titletwo}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageThirdDesctwo" class="form-control" value="{{$advertisement->homepage_third_descriptiontwo}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtHomepageThirdBLinktwo" class="form-control" value="{{$advertisement->homepage_third_buttonlinktwo}}">
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

                                        <div class="tab-pane fade" id="shopPage" role="tabpanel" aria-labelledby="shop-page">
                                            <div class="card m-0">
                                                <div class="card-body">
                                                    <form action="{{url('advertisement/1')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')                                                       
                                                        <div class="form-group">
                                                            <label for="">Visibility Status</label>
                                                            <div>
                                                                <input id="toggle1" type="checkbox" {{ $advertisement->shoppage_status==1 ? "checked" : ""}} data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="txtShoppageStatus" >   
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Existing Banner</label>
                                                            <div>
                                                                <img src="{{asset('img/'.$advertisement->shoppage_img)}}" alt="" sizes="" srcset="" height="100px" width="200px"> 
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">New Banner</label>
                                                            <input type="file" class="form-control-file" name="fileshoppageimg">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Header One</label>
                                                            <input type="text" class="form-control" name="txtShoppageHeaderone" value="{{$advertisement->shoppage_headerone}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Header Two</label>
                                                            <input type="text" class="form-control" name="txtShoppageHeadertwo" value="{{$advertisement->shoppage_headertwo}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Title One</label>
                                                            <input type="text" class="form-control" name="txtShoppageTitleone" value="{{$advertisement->shoppage_titleone}}">
                                                        </div>

                                                            <div class="form-group">
                                                            <label for="">Title Two</label>
                                                            <input type="text" class="form-control" name="txtShoppageTitletwo" value="{{$advertisement->shoppage_titletwo}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Link</label>
                                                            <input type="text" class="form-control" name="txtShoppageLink" value="{{$advertisement->shoppage_link}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Button Text</label>
                                                            <input type="text" class="form-control" name="txtShoppageButtontext" value="{{$advertisement->shoppage_buttontext}}">
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="productDetails" role="tabpanel" aria-labelledby="product-details">
                                            <div class="card m-0">
                                                <div class="card-body">
                                                    <form action="{{url('advertisement/1')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')                                                       
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label for="">Banner Status</label>
                                                                <div>
                                                                    <input id="toggle1" type="checkbox" {{ $advertisement->product_status==1 ? "checked" : ""}} data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="txtProductStatus" >   
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Existing Banner</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->product_img)}}" alt="" sizes="" srcset="" height="120px" width="180px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="fileproductimg" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtProductTitle" class="form-control" value="{{$advertisement->product_title}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtProductDescription" class="form-control" value="{{$advertisement->product_description}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtProductBLink"  class="form-control" value="{{$advertisement->product_buttonlink}}">
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

                                        <div class="tab-pane fade" id="cartBottomBanner" role="tabpanel" aria-labelledby="cart-bottom-banner">
                                            <div class="card m-0">
                                                <div class="card-body">
                                                    <form action="{{url('advertisement/1')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')                                                        
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label for="">Banner Status</label>
                                                                <div>
                                                                    <input id="toggle1" type="checkbox" {{ $advertisement->shopping_status==1 ? "checked" : ""}} data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger" name="txtShoppingStatus" >   
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Banner One</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->shopping_imgone)}}" alt="" sizes="" srcset="" height="120px" width="270px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="fileshoppingimgone" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtShoppingTitleone" class="form-control" value="{{$advertisement->shopping_titleone}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtShoppingDescone" class="form-control" value="{{$advertisement->shopping_descriptionone}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtShoppingBLinkone"  class="form-control" value="{{$advertisement->shopping_buttonlinkone}}">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <label>Banner Two</label>
                                                                <div>
                                                                    <img src="{{asset('img/'.$advertisement->shopping_imgtwo)}}" alt="" sizes="" srcset="" height="120px" width="270px"> 
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>New Banner</label>
                                                                <input type="file" name="fileshoppingimgtwo" class="form-control-file">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtShoppingTitletwo" class="form-control" value="{{$advertisement->shopping_titletwo}}">
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label>Description <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtShoppingDesctwo" class="form-control" value="{{$advertisement->shopping_descriptiontwo}}">
                                                            </div>
                                                            
                                                            <div class="form-group col-12">
                                                                <label>Button Link <span class="text-danger">*</span></label>
                                                                <input type="text" name="txtShoppingBLinktwo" class="form-control" value="{{$advertisement->shopping_buttonlinktwo}}">
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
    </section>
</div>
@section('js')
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection