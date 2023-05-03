@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection
@section('page')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Mega Menu Sub Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{url('/products')}}">Mega Menu</a></div>
                <div class="breadcrumb-item">Mega Menu Sub Category</div>
            </div>
        </div>

        <div class="section-body">
            <button onclick="history.go(-1)" class="btn btn-primary"><i class="fas fa-list"></i>&nbsp;Go Back</button>
            <a href="{{url('mega-menu-sub-category/create/'.$add_id)}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>

            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3>Category : {{$singlecategories->c_name}}</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="dataTable_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting">SN</th>
                                            <th class="sorting">Sub Category</th>
                                            <th class="sorting">Serial</th>
                                            <th class="sorting">Status</th>
                                            <th class="sorting">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody> 
                                        @forelse ($submegamenu as $submegamenu)
                                        <tr class="odd">
                                            <td>{{$submegamenu-> id}}</td>
                                            <td>{{$submegamenu-> sub_categoryname}}</td>
                                            <td>{{$submegamenu-> serial}}</td>
                                            <td> 
                                                <input data-id="{{$submegamenu->id}}" id="toggle-class" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $submegamenu->status ? 'checked' : '' }}>
                                            </td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url('mega-menu-sub-category/'.$submegamenu->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit" ></i></a>&nbsp; 
                                                    <!-- <button type="button" value="{{$submegamenu->id}}" class="btn btn-primary" id="editsubmegamenu" ><i class="fas fa-edit" ></i> </button>&nbsp; -->
                                                    <button type="button" value="{{$submegamenu->id}}" class="btn btn-danger" id="submegamenuDbtn" ><i class="fas fa-trash"></i> </button>
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
<!-- Delete Sub-Mega-Menu Modal -->
<div class="modal custom-modal fade" id="delete_submegamenu" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Item Delete Confirmation</h3>
					<p>Are You sure delete this item ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-mega-menu-sub-category')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_submegamenuId" name="d_submegamenu">
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
<!-- /Delete Sub-Mega-Menu Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#submegamenuDbtn',function(){
            // alart("ok");
			var submegamenu_id=$(this).val();
			$('#delete_submegamenu').modal('show');
			$('#delete_submegamenuId').val(submegamenu_id);
		});
    
	});
	$(document).ready(function () {
    $('#dataTable').DataTable();
});

</script>

@endsection
@endsection
