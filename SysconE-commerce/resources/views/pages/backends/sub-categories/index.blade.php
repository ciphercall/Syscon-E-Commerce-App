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
			<h1>Product Sub Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/category')}}">Product Category</a></div>
              <div class="breadcrumb-item">Product Sub Category</div>
            </div>
		</div>
    </section>
     <!-- /Page Header -->
	<div class="row">
        <div class="col-auto float-right ml-auto pb-2" >
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_subcategories"><i class="fa fa-plus"></i>Add New</a> 
        </div>
	</div>
	<!-- /Page Header -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
						<table class="table table-striped" id="table-1">
							<thead>
								<tr>
								<th class="sorting sorting_asc">SN</th>
								<th class="sorting">Sub Category</th>
								<th class="sorting">Slug</th>
								<th class="sorting">Icon</th>
								<th class="sorting">Category</th>
								<th class="sorting">Status</th>
								<th class="sorting">Action</th>
								</tr>
							</thead>
							<tbody> 
								@forelse ($subcategories as $subcategories)
								<tr class="odd">
									<td>{{$subcategories-> id}}</td>
									<td>{{$subcategories-> sub_categoryname}}</td>
									<td>{{$subcategories-> slug}}</td>
									<td><i class="{{$subcategories-> icon}}"></i></td>
									<td>{{$subcategories-> c_name}}</td>
									<td>
										@if($subcategories->status==1)
										<div>
											<input type="checkbox" checked data-toggle="toggle" data-on="{{$subcategories->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
										</div>
										@elseif($subcategories->status==2)
										<div>
											<input type="checkbox" checked data-toggle="toggle" data-on="{{$subcategories->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
										</div>
										@else
										<div>
											<input type="checkbox" checked data-toggle="toggle" data-on="{{$subcategories->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
										</div>
										@endif
									</td>
									<td class="text-right py-0 align-middle">
										<div class="btn-group btn-group-sm">
											<button type="button" value="{{$subcategories->id}}" class="btn btn-primary" id="editsubcategories" ><i class="fas fa-edit" ></i> </button>&nbsp;
											<button type="button" value="{{$subcategories->id}}" class="btn btn-danger" id="subcategoriesDbtn" ><i class="fas fa-trash"></i> </button>
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

<!-- Add Sub-Category Modal -->
<div id="add_subcategories" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Product Sub Category</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('sub-category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Sub Category:&nbsp;</label>
                                <input type="text" class="form-control" id="txtSubCategoryName" name="txtSubCategoryName"required>
                            </div>
                        </div>	

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Slug:&nbsp;</label>
                                <input type="text" class="form-control" id="txtSlug" name="txtSlug"required>
                            </div>
                        </div>

						<div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Icon:&nbsp;</label>
                                <input type="text" class="form-control" id="txtIcon" name="txtIcon"required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Category:&nbsp;</label>
                                <select id="txtCategory" class="form-control" name="txtCategory" required>
									<option selected><-----Choose Category----></option>
									@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->c_name }}</option>
									@endforeach
								</select>
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

                    <div class="submit-section float-right">
                        <button type="button" class="btn btn-info" style="width:80px;" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary submit-btn" type="submit" name="btnCreate" style="width:80px;" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Sub-Category Modal -->

<!-- Edit Sub-Category Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Product Sub Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('sub-category-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbSubcategoriesId" name="cmbSubcategoriesId" >
								<label class="col-form-label">Sub Category:&nbsp;</label>
								<input type="text" class="form-control" id="eSubCategoryName" name="txtSubCategoryName">
							</div>
						</div>
                        
                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Slug:&nbsp;</label>
								<input type="text" class="form-control" id="eSlug" name="txtSlug">
							</div>
						</div>

						<div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Icon:&nbsp;</label>
                                <input type="text" class="form-control" id="eIcon" name="txtIcon"required>
                            </div>
                        </div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Category:&nbsp;</label>
                                <select id="eCategory" class="form-control" name="txtCategory">
									<option selected>Choose...</option>
									@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->c_name }}</option>
									@endforeach
								</select>
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
<!-- /Edit Sub-Category Modal -->
<!-- Delete Sub-Category Modal -->
<div class="modal custom-modal fade" id="delete_subcategories" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Category</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-sub-category')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_subcategoriesId" name="d_subcategories">
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
<!-- /Delete Category Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#subcategoriesDbtn',function(){
            // alart("ok");
			var subcategories_id=$(this).val();
			$('#delete_subcategories').modal('show');
			$('#delete_subcategoriesId').val(subcategories_id);
		});

		$(document).on('click','#editsubcategories',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-sub-category/"+eid,
				success:function(response){
					$('#cmbSubcategoriesId').val(eid);		
					$('#eSubCategoryName').val(response.subcategories.sub_categoryname);
                    $('#eSlug').val(response.subcategories.slug);
					$('#eIcon').val(response.subcategories.icon);
                    $('#eCategory').val(response.subcategories.category);
                    $('#eStatus').val(response.subcategories.status);
					
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