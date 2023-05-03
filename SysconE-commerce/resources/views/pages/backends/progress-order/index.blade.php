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
            <h1>Progress Orders</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Progress Orders</div>
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
                                    <th class="sorting">Customer</th>
                                    <th class="sorting">Order Id </th>
                                    <th class="sorting">Date</th>
                                    <th class="sorting">Quantity</th>
                                    <th class="sorting">Amount</th>
                                    <th class="sorting">Order Status</th>
                                    <th class="sorting">Payment</th>
                                    <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($progressorder as $progressorder)
                                    <tr class="odd">
                                        <td>{{$progressorder-> id}}</td>
                                        <td>{{$progressorder-> customer_name}}</td>
                                        <td>{{$progressorder-> order_id}}</td>
                                        <td>{{$progressorder-> date}}</td>
                                        <td>{{$progressorder-> quantity}}</td>
                                        <td>${{$progressorder-> amount}}</td>
                                        <td>
                                            @if($progressorder->status==1)
                                            <div>
                                              <span class="badge badge-success">{{$progressorder->order_status}}</span>
                                            </div>
                                            @elseif($progressorder->status==2)
                                            <div>
                                              <span class="badge badge-danger">{{$progressorder->order_status}}</span>
                                            </div>
                                            @else($progressorder->status==3)
											<div>
                                                <span class="badge badge-success">{{$progressorder->order_status}}</span>
											</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($progressorder->payment==1)
                                            <div>
                                              <span class="badge badge-success">{{$progressorder->payment_status}}</span>
                                            </div>
                                            @else($progressorder->payment==2)
                                            <div>
                                              <span class="badge badge-danger">{{$progressorder->payment_status}}</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('progress-order/'.$progressorder->id.'/show')}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;
                                                <button type="button" value="{{$progressorder->id}}" class="btn btn-danger" id="progressorderDbtn" ><i class="fas fa-trash"></i> </button>&nbsp;
                                                <button type="button" value="{{$progressorder->id}}" class="btn btn-warning" id="editprogressorder" ><i class="fas fa-truck" ></i> </button>
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
<!-- Edit Progress-Order Modal -->
<div id="editModal" class="modal fade" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Order Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{url('progress-order-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
                        <div class="col-sm-12">
							<div class="input-group mb-4">
                                <input type="hidden" value="" id="cmbProgressorderId" name="cmbProgressorderId" >
								<label class="col-form-label">Payment:&nbsp;</label>
                                <select id="ePayment" class="form-control" name="txtPayment">
									<option selected><-----Select Country----></option>
									@foreach ($paymentstatus as $val)
									<option value="{{ $val->id }}">{{ $val->payment_status }}</option>
									@endforeach
								</select>
							</div>
						</div>

                        <div class="col-sm-12">
							<div class="input-group mb-4">
								<label class="col-form-label">Order:&nbsp;</label>
                                <select id="eStatus" class="form-control" name="txtStatus">
									<option selected><-----Select Country----></option>
									@foreach ($orderstatus as $val)
									<option value="{{ $val->id }}">{{ $val->order_status }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Progress-Order Modal -->
<!-- Delete Progress-Order Modal -->
<div class="modal custom-modal fade" id="delete_progressorder" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Progress Orders</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-progress-order')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_progressorderId" name="d_progressorder">
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
<!-- /Delete Progress-Order Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#progressorderDbtn',function(){
            // alart("ok");
			var progressorder_id=$(this).val();
			$('#delete_progressorder').modal('show');
			$('#delete_progressorderId').val(progressorder_id);
		});

		$(document).on('click','#editprogressorder',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-progress-order/"+eid,
				success:function(response){
					$('#cmbProgressorderId').val(eid);		
					$('#ePayment').val(response.progressorder.payment);
                    $('#eStatus').val(response.progressorder.status);
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