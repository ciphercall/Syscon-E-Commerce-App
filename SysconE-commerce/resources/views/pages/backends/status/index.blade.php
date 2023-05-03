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
			<h1>Status</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Status</div>
            </div>
		</div>
    </section>
     <!-- /Page Header -->
	<div class="row">
        <div class="col-auto float-right ml-auto pb-2" >
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_statuses"><i class="fa fa-plus"></i>Add New</a> 
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
								<th class="sorting">Status</th>
								<th class="sorting">Action</th>
								</tr>
							</thead>
							<tbody> 
								@forelse ($statuses as $statuses)
								<tr class="odd">
									<td>{{$statuses-> id}}</td>
									<td>{{$statuses-> s_name}}</td>
									<td class="text-right py-0 align-middle">
										<div class="btn-group btn-group-sm">
											<button type="button" value="{{$statuses->id}}" class="btn btn-primary" id="editstatuses" ><i class="fas fa-edit" ></i> </button>&nbsp;
											<button type="button" value="{{$statuses->id}}" class="btn btn-danger" id="statusesDbtn" ><i class="fas fa-trash"></i> </button>
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

<!-- Add Status Modal -->
<div id="add_statuses" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Status</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('status.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Status:&nbsp;</label>
                                <input type="text" class="form-control" id="txtName" name="txtName"required>
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
<!-- /Add Status Modal -->

<!-- Edit Status Modal -->
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
				<form action="{{url('status-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbStatusId" name="cmbStatusId" >
								<label class="col-form-label">Status:&nbsp;</label>
								<input type="text" class="form-control" id="eName" name="txtName" required>
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
<!-- /Edit Status Modal -->
<!-- Delete Status Modal -->
<div class="modal custom-modal fade" id="delete_statuses" role="dialog">
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
							<form action="{{url('delete-status')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_statusesId" name="d_statuses">
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
<!-- /Delete Status Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#statusesDbtn',function(){
            // alart("ok");
			var statuses_id=$(this).val();
			$('#delete_statuses').modal('show');
			$('#delete_statusesId').val(statuses_id);
		});

		$(document).on('click','#editstatuses',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-status/"+eid,
				success:function(response){
					$('#cmbStatusId').val(eid);		
					$('#eName').val(response.statuses.s_name);
					
				}
			});
		});
    
	});
	$(document).ready(function () {
    $('#dataTable').DataTable();
});

</script>
@endsection
@endsection