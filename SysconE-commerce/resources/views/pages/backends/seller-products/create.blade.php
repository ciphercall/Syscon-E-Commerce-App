@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/summernote/summernote-bs4.css')}}">
@endsection
@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Create Product</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{url('seller-products')}}" class="btn btn-primary"><i class="fas fa-list"></i> Products</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('seller-products.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Thumbnail Image Preview</label>
                                        <div>
                                            <img id="preview-img" class="admin-img" src="{{url('backends/assets/img/preview.png')}}" alt="" height="120px" width="120px">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Thumnail Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control-file"  name="file_img" onchange="previewThumnailImage(event)">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Banner Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control-file"  name="file_bannerimg">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Short Name <span class="text-danger">*</span></label>
                                        <input type="text" id="txtShortName" class="form-control"  name="txtShortName" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" id="txtName" class="form-control"  name="txtName" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Seller Id <span class="text-danger">*</span></label>
                                        <input type="text" id="txtSellerId" class="form-control"  name="txtSellerId" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <input type="text" id="txtSlug" class="form-control"  name="txtSlug" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Model No: <span class="text-danger">*</span></label>
                                        <input type="text" id="txtModelNo" class="form-control"  name="txtModelNo" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Category <span class="text-danger">*</span></label>
                                        <select id="txtCategory" class="form-control" name="txtCategory" required>
                                            <option selected><-----Choose Category----></option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->c_name }}</option>
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
                                        <label>Sub Category</label>
                                        <select id="txtSubcategory" class="form-control" name="txtSubcategory" required>
                                            <option selected><-----Choose Sub-Category----></option>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->sub_categoryname }}</option>
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
                                        <label>Child Category</label>
                                        <select id="txtChildcategory" class="form-control" name="txtChildcategory" required>
                                            <option selected><-----Choose Child-Category----></option>
                                            @foreach ($childcategories as $childcategory)
                                            <option value="{{ $childcategory->id }}">{{ $childcategory->child_category }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Brand <span class="text-danger">*</span></label>
                                        <select id="txtBrand" class="form-control" name="txtBrand" required>
                                            <option selected><-----Choose Brands----></option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Product Type <span class="text-danger">*</span></label>
                                        <select id="txtProductType" class="form-control" name="txtProductType" required>
                                            <option selected><-----Choose Type----></option>
                                            @foreach ($section as $val)
                                            <option value="{{ $val->id }}">{{ $val->section_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>SKU </label>
                                        <input type="text" class="form-control" name="txtSku">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Purchase Scaner</label>
                                        <select name="txtPurchaseScane" id="txtPurchaseScane" class="form-control">
                                            <option value="">Select Scaner</option>
                                            <option value="1">Barcode</option>
                                            <option value="2">Serial No</option>
                                            <option value="3">IMI No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Unit</label>
                                        <select id="txtUnit" class="form-control" name="txtUnit" required>
                                            <option selected><-----Select Unit----></option>
                                            @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Price <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="txtPrice" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Offer Price</label>
                                        <input type="text" class="form-control" name="txtOfferPrice">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Stock Quantity <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="txtStockQuantity" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Video Link</label>
                                        <input type="text" class="form-control" name="txtVideoLink">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Short Description <span class="text-danger">*</span></label>
                                        <textarea name="txtShortDescription" id="" cols="30" rows="10" class="form-control text-area-5"></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Long Description <span class="text-danger">*</span></label>
                                        <textarea name="txtLongDescription" id="txtLongDescription" class="summernote"></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Tags</label>
                                        <input type="text" class="form-control" name="txtTag">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Tax <span class="text-danger">*</span></label>
                                        <select id="txtTax" class="form-control" name="txtTax" required>
                                            <option selected><-----Select Tax----></option>
                                            @foreach ($tax as $val)
                                            <option value="{{ $val->id }}">{{ $val->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Product Return Availabe ? <span class="text-danger">*</span></label>
                                        <select name="txtReturnPolicy" class="form-control" id="txtReturnPolicy" >
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Warranty Available ?  <span class="text-danger">*</span></label>
                                        <select name="txtWarranty" id="txtWarranty" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select id="txtStatus" class="form-control" name="txtStatus" required>
                                            <option selected><-----Select Status----></option>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->s_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>SEO Title</label>
                                        <input type="text" class="form-control" name="txtSeoTitle" id="txtSeoTitle" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>SEO Description</label>
                                        <textarea name="txtSeoDescription" id="txtSeoDescription" cols="30" rows="10" class="form-control text-area-5"></textarea>
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
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
