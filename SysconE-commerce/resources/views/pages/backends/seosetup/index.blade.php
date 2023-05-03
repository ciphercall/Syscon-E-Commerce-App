@extends('layout.backends.home')
@section('page')
<div class="main-content">
<section class="section">
<div class="section-header">
<h1>SEO Setup</h1>
<div class="section-header-breadcrumb">
<div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
<div class="breadcrumb-item">SEO Setup</div>
</div>
</div>
</section>
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
                <a class="nav-link active" id="seo-setup-tab" data-toggle="tab" href="#seoSetupTab" role="tab" aria-controls="seoSetupTab" aria-selected="true">SEO Setup</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="about-tab" data-toggle="tab" href="#aboutTab" role="tab" aria-controls="aboutTab" aria-selected="true">About Us</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contactTab" role="tab" aria-controls="contactTab" aria-selected="true">Contact Us</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="brandPage-tab" data-toggle="tab" href="#brandPageTab" role="tab" aria-controls="brandPageTab" aria-selected="true">Brand Page</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="seller-tab" data-toggle="tab" href="#sellerPageTab" role="tab" aria-controls="sellerPageTab" aria-selected="true">Seller Page</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="blog-tab" data-toggle="tab" href="#BlogTab" role="tab" aria-controls="BlogTab" aria-selected="true">Blog</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="campaign-tab" data-toggle="tab" href="#CampaignTab" role="tab" aria-controls="CampaignTab" aria-selected="true">Campaign</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="flash-deal-tab" data-toggle="tab" href="#flashDealTab" role="tab" aria-controls="flashDealTab" aria-selected="true">Flash Deal</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="shop-page-tab" data-toggle="tab" href="#shopPageTab" role="tab" aria-controls="shopPageTab" aria-selected="true">Shop Page</a>
            </li>
        </ul>
    </div>


    <div class="col-12 col-sm-12 col-md-9">
        <div class="border rounded">
            <div class="tab-content no-padding" id="seoContent">
                <div class="tab-pane fade show active" id="seoSetupTab" role="tabpanel" aria-labelledby="seo-setup-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('seo-setup/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">                                                            
                                    <label for="">SEO Title</label>
                                    <input type="text" name="txtHomeTitle" class="form-control" value="{{$seosetup->home_s_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea class="form-control" name="txtHomeDescription" rows="3">{{$seosetup->home_s_description}}</textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="aboutTab" role="tabpanel" aria-labelledby="about-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('seo-setup/1')}}" method="POST" enctype="multipart/form-data">                                                            
                                @csrf
                                @method('PUT')                                                          
                                <div class="form-group">                                                            
                                    <label for="">SEO Title</label>
                                    <input type="text" name="txtAboutTitle" class="form-control" value="{{$seosetup->about_s_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea class="form-control" name="txtAboutDescription" rows="3">{{$seosetup->about_s_description}}</textarea>
                                </div>
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contactTab" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('seo-setup/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')                                                         
                                <div class="form-group">                                                            
                                    <label for="">SEO Title</label>
                                    <input type="text" name="txtContactTitle" class="form-control" value="{{$seosetup->contact_s_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea class="form-control" name="txtContactDescription" rows="3">{{$seosetup->contact_s_description}}</textarea>
                                </div>
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="brandPageTab" role="tabpanel" aria-labelledby="brandPage-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('seo-setup/1')}}" method="POST">
                                @csrf
                                @method('PUT')                                                          
                                <div class="form-group">                                                            
                                    <label for="">SEO Title</label>
                                    <input type="text" name="txtBrandTitle" class="form-control" value="{{$seosetup->brand_s_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea class="form-control" name="txtBrandDescription" rows="3">{{$seosetup->brand_s_description}}</textarea>
                                </div>

                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="sellerPageTab" role="tabpanel" aria-labelledby="seller-page-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('seo-setup/1')}}" method="POST">
                                @csrf
                                @method('PUT')                                                         
                                <div class="form-group">                                                            
                                    <label for="">SEO Title</label>
                                    <input type="text" name="txtSellerTitle" class="form-control" value="{{$seosetup->seller_s_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea class="form-control" name="txtSellerDescription" rows="3">{{$seosetup->seller_s_description}}</textarea>
                                </div>
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade" id="BlogTab" role="tabpanel" aria-labelledby="blog-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('seo-setup/1')}}" method="POST">
                                @csrf
                                @method('PUT')                                                         
                                <div class="form-group">                                                            
                                    <label for="">SEO Title</label>
                                    <input type="text" name="txtBlogTitle" class="form-control" value="{{$seosetup->blog_s_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea class="form-control" name="txtBlogDescription" rows="3">{{$seosetup->blog_s_description}}</textarea>
                                </div>
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="CampaignTab" role="tabpanel" aria-labelledby="campaign-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('seo-setup/1')}}" method="POST">
                                @csrf
                                @method('PUT')                                                         
                                <div class="form-group">                                                            
                                    <label for="">SEO Title</label>
                                    <input type="text" name="txtCampaignTitle" class="form-control" value="{{$seosetup->campaign_s_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea class="form-control" name="txtCampaignDescription" rows="3">{{$seosetup->campaign_s_description}}</textarea>
                                </div>
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="flashDealTab" role="tabpanel" aria-labelledby="flash-deal-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('seo-setup/1')}}" method="POST">
                                @csrf
                                @method('PUT')                                                         
                                <div class="form-group">                                                            
                                    <label for="">SEO Title</label>
                                    <input type="text" name="txtFlashTitle" class="form-control" value="{{$seosetup->flash_s_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea class="form-control" name="txtFlashDescription" rows="3">{{$seosetup->flash_s_description}}</textarea>
                                </div>
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="shopPageTab" role="tabpanel" aria-labelledby="shop-page-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('seo-setup/1')}}" method="POST">
                                @csrf
                                @method('PUT')                                                         
                                <div class="form-group">                                                            
                                    <label for="">SEO Title</label>
                                    <input type="text" name="txtShopTitle" class="form-control" value="{{$seosetup->shop_s_title}}">
                                </div>

                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea class="form-control" name="txtShopDescription" rows="3">{{$seosetup->shop_s_description}}</textarea>
                                </div>
                                <button class="btn btn-primary">Update</button>
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
</div>
</div>

@endsection