@extends('layout.seller.master')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection
@section('page')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Product Variant Item</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/seller-dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{url('/seller/product')}}">Product</a></div>
                <div class="breadcrumb-item">Product Variant</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{url('/seller/product')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_sellervariant"><i class="fa fa-plus"></i>Add New</a> 

            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3>Product : {{$product->p_name}}</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="dataTable_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting">Color</th>
                                            <th class="sorting">Size</th>
                                            <th class="sorting">Price</th>
                                            <th class="sorting">Quantity</th>
                                            <th class="sorting">Status</th>
                                            <th class="sorting">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody> 
                                        @forelse ($sellervariant as $sellervariant)
                                        <tr class="odd">
                                            <td>{{$sellervariant-> variant_name}}</td>
                                            <td>{{$sellervariant-> variant_item}}</td>
                                            <td>${{$sellervariant-> variant_price}}</td>
                                            <td>{{$sellervariant-> variant_quantity}}</td>
                                            <td> 
                                                <input data-id="{{$sellervariant->id}}" id="toggle-class" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $sellervariant->status ? 'checked' : '' }}>
                                            </td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" value="{{$sellervariant->id}}" class="btn btn-primary" id="editsellervariant" ><i class="fas fa-edit" ></i> </button>&nbsp;
                                                    <button type="button" value="{{$sellervariant->id}}" class="btn btn-danger" id="sellervariantDbtn" ><i class="fas fa-trash"></i> </button>
                                                </div>
                                            </td>   
                                        </tr>
                                        @empty
                                            <div colspan="14">No records found</div>
                                        @endforelse
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Add Product-Variant Modal -->
<div class="modal fade" id="add_sellervariant" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Product-Variant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('seller-products-variant.store')}}" method="POST">
                        @csrf                           
                        <div class="row">
                            <div class="form-group col-12">
                                <input type="hidden" value="{{$product->id}}"  name="cmbProductvariantId" >
                                <label>Color <span class="text-danger">*</span></label>
                                <input type="text" id="txtVariantName" class="form-control"  name="txtVariantName">
                            </div>

                            <div class="form-group col-12">
                                <label>Size <span class="text-danger">*</span></label>
                                <input type="text" id="txtVariantItem" class="form-control"  name="txtVariantItem">
                            </div>

                            <div class="form-group col-12">
                                <label>Price <span class="text-danger">*</span></label>
                                <input type="text" id="txtVariantPrice" class="form-control"  name="txtVariantPrice">
                            </div>

                            <div class="form-group col-12">
                                <label>Quantity <span class="text-danger">*</span></label>
                                <input type="number" id="txtVariantQuantity" class="form-control"  name="txtVariantQuantity">
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
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Add Product-Variant Modal -->
<!-- Edit Product-Variant Modal -->
<div id="editModal" class="modal fade" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Product Variant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('seller/product-variant-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbProductvariantId" name="cmbProductvariantId" >
								<label class="col-form-label">Name:&nbsp;</label>
								<input type="text" class="form-control" id="eVariantName" name="txtVariantName">
							</div>
						</div>
                        
                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Item:&nbsp;</label>
								<input type="text" class="form-control" id="eVariantItem" name="txtVariantItem">
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Price:&nbsp;</label>
								<input type="text" class="form-control" id="eVariantPrice" name="txtVariantPrice">
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Quantity:&nbsp;</label>
								<input type="text" class="form-control" id="eVariantQuantity" name="txtVariantQuantity">
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Status:&nbsp;</label>
                                <select id="eStatus" class="form-control" name="txtStatus" required>
									<option selected><-----Select Status----></option>
									@foreach ($statuses as $status)
									<option value="{{ $status->id }}">{{ $status->s_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="submit-section float-right">
						<button type="button" class="btn btn-info" style="width:80px;" data-dismiss="modal">Cancle</button>
						<input class="btn btn-primary submit-btn" type="submit"  name="btnUpdate" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Product-Variant Modal -->
<!-- Delete Product-Variant Modal -->
<div class="modal custom-modal fade" id="delete_sellervariant" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Variant</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-seller/product-variant')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_sellervariantId" name="d_sellervariant">
                                <button type="submit" class="btn btn-danger continue-btn">Delete</button>		
							</form>
						</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-info cancel-btn">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Product-Variant Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#sellervariantDbtn',function(){
            // alart("ok");
			var sellervariant_id=$(this).val();
			$('#delete_sellervariant').modal('show');
			$('#delete_sellervariantId').val(sellervariant_id);
		});

        $(document).on('click','#editsellervariant',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-seller-products-variant/"+eid,
				success:function(response){
					$('#cmbProductvariantId').val(eid);		
					$('#eVariantName').val(response.sellervariant.variant_name);
                    $('#eVariantItem').val(response.sellervariant.variant_item);
                    $('#eVariantPrice').val(response.sellervariant.variant_price);
                    $('#eVariantQuantity').val(response.sellervariant.variant_quantity);
                    $('#eStatus').val(response.sellervariant.status);
					
				}
			});
		});
    
	});
	$(document).ready(function () {
    $('#dataTable').DataTable();
});

    $('.toggle-class').on("change" ,function() {
        var status = $(this).prop('checked') == true ? 2 : 1;
        var id = $(this).data('id');
         //alert(status);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/status/update',
            data: {'status': status, 'id': id},
            success: function(data){
            console.log(data.success)
            }
        });
    })
</script>
@endsection
@endsection