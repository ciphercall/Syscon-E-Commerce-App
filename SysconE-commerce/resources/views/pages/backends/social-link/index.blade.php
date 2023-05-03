@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/css/fontawesome-iconpicker.min.css')}}">
@endsection

@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Social Link</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Social Link</div>
            </div>
		</div>
    </section>

    <div class="section-body">
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_sociallink"><i class="fa fa-plus"></i>Add New</a> 
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
                                    <th class="sorting">Link</th>
                                    <th class="sorting">Icon</th>
                                    <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($sociallink as $sociallink)
                                    <tr class="odd">
                                        <td>{{$sociallink-> id}}</td>
                                        <td>{{$sociallink-> column_name}}</td>
                                        <td>{{$sociallink-> social_link}}</td>
                                        <td> <i class="{{$sociallink-> social_icon}}"></i></td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" value="{{$sociallink->id}}" class="btn btn-primary" id="editsociallink" ><i class="fas fa-edit" ></i> </button>&nbsp;
                                                <button type="button" value="{{$sociallink->id}}" class="btn btn-danger" id="sociallinkDbtn" ><i class="fas fa-trash"></i> </button>
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
</div>

<!-- Add Social Link Modal -->
<div id="add_sociallink" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit">Create Social Link</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- add member--}}
            <div class="modal-body">
                <form action="{{route('social-link.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Column Title:&nbsp;</label>
                                <!-- <input type="text" class="form-control" id="txtSocialLink" name="txtSocialLink"required> -->
                                <select id="txtColumnTitle" class="form-control" name="txtColumnTitle" required>
									<option selected><-----Choose Title----></option>
									@foreach ($columnlist as $list)
									<option value="{{ $list->id }}">{{ $list->column_name }}</option>
									@endforeach
								</select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Link:&nbsp;</label>
                                <input type="text" class="form-control" id="txtSocialLink" name="txtSocialLink"required>
                            </div>
                        </div>	

                        <div class="col-sm-12">
                            <div class="input-group mb-5">
                                <label class="col-form-label">Icon:&nbsp;</label>
                                <input type="text" class="form-control custom-icon-picker iconpicker-element iconpicker-input" name="txtSocialIcon">
                                <!-- <input type="text" class="form-control custom-icon-picker" id="txtSocialIcon" name="txtSocialIcon"required> -->
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
<!-- /Add Social Link Modal -->

<!-- Edit Social Link Modal -->
<div id="editModal" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Social Link</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('social-link-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
                        <div class="col-sm-12">
							<div class="input-group mb-4">
                                <input type="hidden" value="" id="cmbSociallinkId" name="cmbSociallinkId" >
								<label class="col-form-label">Column Title:&nbsp;</label>
								<!-- <input type="text" class="form-control" id="eColumnTitle" name="txtColumnTitle" required> -->
                                <select id="eColumnTitle" class="form-control" name="txtColumnTitle" required>
									<option selected><-----Choose Title----></option>
									@foreach ($columnlist as $list)
									<option value="{{ $list->id }}">{{ $list->column_name }}</option>
									@endforeach
								</select>
							</div>

							<div class="input-group mb-4">
								<label class="col-form-label">Link:&nbsp;</label>
								<input type="text" class="form-control" id="eSociallink" name="txtSocialLink" required>
							</div>

                            <div class="input-group mb-4">
								<label class="col-form-label">Icon:&nbsp;</label>
								<input type="text" class="form-control" id="eSocialIcon" name="txtSocialIcon" required>
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
<!-- /Edit Social Link Modal -->
<!-- Delete Social Link Modal -->
<div class="modal custom-modal fade" id="delete_sociallink" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Social Link</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-social-link')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_sociallinkId" name="d_sociallink">
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
<!-- /Delete Social Link Modal -->
<script>
	$(document).ready(function(){

        $(document).on('click','#sociallinkDbtn',function(){
            // alart("ok");
			var sociallink_id=$(this).val();
			$('#delete_sociallink').modal('show');
			$('#delete_sociallinkId').val(sociallink_id);
		});

		$(document).on('click','#editsociallink',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-social-link/"+eid,
				success:function(response){
					$('#cmbSociallinkId').val(eid);	
                    $('#eColumnTitle').val(response.sociallink.column_title);	
					$('#eSociallink').val(response.sociallink.social_link);
                    $('#eSocialIcon').val(response.sociallink.social_icon);
					
				}
			});
		});
    
	});
	$(document).ready(function () {
    $('#dataTable').DataTable();

    $('.custom-icon-picker').iconpicker({
        templates: {
            popover: '<div class="iconpicker-popover popover"><div class="arrow"></div>' +
                '<div class="popover-title"></div><div class="popover-content"></div></div>',
            footer: '<div class="popover-footer"></div>',
            buttons: '<button class="iconpicker-btn iconpicker-btn-cancel btn btn-default btn-sm">Cancel</button>' +
                ' <button class="iconpicker-btn iconpicker-btn-accept btn btn-primary btn-sm">Accept</button>',
            search: '<input type="search" class="form-control iconpicker-search" placeholder="Type to filter" />',
            iconpicker: '<div class="iconpicker"><div class="iconpicker-items"></div></div>',
            iconpickerItem: '<a role="button" href="javascript:;" class="iconpicker-item"><i></i></a>'
        }
    })
});

</script>
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/js/fontawesome-iconpicker.min.js')}}"></script>
@endsection
@endsection