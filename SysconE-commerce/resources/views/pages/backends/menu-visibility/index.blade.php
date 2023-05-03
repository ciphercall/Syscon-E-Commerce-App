@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Menu Visibility</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Menu Visibility</div>
            </div>
        </div>

        <div class="section-body">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_menuvisibility"><i class="fa fa-plus"></i>Add Menu</a> 
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Menu</th>
                                    <th>Slug</th>
                                    <th>Visibility</th>
                                    <th>Action</th>
                                </thead>
                                <tbody> 
                                    @forelse ($menuvisibility as $menuvisibility)
                                    <tr class="odd">
                                        <td>{{$menuvisibility-> menu_name}}</td>
                                        <td>{{$menuvisibility-> slug}}</td>
                                        <td>
                                            @if($menuvisibility->visibility_status==1)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$menuvisibility->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                                            </div>
                                            @elseif($menuvisibility->visibility_status==2)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$menuvisibility->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                                            </div>
                                            @endif
                                        </td> 
                                        <td class="text-right py-0 align-middle">
											<div class="btn-group btn-group-sm">
												<button type="button" value="{{$menuvisibility->id}}" class="btn btn-primary" id="editmenuvisibility" ><i class="fas fa-edit" ></i> </button>&nbsp;
												<button type="button" value="{{$menuvisibility->id}}" class="btn btn-danger" id="menuvisibilityDbtn" ><i class="fas fa-trash"></i> </button>
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
    </section>
</div>
<!-- Add Menu-Visibility Modal -->
<div id="add_menuvisibility" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Add Menu</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('menu-visibility.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Menu:&nbsp;</label>
                                <input type="text" class="form-control" id="txtMenuName" name="txtMenuName"required>
                            </div>
                        </div>	

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Slug:&nbsp;</label>
                                <input type="text" class="form-control" id="txtSlug" name="txtSlug"required>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Serial No:&nbsp;</label>
                                <input type="text" class="form-control" id="txtSerialNo" name="txtSerialNo"required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Status:&nbsp;</label>
                                <select id="txtVisibilityStatus" class="form-control" name="txtVisibilityStatus" required>
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
<!-- /Add Menu-Visibility Modal -->
<!-- Edit Menu-Visibility Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('menu-visibility-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbMenuvisibilityId" name="cmbMenuvisibilityId" >
								<label class="col-form-label">Menu:&nbsp;</label>
								<input type="text" class="form-control" id="eMenuName" name="txtMenuName">
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
								<label class="col-form-label">Serial No:&nbsp;</label>
								<input type="text" class="form-control" id="eSerialNo" name="txtSerialNo">
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Status:&nbsp;</label>
                                <select id="eVisibilityStatus" class="form-control" name="txtVisibilityStatus" required>
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
<!-- /Edit Menu-Visibility Modal -->

<!-- Delete Menu-Visibility Modal -->
<div class="modal custom-modal fade" id="delete_menuvisibility" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Menu</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-menu-visibility')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_menuvisibilityId" name="d_menuvisibility">
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
<!-- /Delete Menu-Visibility Modal -->
<script>
	$(document).ready(function(){

        $(document).on('click','#menuvisibilityDbtn',function(){
            // alart("ok");
			var menuvisibility_id=$(this).val();
			$('#delete_menuvisibility').modal('show');
			$('#delete_menuvisibilityId').val(menuvisibility_id);
		});

		$(document).on('click','#editmenuvisibility',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-menu-visibility/"+eid,
				success:function(response){
					$('#cmbMenuvisibilityId').val(eid);		
					$('#eMenuName').val(response.menuvisibility.menu_name);
                    $('#eSlug').val(response.menuvisibility.slug);
                    $('#eSerialNo').val(response.menuvisibility.serial_no);
                    $('#eVisibilityStatus').val(response.menuvisibility.visibility_status);
					
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
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection