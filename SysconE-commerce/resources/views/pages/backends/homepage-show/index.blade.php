@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
@endsection

@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Show Homepage</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Show Homepage</div>
            </div>
		</div>
    </section>
     <!-- /Page Header -->
	<div class="row">
        <div class="col-auto float-right ml-auto pb-2" >
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_show"><i class="fa fa-plus"></i>Add New</a> 
        </div>
	</div>
	<!-- /Page Header -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-invoice">
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="dataTable_info">
							<thead>
								<tr>
								<th class="sorting sorting_asc">No</th>
								<th class="sorting">Homepage Show Status</th>
								<th class="sorting">Action</th>
								</tr>
							</thead>
							<tbody> 
								@forelse ($show as $show)
								<tr class="odd">
									<td>{{$show-> id}}</td>
									<td>{{$show-> hp_show}}</td>
									<td class="text-right py-0 align-middle">
										<div class="btn-group btn-group-sm">
											<button type="button" value="{{$show->id}}" class="btn btn-primary" id="editshow" ><i class="fas fa-edit" ></i> </button>&nbsp;
											<button type="button" value="{{$show->id}}" class="btn btn-danger" id="showDbtn" ><i class="fas fa-trash"></i> </button>
										</div>
									</td>   
								</tr>
							</tbody> 
							@empty
								<tr><td colspan="14">No records found</td></tr>
							@endforelse  
						</table>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>

<!-- Add Homepage Show Modal -->
<div id="add_show" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Homepage Status</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('show-homepage.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Homepage Show:&nbsp;</label>
                                <input type="text" class="form-control" id="txtHomepageShow" name="txtHomepageShow"required>
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
<!-- /Add Homepage Show Modal -->

<!-- Edit Homepage Show Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('show-homepage-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbHomepageId" name="cmbHomepageId" >
								<label class="col-form-label">Homepage Show:&nbsp;</label>
								<input type="text" class="form-control" id="eHomepageShow" name="txtHomepageShow" required>
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
<!-- /Edit Homepage Show Modal -->
<!-- Delete Homepage Show Modal -->
<div class="modal custom-modal fade" id="delete_show" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Status</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-show-homepage')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_showId" name="d_show">
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
<!-- /Delete Homepage Show Modal -->
<script>
	$(document).ready(function(){

        $(document).on('click','#showDbtn',function(){
            // alart("ok");
			var show_id=$(this).val();
			$('#delete_show').modal('show');
			$('#delete_showId').val(show_id);
		});

		$(document).on('click','#editshow',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-show-homepage/"+eid,
				success:function(response){
					$('#cmbHomepageId').val(eid);		
					$('#eHomepageShow').val(response.show.hp_show);
					
				}
			});
		});
    
	});
	$(document).ready(function () {
    $('#dataTable').DataTable();
});

</script>
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
@endsection
@endsection