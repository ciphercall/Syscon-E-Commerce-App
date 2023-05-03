@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection
@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Second Column Link</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Second Column Link</div>
            </div>
        </div>

        <div class="section-body">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_secondcolumn"><i class="fa fa-plus"></i>Add New</a> 
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="dataTable_info">
                                    <thead>
                                        <tr>
                                        <th class="sorting sorting_asc">SN</th>
                                        <th class="sorting">Column Title</th>
                                        <th class="sorting">Name</th>
                                        <th class="sorting">Link</th>
                                        <th class="sorting">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @forelse ($secondcolumn as $secondcolumn)
                                        <tr class="odd">
                                            <td>{{$secondcolumn-> id}}</td>
                                            <td>{{$secondcolumn-> column_name}}</td>
                                            <td>{{$secondcolumn-> link_name}}</td>
                                            <td>{{$secondcolumn-> link}}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" value="{{$secondcolumn->id}}" class="btn btn-primary" id="editsecondcolumn" ><i class="fas fa-edit" ></i> </button>&nbsp;
                                                    <button type="button" value="{{$secondcolumn->id}}" class="btn btn-danger" id="secondcolumnDbtn" ><i class="fas fa-trash"></i> </button>
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
    </section>
</div>
<!-- Add Second-Column-Link Modal -->
<div id="add_secondcolumn" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Create Second Column Link</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('second-column-link.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Column Title:&nbsp;</label>
                                <select id="txtColumnTitle" class="form-control" name="txtColumnTitle" required>
									<option selected><-----Column Title----></option>
									@foreach ($columnlist as $list)
									<option value="{{ $list->id }}">{{ $list->column_name }}</option>
									@endforeach
								</select>
                            </div>
                        </div>	

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Link Name:&nbsp;</label>
                                <input type="text" class="form-control" id="txtLinkName" name="txtLinkName"required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Link:&nbsp;</label>
                                <input type="text" class="form-control custom-icon-picker iconpicker-element iconpicker-input" name="txtLink">
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
<!-- /Add Second-Column-Link Modal -->
<!-- Edit Second-Column-Link Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Second Column Link</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('second-column-link-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbSecondcolumnId" name="cmbSecondcolumnId" >
								<label class="col-form-label">Column Title:&nbsp;</label>
								<!-- <input type="text" class="form-control" id="eColumnTitle" name="txtColumnTitle" required> -->
                                <select id="eColumnTitle" class="form-control" name="txtColumnTitle" required>
									<option selected><-----Column Title----></option>
									@foreach ($columnlist as $list)
									<option value="{{ $list->id }}">{{ $list->column_name }}</option>
									@endforeach
								</select>
							</div>
						</div>	

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Link Name:&nbsp;</label>
								<input type="text" class="form-control" id="eLinkName" name="txtLinkName" required>
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Link:&nbsp;</label>
								<input type="text" class="form-control" id="eLink" name="txtLink" required>
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
<!-- /Edit Second-Column-Link Modal -->
<!-- Delete Second-Column-Link Modal -->
<div class="modal custom-modal fade" id="delete_secondcolumn" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Second Column Link</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-second-column-link')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_secondcolumnId" name="d_secondcolumn">
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
<!-- /Delete Second-Column-Link Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#secondcolumnDbtn',function(){
            // alart("ok");
			var secondcolumn_id=$(this).val();
			$('#delete_secondcolumn').modal('show');
			$('#delete_secondcolumnId').val(secondcolumn_id);
		});

		$(document).on('click','#editsecondcolumn',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-second-column-link/"+eid,
				success:function(response){
					$('#cmbSecondcolumnId').val(eid);		
					$('#eColumnTitle').val(response.secondcolumn.column_title);
                    $('#eLinkName').val(response.secondcolumn.link_name);
                    $('#eLink').val(response.secondcolumn.link);
					
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