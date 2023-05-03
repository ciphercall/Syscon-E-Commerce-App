@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Declined Orders</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Declined Orders</div>
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
                                    @forelse ($declinedorder as $declinedorder)
                                    <tr class="odd">
                                        <td>{{$declinedorder-> id}}</td>
                                        <td>{{$declinedorder-> customer_name}}</td>
                                        <td>{{$declinedorder-> order_id}}</td>
                                        <td>{{$declinedorder-> date}}</td>
                                        <td>{{$declinedorder-> quantity}}</td>
                                        <td>${{$declinedorder-> amount}}</td>
                                        <td>
                                            @if($declinedorder->status==1)
                                            <div>
                                              <span class="badge badge-success">{{$declinedorder->order_status}}</span>
                                            </div>
                                            @elseif($declinedorder->status==2)
                                            <div>
                                              <span class="badge badge-danger">{{$declinedorder->order_status}}</span>
                                            </div>
                                            @else($declinedorder->status==3)
											<div>
                                                <span class="badge badge-success">{{$declinedorder->order_status}}</span>
											</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($declinedorder->payment==1)
                                            <div>
                                              <span class="badge badge-success">{{$declinedorder->payment_status}}</span>
                                            </div>
                                            @else($declinedorder->payment==2)
                                            <div>
                                              <span class="badge badge-danger">{{$declinedorder->payment_status}}</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('declined-order/'.$declinedorder->id.'/show')}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;
                                                <button type="button" value="{{$declinedorder->id}}" class="btn btn-danger" id="declinedorderDbtn" ><i class="fas fa-trash"></i> </button>&nbsp;
                                                <button type="button" value="{{$declinedorder->id}}" class="btn btn-warning" id="editdeclinedorder" ><i class="fas fa-truck" ></i> </button>
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
<!-- Edit Declined-Order Modal -->
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
				<form action="{{url('declined-order-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
				
					<div class="row">
                        <div class="col-sm-12">
							<div class="input-group mb-4">
                                <input type="hidden" value="" id="cmbDeclinedorderId" name="cmbDeclinedorderId" >
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
<!-- /Edit Declined-Order Modal -->
<!-- Delete Declined-Order Modal -->
<div class="modal custom-modal fade" id="delete_declinedorder" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Declined Orders</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-declined-order')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_declinedorderId" name="d_declinedorder">
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
<!-- /Delete Declined-Order Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#declinedorderDbtn',function(){
            // alart("ok");
			var declinedorder_id=$(this).val();
			$('#delete_declinedorder').modal('show');
			$('#delete_declinedorderId').val(declinedorder_id);
		});

		$(document).on('click','#editdeclinedorder',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-declined-order/"+eid,
				success:function(response){
					$('#cmbDeclinedorderId').val(eid);		
					$('#ePayment').val(response.declinedorder.payment);
                    $('#eStatus').val(response.declinedorder.status);
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