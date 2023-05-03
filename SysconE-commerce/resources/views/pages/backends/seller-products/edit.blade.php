@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/summernote/summernote-bs4.css')}}">
@endsection
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Seller Products</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Edit Seller Products</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('seller-products')}}" class="btn btn-primary"><i class="fas fa-list"></i> Products</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{url('seller-products/'.$sellerproducts->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')                        
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Thumbnail Image Preview</label>
                                    <div>
                                        <img id="preview-img" src="{{asset('img/'.$sellerproducts->img)}}" alt="" sizes="" srcset="" height="120px" width="160px"> 
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>Thumnail Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="file_img" onchange="previewThumnailImage(event)">
                                </div>

                                <div class="form-group col-12">
                                    <label>Current Banner Image</label>
                                    <div>
                                    <img src="{{asset('img/'.$sellerproducts->banner_img)}}" alt="" sizes="" srcset="" height="100px" width="210px"> 
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>Banner Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="file_bannerimg">
                                </div>


                                <div class="form-group col-12">
                                    <label>Short Name <span class="text-danger">*</span></label>
                                    <input type="text" id="txtShortName" class="form-control"  name="txtShortName" value="{{$sellerproducts->short_name}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" id="txtName" class="form-control"  name="txtName" value="{{$sellerproducts->p_name}}">
                                </div>


                                <div class="form-group col-12">
                                    <label>Seller Id <span class="text-danger">*</span></label>
                                    <input type="text" id="txtSellerId" class="form-control"  name="txtSellerId" value="{{$sellerproducts->seller_id}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Slug <span class="text-danger">*</span></label>
                                    <input type="text" id="txtSlug" class="form-control"  name="txtSlug" value="{{$sellerproducts->slug}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Model No: <span class="text-danger">*</span></label>
                                    <input type="text" id="txtModelNo" class="form-control"  name="txtModelNo" value="{{$sellerproducts->model_no}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Category <span class="text-danger">*</span></label>
                                    <select id="txtCategory" class="form-control" name="txtCategory">
                                        <option selected><-----Choose Category----></option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ ( $category->id == $sellerproducts->category) ? 'selected' : '' }}>
                                            {{ $category->c_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <script>
                                    $('#txtCategory').change(function(){                            

                                        $.ajax({
                                        type:'GET',
                                        url:"{{URL::to('for-sub-cat')}}",
                                        data: {id:$(this).val(),},
                                        success:function(response){
                                        $('#txtSubcategory').html(response);
                                        }
                                        });

                                    })
                                </script>

                                <div class="form-group col-12">
                                    <label>Sub Category <span class="text-danger">*</span></label>
                                    <select id="txtSubcategory" class="form-control" name="txtSubcategory">
                                        <option selected><-----Choose Category----></option>
                                        @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ ( $subcategory->id == $sellerproducts->sub_category) ? 'selected' : '' }}>
                                            {{ $subcategory->sub_categoryname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <script>
                                    $('#txtSubcategory').change(function(){                            

                                        $.ajax({
                                        type:'GET',
                                        url:"{{URL::to('for-child-cat')}}",
                                        data: {id:$(this).val(),},
                                        success:function(response){
                                        $('#txtChildcategory').html(response);
                                        }
                                        });

                                    })
                                </script>

                                <div class="form-group col-12">
                                    <label>Child Category <span class="text-danger">*</span></label>
                                    <select id="txtChildcategory" class="form-control" name="txtChildcategory">
                                        <option selected><-----Choose Category----></option>
                                        @foreach ($childcategories as $childcategory)
                                        <option value="{{ $childcategory->id }}" {{ ( $childcategory->id == $sellerproducts->child_category) ? 'selected' : '' }}>
                                            {{ $childcategory->child_category }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>Brand <span class="text-danger">*</span></label>
                                    <select id="txtBrand" class="form-control" name="txtBrand">
                                        <option selected><-----Choose Category----></option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ ( $brand->id == $sellerproducts->brand) ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>SKU </label>
                                    <input type="text" class="form-control" name="txtSku" value="{{$sellerproducts->sku}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Purchase Scaner</label>
                                    <select name="txtPurchaseScane" id="txtPurchaseScane" class="form-control">
                                        <option value="1" {{$sellerproducts->purchase_scane==1 ? "selected" : ""}}>Barcode</option>
                                        <option value="2" {{$sellerproducts->purchase_scane==2 ?  "selected" : ""}}>Serial No</option>
                                        <option value="3" {{$sellerproducts->purchase_scane==3 ?  "selected" : ""}} >IMI No</option>
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>Unit <span class="text-danger">*</span></label>
                                    <select id="txtUnit" class="form-control" name="txtUnit">
                                        <option selected><-----Choose Category----></option>
                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}" {{ ( $unit->id == $sellerproducts->unit) ? 'selected' : '' }}>
                                            {{ $unit->unit_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>Price <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="txtPrice" value="{{$sellerproducts->price}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Offer Price</label>
                                    <input type="text" class="form-control" name="txtOfferPrice" value="{{$sellerproducts->offer_price}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Stock Quantity <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="txtStockQuantity" value="{{$sellerproducts->stock_quantity}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Video Link</label>
                                    <input type="text" class="form-control" name="txtVideoLink" value="{{$sellerproducts->video_link}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Short Description <span class="text-danger">*</span></label>
                                    <textarea name="txtShortDescription" id="" cols="30" rows="10" class="form-control text-area-5">{{$sellerproducts->short_description}}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>Long Description <span class="text-danger">*</span></label>
                                    <textarea name="txtLongDescription" id="txtLongDescription" class="summernote">{{$sellerproducts->long_description}}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>Tags</label>
                                    <input type="text" class="form-control" name="txtTag" value="{{$sellerproducts->tag}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Tax <span class="text-danger">*</span></label>
                                    <select id="txtTax" class="form-control" name="txtTax">
                                        <option selected><-----Choose Category----></option>
                                        @foreach ($tax as $val)
                                        <option value="{{ $val->id }}" {{ ( $val->id == $sellerproducts->tax) ? 'selected' : '' }}>
                                            {{ $val->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>Product Return Availabe ? <span class="text-danger">*</span></label>
                                    <select name="txtReturnPolicy" class="form-control" id="txtReturnPolicy" >
                                        <option value="0" {{$sellerproducts->return_policy==0 ? "selected" : ""}}>No</option>
                                        <option value="1" {{$sellerproducts->return_policy==1 ? "selected" : ""}}>Yes</option>
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label>Warranty Available ?  <span class="text-danger">*</span></label>
                                    <select name="txtWarranty" id="txtWarranty" class="form-control">
                                        <option value="1" {{$sellerproducts->warranty==1 ? "selected" : ""}}>Yes</option>
                                        <option value="0" {{$sellerproducts->warranty==0 ? "selected" : ""}}>No</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-12">
                                    <label class="col-form-label">Status</label>
                                    <select id="txtStatus" class="form-control" name="txtStatus" required>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ ( $status->id == $sellerproducts->status) ? 'selected' : '' }}>
                                            {{ $status->s_name }}
                                        </option>
                                        @endforeach
                                    </select>  
                                </div>

                                <div class="form-group col-12">
                                    <label>SEO Title</label>
                                    <input type="text" class="form-control" name="txtSeoTitle" id="txtSeoTitle" value="{{$sellerproducts->seo_title}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>SEO Description</label>
                                    <textarea name="txtSeoDescription" id="txtSeoDescription" cols="30" rows="10" class="form-control text-area-5">{{$sellerproducts->seo_description}}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label>Specifications</label>
                                    <div>
                                        <a href="javascript::void()" id="manageSpecificationBox">
                                            <input name="txtSpecification" id="status_toggle" type="checkbox" checked data-toggle="toggle" data-on="Enable" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-12" id="specification-box">
                                    <div class="table-responsive">
                                        <table class="table-review mb-0" id="table_alterations">
                                            <thead>
                                                <tr>
                                                    <th><label>Key <span class="text-danger">*</span></label></th>
                                                    <th><label style="margin-left:20px;">Specification <span class="text-danger">*</span></label></th>
                                                    <th><button type="button" class="btn btn-success btn-add-row ml-1"><i class="fa fa-plus"></i></button></th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_alterations_tbody">
                                                <tr>
                                                    <td>
                                                        <select id="" style="width:400px;" type="text" class="form-control" name="txtSpecificationKey[]">
                                                            <option selected><-----Select Key----></option>
                                                            @foreach ($specification as $specific)
                                                            <option value="{{ $specific->id }}">{{ $specific->key }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="text" style="width:400px;" class="form-control ml-4"name="specifications[]"></td>
                                                    <td><button type="button" class="btn btn-danger ml-1" id="comments_remove"><i class="fas fa-trash"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-4">
                                <div class="col-12">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    (function($) {
        "use strict";
        var specification = true;
        $(document).ready(function () {
            $("#manageSpecificationBox").on("click",function(){
                if(specification){
                    specification = false;
                    $("#specification-box").addClass('d-none');
                }else{
                    specification = true;
                    $("#specification-box").removeClass('d-none');
                }


            })

        });
    })(jQuery);
	$(document).ready(function () {
    $('.summernote').summernote();
});

function previewThumnailImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview-img');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
};

$(document).on("click", '.btn-add-row', function () {
    var id = $(this).closest("table.table-review").attr('id');  // Id of particular table

    var div = $("<tr/>");
    div.html(GetDynamicTextBox(id));
    $("#"+id+"_tbody").append(div);
});
$(document).on("click", "#comments_remove", function () {
    $(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger" id="comments_remove"><i class="fas fa-trash"></i></button>');
    $(this).closest("tr").remove();
});
function GetDynamicTextBox(table_id) {
    
    var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody");
    return '<td><select id="" style="width:400px;" type="text" class="form-control" name="txtSpecificationKey[]"><option selected><-----Select Key----></option>@foreach ($specification as $specific)<option value="{{ $specific->id }}">{{ $specific->key }}</option> @endforeach</select></td><td><input type="text" style="width:400px;" class="form-control ml-4"name="specifications[]"></td><td><button type="button" class="btn btn-danger ml-1" id="comments_remove"><i class="fas fa-trash"></i></button></td>'
}

</script>
@section('js')
<script src="{{url('backends/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection