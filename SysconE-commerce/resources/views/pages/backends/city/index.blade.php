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
			<h1>City</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">City</div>
            </div>
		</div>
    </section>

	<div class="section-body">
		<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_cities"><i class="fa fa-plus"></i>Add City</a> 
		<div class="row mt-4">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" id="table-1">
								<thead>
									<tr>
									<th class="sorting sorting_asc">No</th>
									<th class="sorting">City</th>
                                    <th class="sorting">State</th>
                                    <th class="sorting">Country</th>
									<th class="sorting">Status</th>
									<th class="sorting">Action</th>
									</tr>
								</thead>
								<tbody> 
									@forelse ($cities as $cities)
									<tr class="odd">
										<td>{{$cities-> id}}</td>
                                        <td>{{$cities-> city_name}}</td>
										<td>{{$cities-> state_name}}</td>
                                        <td>{{$cities-> country_name}}</td>
										<td>
											@if($cities->status==1)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$cities->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
											</div>
											@elseif($cities->status==2)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$cities->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
											</div>
											@else
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$cities->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
											</div>
											@endif
										</td>
										<td class="text-right py-0 align-middle">
											<div class="btn-group btn-group-sm">
												<button type="button" value="{{$cities->id}}" class="btn btn-primary" id="editcities" ><i class="fas fa-edit" ></i> </button>&nbsp;
												<button type="button" value="{{$cities->id}}" class="btn btn-danger" id="citiesDbtn" ><i class="fas fa-trash"></i> </button>
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

<!-- Add City Modal -->
<div id="add_cities" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add City</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('city.store')}}" method="post" enctype="multipart/form-data">
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

                        <script>
                            $('#txtCountry').change(function(){                            

                                $.ajax({
                                type:'GET',
                                url:"for-state-cat",
                                data: {id:$(this).val(),},
                                success:function(response){
                                $('#txtState').html(response);
                                }
                                });

                            })
                        </script>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">State:&nbsp;</label>
                                <select id="txtState" class="form-control" name="txtState" required>
									<option selected><-----Select State----></option>
									@foreach ($state as $states)
									<option value="{{ $states->id }}">{{ $states->state_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">City Name:&nbsp;</label>
                                <input type="text" class="form-control" id="txtCityName" name="txtCityName"required>
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
<!-- /Add City Modal -->

<!-- Edit City Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit City</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('city-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
                        <div class="col-sm-12">
							<div class="input-group mb-4">
                                <input type="hidden" value="" id="cmbCityId" name="cmbCityId" >
								<label class="col-form-label">Country:&nbsp;</label>
                                <select id="eCountry" class="form-control" name="txtCountry" required>
									<option selected><-----Select Country----></option>
									@foreach ($country as $countries)
									<option value="{{ $countries->id }}">{{ $countries->country_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

                        <script>
                            $('#eCountry').change(function(){                            

                                $.ajax({
                                type:'GET',
                                url:"for-state-cat",
                                data: {id:$(this).val(),},
                                success:function(response){
                                $('#eState').html(response);
                                }
                                });

                            })
                        </script>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">State:&nbsp;</label>
                                <select id="eState" class="form-control" name="txtState" required>
									<option selected><-----Select Country----></option>
									@foreach ($state as $states)
									<option value="{{ $states->id }}">{{ $states->state_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">City Name:&nbsp;</label>
								<input type="text" class="form-control" id="eCityName" name="txtCityName" required>
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
<!-- /Edit City Modal -->
<!-- Delete City Modal -->
<div class="modal custom-modal fade" id="delete_cities" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete City</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-cities')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_citiesId" name="d_cities">
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
<!-- /Delete City Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#citiesDbtn',function(){
            // alart("ok");
			var cities_id=$(this).val();
			$('#delete_cities').modal('show');
			$('#delete_citiesId').val(cities_id);
		});

		$(document).on('click','#editcities',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-city/"+eid,
				success:function(response){
					$('#cmbCityId').val(eid);
                    $('#eCountry').val(response.cities.country);
                    $('#eState').val(response.cities.state);		
					$('#eCityName').val(response.cities.city_name);
                    $('#eStatus').val(response.cities.status);
					
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