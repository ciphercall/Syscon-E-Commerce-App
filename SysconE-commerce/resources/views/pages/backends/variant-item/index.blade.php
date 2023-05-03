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
			<h1>Product Variant Item</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/products')}}">Product</a></div>
              <div class="breadcrumb-item active"><a href="{{url('/product-variant')}}">Product Variant</a></div>
              <div class="breadcrumb-item">Product Variant Item</div>
            </div>
		</div>
    </section>

    <div class="section-body">
        <button onclick="history.go(-1)" class="btn btn-primary"><i class="fas fa-backward"></i>&nbsp;Go Back</button>
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_items"><i class="fa fa-plus"></i>Add New</a> 
		<div class="row mt-4">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" id="table-1">
								<thead>
									<tr>
										<th class="sorting sorting_asc">SN</th>
										<th class="sorting">Variant</th>
										<th class="sorting">Item</th>
										<th class="sorting">Price</th>
										<th class="sorting">Status</th>
										<th class="sorting">Action</th>
									</tr>
								</thead>
								<tbody> 
									@forelse ($items as $items)
									<tr class="odd">
										<td>{{$items-> id}}</td>
										<td>{{$items-> variant_name}}</td>
										<td>{{$items-> item}}</td>
										<td>${{$items-> price}}</td>
										<td>
											@if($items->status==1)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$items->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
											</div>
											@elseif($items->status==2)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$items->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
											</div>
											@else
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$items->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
											</div>
											@endif
										</td>
										<td class="text-right py-0 align-middle">
											<div class="btn-group btn-group-sm">
												<button type="button" value="{{$items->id}}" class="btn btn-primary" id="edititems" ><i class="fas fa-edit" ></i> </button>&nbsp;
												<button type="button" value="{{$items->id}}" class="btn btn-danger" id="itemsDbtn" ><i class="fas fa-trash"></i> </button>
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

<!-- Add Variant-Item Modal -->
<div class="modal fade" id="add_items" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Create Product Variant Item</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">
					<form action="{{route('product-variant-item.store')}}" method="post" enctype="multipart/form-data">
						@csrf                            
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-5">
									<input type="hidden" value="{{$variant->id}}" name="cmbVariantId" >
									<input type="hidden" value="{{$variant->product_id}}" name="product_id" >
									<label class="col-form-label">Variant Name:&nbsp;</label>
									<input type="text" class="form-control" id="cmbVariantId" name="" value="{{$variant->variant_name}}" readonly>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="input-group mb-5">
									<label class="col-form-label">Item Name:&nbsp;</label>
									<input type="text" class="form-control" id="txtItem" name="txtItem"required>
								</div>
							</div>

							<div class="form-group col-12">
								<div class="input-group mb-5">
									<label class="col-form-label">Price:&nbsp;</label>
									<input type="text" id="txtPrice" class="form-control"  name="txtPrice" >
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
<!-- /Add Variant-Item Modal -->
<!-- Edit Variant-Item Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Product Variant item</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('product-variant-item-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbVariantitemId" name="cmbVariantitemId" >
								<input type="hidden" value="{{$variant->id}}" name="cmbVariantId" >
								<input type="hidden" value="{{$variant->product_id}}" name="product_id" >
								<label class="col-form-label">Variant Name:&nbsp;</label>
								<input type="text" class="form-control" id="txtVariantId" value="{{$variant->variant_name}}" readonly>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Item Name:&nbsp;</label>
								<input type="text" class="form-control" id="eItem" name="txtItem">
							</div>
						</div>

						<div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Price:&nbsp;</label>
								<input type="number" class="form-control" id="ePrice" name="txtPrice">
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
<!-- /Edit Variant-Item Modal -->
<!-- Delete Variant-Item Modal -->
<div class="modal custom-modal fade" id="delete_items" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Variant-Item</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-product-variant-item')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_itemsId" name="d_items">
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
<!-- /Delete Variant-Item Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#itemsDbtn',function(){
            // alart("ok");
			var items_id=$(this).val();
			$('#delete_items').modal('show');
			$('#delete_itemsId').val(items_id);
		});

		$(document).on('click','#edititems',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-product-variant-item/"+eid,
				success:function(response){
					$('#cmbVariantitemId').val(eid);		
					$('#eItem').val(response.items.item);
					$('#ePrice').val(response.items.price);
                    $('#eStatus').val(response.items.status);
					
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