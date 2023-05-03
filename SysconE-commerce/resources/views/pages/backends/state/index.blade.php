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
			<h1>State</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">State</div>
            </div>
		</div>
    </section>

	<div class="section-body">
		<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_state"><i class="fa fa-plus"></i>Add State</a> 
		<div class="row mt-4">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" id="table-1">
								<thead>
									<tr>
									<th class="sorting sorting_asc">No</th>
									<th class="sorting">State</th>
                                    <th class="sorting">Country</th>
									<th class="sorting">Status</th>
									<th class="sorting">Action</th>
									</tr>
								</thead>
								<tbody> 
									@forelse ($state as $state)
									<tr class="odd">
										<td>{{$state-> id}}</td>
										<td>{{$state-> state_name}}</td>
                                        <td>{{$state-> country_name}}</td>
										<td>
											@if($state->status==1)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$state->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
											</div>
											@elseif($state->status==2)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$state->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
											</div>
											@else
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$state->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
											</div>
											@endif
										</td>
										<td class="text-right py-0 align-middle">
											<div class="btn-group btn-group-sm">
												<button type="button" value="{{$state->id}}" class="btn btn-primary" id="editstate" ><i class="fas fa-edit" ></i> </button>&nbsp;
												<button type="button" value="{{$state->id}}" class="btn btn-danger" id="stateDbtn" ><i class="fas fa-trash"></i> </button>
											</div>
										</td>   
									</tr>
									@empty
										<tr><td colspan="14">No records found</td></tr>
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

<!-- Add State Modal -->
<div id="add_state" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add State</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('state.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Country:&nbsp;</label>
                                <select id="txtCountry" class="form-control" name="txtCountry" required>
									<option selected><-----Select Country----></option>
									@foreach ($country as $countries)
									<option value="{{ $countries->id }}">{{ $countries->country_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">State Name:&nbsp;</label>
                                <input type="text" class="form-control" id="txtStateName" name="txtStateName"required>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
							<div class="input-group mb-4">
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
<!-- /Add State Modal -->

<!-- Edit State Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit State</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('state-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
                        <div class="col-sm-12">
							<div class="input-group mb-4">
                                <input type="hidden" value="" id="cmbStateId" name="cmbStateId" >
								<label class="col-form-label">Country NAme:&nbsp;</label>
                                <select id="eCountry" class="form-control" name="txtCountry" required>
									<option selected><-----Select Country----></option>
									@foreach ($country as $countries)
									<option value="{{ $countries->id }}">{{ $countries->country_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">State Name:&nbsp;</label>
								<input type="text" class="form-control" id="eStateName" name="txtStateName" required>
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
<!-- /Edit State Modal -->
<!-- Delete State Modal -->
<div class="modal custom-modal fade" id="delete_state" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete State</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-state')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_stateId" name="d_state">
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
<!-- /Delete State Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#stateDbtn',function(){
            // alart("ok");
			var state_id=$(this).val();
			$('#delete_state').modal('show');
			$('#delete_stateId').val(state_id);
		});

		$(document).on('click','#editstate',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-state/"+eid,
				success:function(response){
					$('#cmbStateId').val(eid);
                    $('#eCountry').val(response.state.country);		
					$('#eStateName').val(response.state.state_name);
                    $('#eStatus').val(response.state.status);
					
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