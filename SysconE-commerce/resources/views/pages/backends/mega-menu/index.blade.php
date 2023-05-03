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
            <h1>Mega Menu Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Mega Menu Category</div>
            </div>
        </div>
    </section>
    <div class="section-body">
        <a href="{{ route('mega-menu-category.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive table-invoice">
                            <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="dataTable_info">
                                <thead>
                                    <tr>
                                    <th class="sorting">SN</th>
                                    <th class="sorting">Name</th>
                                    <th class="sorting">Serial</th>
                                    <th class="sorting">Status</th>
                                    <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($megamenu as $megamenu)
                                    <tr class="odd">
                                        <td>{{$megamenu-> id}}</td>
                                        <td>{{$megamenu-> c_name}}</td>
                                        <td>{{$megamenu-> serial}}</td>
                                        <td>
                                            @if($megamenu->status==1)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$megamenu->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                                            </div>
                                            @elseif($megamenu->status==2)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$megamenu->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                                            </div>
                                            @else
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$megamenu->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('mega-menu-category/'.$megamenu->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit" ></i></a>&nbsp;  
                                                <a href="{{url('mega-menu-sub-category/list/'.$megamenu->id)}}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></a>&nbsp;
                                                <button type="button" value="{{$megamenu->id}}" class="btn btn-danger" id="megamenuDbtn" ><i class="fas fa-trash"></i> </button>
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
<!-- Delete Mega-Menu Modal -->
<div class="modal custom-modal fade" id="delete_megamenu" role="dialog">
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
							<form action="{{url('delete-mega-menu-category')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_megamenuId" name="d_megamenu">
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
<!-- /Delete Mega-Menu Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#megamenuDbtn',function(){
            // alart("ok");
			var megamenu_id=$(this).val();
			$('#delete_megamenu').modal('show');
			$('#delete_megamenuId').val(megamenu_id);
		});
    
	});
	$(document).ready(function () {
    $('#dataTable').DataTable();
});

</script>
@endsection
@endsection