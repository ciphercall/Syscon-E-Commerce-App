@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
@endsection

@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Timezone</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Timezone</div>
            </div>
		</div>
    </section>
     <!-- /Page Header -->
	<div class="row">
        <div class="col-auto float-right ml-auto pb-2" >
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_timezone"><i class="fa fa-plus"></i>Add Timezone</a> 
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
								<th class="sorting">Timezone</th>
								<th class="sorting">Action</th>
								</tr>
							</thead>
							<tbody> 
								@forelse ($timezone as $timezone)
								<tr class="odd">
									<td>{{$timezone-> id}}</td>
									<td>{{$timezone-> time_zone}}</td>
									<td class="text-right py-0 align-middle">
										<div class="btn-group btn-group-sm">
											<button type="button" value="{{$timezone->id}}" class="btn btn-primary" id="edittimezone" ><i class="fas fa-edit" ></i> </button>&nbsp;
											<button type="button" value="{{$timezone->id}}" class="btn btn-danger" id="timezoneDbtn" ><i class="fas fa-trash"></i> </button>
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

<!-- Add Timezone Modal -->
<div id="add_timezone" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Timezone</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('timezone.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Timezone:&nbsp;</label>
                                <input type="text" class="form-control" id="txtTimezone" name="txtTimezone"required>
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
<!-- /Add Timezone Modal -->

<!-- Edit Timezone Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Timezone</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('timezone-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbTimezoneId" name="cmbTimezoneId" >
								<label class="col-form-label">Timezone:&nbsp;</label>
								<input type="text" class="form-control" id="eTimezone" name="txtTimezone" required>
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
<!-- /Edit Timezone Modal -->
<!-- Delete Timezone Modal -->
<div class="modal custom-modal fade" id="delete_timezone" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Timezone</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-timezone')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_timezoneId" name="d_timezone">
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
<!-- /Delete Timezone Modal -->
<script>
	$(document).ready(function(){

        $(document).on('click','#timezoneDbtn',function(){
            // alart("ok");
			var timezone_id=$(this).val();
			$('#delete_timezone').modal('show');
			$('#delete_timezoneId').val(timezone_id);
		});

		$(document).on('click','#edittimezone',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-timezone/"+eid,
				success:function(response){
					$('#cmbTimezoneId').val(eid);		
					$('#eTimezone').val(response.timezone.time_zone);
					
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