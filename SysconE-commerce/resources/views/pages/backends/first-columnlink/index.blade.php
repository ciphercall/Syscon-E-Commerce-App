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
            <h1>First Column Link</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">First Column Link</div>
            </div>
        </div>

        <div class="section-body">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_firstcolumn"><i class="fa fa-plus"></i>Add New</a> 
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
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
                                        @forelse ($firstcolumn as $firstcolumn)
                                        <tr class="odd">
                                            <td>{{$firstcolumn-> id}}</td>
                                            <td>{{$firstcolumn-> column_name}}</td>
                                            <td>{{$firstcolumn-> link_name}}</td>
                                            <td>{{$firstcolumn-> link}}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" value="{{$firstcolumn->id}}" class="btn btn-primary" id="editfirstcolumn" ><i class="fas fa-edit" ></i> </button>&nbsp;
                                                    <button type="button" value="{{$firstcolumn->id}}" class="btn btn-danger" id="firstcolumnDbtn" ><i class="fas fa-trash"></i> </button>
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
<!-- Add First-Column-Link Modal -->
<div id="add_firstcolumn" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Create First Column Link</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('first-column-link.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Column Title:&nbsp;</label>
                                <!-- <input type="text" class="form-control" id="txtColumnTitle" name="txtColumnTitle"required> -->
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
<!-- /Add First-Column-Link Modal -->
<!-- Edit First-Column-Link Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit First Column Link</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('first-column-link-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
						<div class="col-sm-12">
							<div class="input-group mb-4">
								<input type="hidden" value="" id="cmbFirstcolumnId" name="cmbFirstcolumnId" >
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
<!-- /Edit First-Column-Link Modal -->
<!-- Delete First-Column-Link Modal -->
<div class="modal custom-modal fade" id="delete_firstcolumn" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete First Column Link</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-first-column-link')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_firstcolumnId" name="d_firstcolumn">
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
<!-- /Delete First-Column-Link Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#firstcolumnDbtn',function(){
            // alart("ok");
			var firstcolumn_id=$(this).val();
			$('#delete_firstcolumn').modal('show');
			$('#delete_firstcolumnId').val(firstcolumn_id);
		});

		$(document).on('click','#editfirstcolumn',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-first-column-link/"+eid,
				success:function(response){
					$('#cmbFirstcolumnId').val(eid);		
					$('#eColumnTitle').val(response.firstcolumn.column_title);
                    $('#eLinkName').val(response.firstcolumn.link_name);
                    $('#eLink').val(response.firstcolumn.link);
					
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