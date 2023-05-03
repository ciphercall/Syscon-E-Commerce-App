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
            <h1>Pending Seller withdraw</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Pending Seller withdraw</div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                    <th class="sorting">SN</th>
                                    <th class="sorting">Seller</th>
                                    <th class="sorting">Method </th>
                                    <th class="sorting">Charge</th>
                                    <th class="sorting">Total Amount</th>
                                    <th class="sorting">Withdraw Amount</th>
                                    <th class="sorting">Status</th>
                                    <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($pendingseller as $pendingseller)
                                    <tr class="odd">
                                        <td>{{$pendingseller-> id}}</td>
                                        <td>{{$pendingseller-> Pseller_name}}</td>
                                        <td>{{$pendingseller-> Pseller_b_method}}</td>
                                        <td>${{$pendingseller-> Pseller_charge}}</td>
                                        <td>${{$pendingseller-> Pseller_t_ammount}}</td>
                                        <td>${{$pendingseller-> Pseller_w_ammount}}</td>
                                        <td>
                                            @if($pendingseller->Pseller_status==1)
                                            <div>
                                              <span class="badge badge-success">{{$pendingseller->seller_status}}</span>
                                            </div>
                                            @else($pendingseller->Pseller_status==2)
                                            <div>
                                              <span class="badge badge-danger">{{$pendingseller->seller_status}}</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('/pending-seller-withdraw',$pendingseller->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;
                                                <button type="button" value="{{$pendingseller->id}}" class="btn btn-danger" id="pendingsellerDbtn" ><i class="fas fa-trash"></i> </button>
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
<!-- Delete Pending-Seller-Withdraw Modal -->
<div class="modal custom-modal fade" id="delete_pendingseller" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Pending Seller Withdraw</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-pending-seller-withdraw')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_pendingsellerId" name="d_pendingseller">
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
<!-- /Delete Pending-Seller-Withdraw Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#pendingsellerDbtn',function(){
            // alart("ok");
			var pendingseller_id=$(this).val();
			$('#delete_pendingseller').modal('show');
			$('#delete_pendingsellerId').val(pendingseller_id);
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