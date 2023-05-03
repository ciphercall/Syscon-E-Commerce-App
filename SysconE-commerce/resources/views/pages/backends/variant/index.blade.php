@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Product Variant</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="{{url('/products')}}">Product</a></div>
              <div class="breadcrumb-item">Product Variant</div>
            </div>
		</div>
    </section>

    <div class="section-body">
        <a href="{{url('/products')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_variant"><i class="fa fa-plus"></i>Add New</a> 
		<div class="row mt-4">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<h2>Product :{{$product->p_name}}</h2>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" id="table-1">
								<thead>
									<tr>
										<th class="sorting sorting_asc">SN</th>
										<th class="sorting">Name</th>
										<th class="sorting">Status</th>
										<th class="sorting">Action</th>
									</tr>
								</thead>
								<tbody> 
									@forelse ($variant as $variant)
									<tr class="odd">
										<td>{{$variant-> id}}</td>
										<td>{{$variant-> variant_name}}</td>
										<td>
											@if($variant->status==1)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$variant->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
											</div>
											@elseif($variant->status==2)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$variant->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
											</div>
											@else
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$variant->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
											</div>
											@endif
										</td>
										<td class="text-right py-0 align-middle">
                                            <a href="{{url('product-variant-item/'.$variant->id)}}" class="btn btn-success btn-sm"><i class="fas fa-cog" aria-hidden="true"></i> manage options</a>
											<div class="btn-group btn-group-sm">
												<button type="button" value="{{$variant->id}}" class="btn btn-primary" id="editvariant" ><i class="fas fa-edit" ></i> </button>&nbsp;
												<button type="button" value="{{$variant->id}}" class="btn btn-danger" id="variantDbtn" ><i class="fas fa-trash"></i> </button>
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
</div>
<!-- Add Variant Modal -->
<div class="modal fade" id="add_variant" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Product Variant</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('product-variant.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <input type="hidden" value="{{$product->id}}"  name="cmbVariantId" >
                                <label class="col-form-label">Name:&nbsp;</label>
                                <input type="text" class="form-control" id="txtVariantName" name="txtVariantName"required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Status:&nbsp;</label>
                                <select id="txtStatus" class="form-control" name="txtStatus" required>
									<option selected><-----Select Status----></option>
									@foreach ($statuses as $status)
									<option value="{{ $status->id }}">{{ $status->s_name }}</option>
									@endforeach
								</select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Variant Modal -->
<!-- Edit Variant Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Product Variant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('product-variant-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbPvariantId" name="cmbPvariantId" >
                                <input type="hidden" value="{{$product->id}}"  name="cmbVariantId" >
								<label class="col-form-label">Name:&nbsp;</label>
								<input type="text" class="form-control" id="eVariantName" name="txtVariantName">
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

                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Variant Modal -->
<!-- Delete Variant Modal -->
<div class="modal custom-modal fade" id="delete_variant" role="dialog">
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
							<form action="{{url('delete-product-variant')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_variantId" name="d_variant">
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
<!-- /Delete Variant Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#variantDbtn',function(){
            // alart("ok");
			var variant_id=$(this).val();
			$('#delete_variant').modal('show');
			$('#delete_variantId').val(variant_id);
		});

		$(document).on('click','#editvariant',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-product-variant/"+eid,
				success:function(response){
					$('#cmbPvariantId').val(eid);		
					$('#eVariantName').val(response.variant.variant_name);
                    $('#eStatus').val(response.variant.status);
					
				}
			});
		});
    
	});

$("#table-1").dataTable({
	"columnDefs": [
		{ "sortable": false, "targets": [2,3] }
	]
});
</script>
@endsection

@endsection