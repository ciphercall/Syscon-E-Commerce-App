@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<style>
	img {
  border-radius: 50%;
  background-color: #fff;
}
</style>

<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Product Brand</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Product Brand</div>
            </div>
		</div>
    </section>
     <!-- /Page Header -->
	<div class="row">
        <div class="col-auto float-right ml-auto pb-2" >
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_brands"><i class="fa fa-plus"></i>Add New</a> 
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
								<th class="sorting">Name</th>
								<th class="sorting">Slug</th>
								<th class="sorting">Logo</th>
								<th class="sorting">Rating</th>
								<th class="sorting">Status</th>
								<th class="sorting">Action</th>
								</tr>
							</thead>
							<tbody> 
								@forelse ($brands as $brands)
								<tr class="odd">
									<td>{{$brands-> id}}</td>
									<td>{{$brands-> name}}</td>
									<td>{{$brands-> slug}}</td>
									<td><img src="{{asset('img/'.$brands->logo)}}" height="70px" width="70px" alt=""></td>
									<td>{{$brands-> rating}}</td>
									<td>
										@if($brands->status==1)
										<div>
											<input type="checkbox" checked data-toggle="toggle" data-on="{{$brands->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
										</div>
										@elseif($brands->status==2)
										<div>
											<input type="checkbox" checked data-toggle="toggle" data-on="{{$brands->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
										</div>
										@else
										<div>
											<input type="checkbox" checked data-toggle="toggle" data-on="{{$brands->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
										</div>
										@endif
									</td>
									<td class="text-right py-0 align-middle">
										<div class="btn-group btn-group-sm">
											<button type="button" value="{{$brands->id}}" class="btn btn-primary" id="editbrands" ><i class="fas fa-edit" ></i> </button>&nbsp;
											<button type="button" value="{{$brands->id}}" class="btn btn-danger" id="brandsDbtn" ><i class="fas fa-trash"></i> </button>
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
<!-- Add Brands Modal -->
<div id="add_brands" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Brand</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-5">
                                <label for="">Logo</label>
                                <input type="file" name="file_logo" class="form-control-file">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Name:&nbsp;</label>
                                <input type="text" class="form-control" id="txtName" name="txtName"required>
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
                                <label class="col-form-label">Rating:&nbsp;</label>
                                <input type="text" class="form-control" id="txtRating" name="txtRating"required>
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
<!-- /Add Brands Modal -->
<!-- Edit Brands Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Product Brand</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('brands-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
                        <div class="col-sm-12">
							<div class="input-group">
                            <input type="hidden" value="" id="cmbBrandsId" name="cmbBrandsId" >
								<div class="form-group" id="eFilelogo"></div>	
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
                                <label class="col-form-label">Logo:&nbsp;</label>
								<input type="file" class="form-control" name="file_logo"  placeholder="image"><br>
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Name:&nbsp;</label>
								<input type="text" class="form-control" id="eName" name="txtName">
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Slug:&nbsp;</label>
								<input type="text" class="form-control" id="eSlug" name="txtSlug">
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Rating:&nbsp;</label>
								<input type="text" class="form-control" id="eRating" name="txtRating">
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
<!-- /Edit Brands Modal -->
<!-- Delete Brands Modal -->
<div class="modal custom-modal fade" id="delete_brands" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Brand</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-brands')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_brandsId" name="d_brands">
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
<!-- /Delete Brands Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
<script>
	$(document).ready(function(){

        $(document).on('click','#brandsDbtn',function(){
            // alart("ok");
			var brands_id=$(this).val();
			$('#delete_brands').modal('show');
			$('#delete_brandsId').val(brands_id);
		});

		$(document).on('click','#editbrands',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-brands/"+eid,
				success:function(response){	
					$('#cmbBrandsId').val(eid);		
					$('#eName').val(response.brands.name);
					$('#eSlug').val(response.brands.slug);
					$('#eRating').val(response.brands.rating);
					$('#eStatus').val(response.brands.status);
					$("#eFilelogo").html(
                        `<img src="img/${response.brands.logo}" width="100" class="img-fluid img-thumbnail">`);
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