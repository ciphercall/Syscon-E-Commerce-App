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
			<h1>Coupon</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Coupon</div>
            </div>
		</div>
    </section>

	<div class="section-body">
		<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_coupon"><i class="fa fa-plus"></i>Add New</a> 
		<div class="row mt-4">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                            <table class="table table-striped" id="table-1">
								<thead>
									<tr>
										<th class="sorting sorting_asc">SN</th>
										<th class="sorting">Name</th>
										<th class="sorting">Code</th>
										<th class="sorting">Discount</th>
                                        <th class="sorting">Number Of Times</th>
                                        <th class="sorting">Expired Date</th>
										<th class="sorting">Status</th>
										<th class="sorting">Action</th>
									</tr>
								</thead>
								<tbody> 
									@forelse ($coupon as $coupon)
									<tr class="odd">
										<td>{{$coupon-> id}}</td>
										<td>{{$coupon-> coupon_name}}</td>
										<td>{{$coupon-> coupon_code}}</td>
                                        <td>
                                            @if($coupon->discount_type==1)
                                            <div>
                                                <span>{{$coupon->coupon_discount}}%</span>
                                            </div>
                                            @else($coupon->discount_type==2)
                                            <div>
                                                <span>${{$coupon->coupon_discount}}</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td>{{$coupon-> coupon_number}}</td>
                                        <td>{{$coupon-> coupon_date}}</td>  
										<td>
											@if($coupon->coupon_status==1)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$coupon->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
											</div>
											@elseif($coupon->coupon_status==2)
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$coupon->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
											</div>
											@else
											<div>
												<input type="checkbox" checked data-toggle="toggle" data-on="{{$coupon->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
											</div>
											@endif
										</td>
										<td class="text-right py-0 align-middle">
											<div class="btn-group btn-group-sm">
												<button type="button" value="{{$coupon->id}}" class="btn btn-primary" id="editcoupon" ><i class="fas fa-edit" ></i> </button>&nbsp;
												<button type="button" value="{{$coupon->id}}" class="btn btn-danger" id="couponDbtn" ><i class="fas fa-trash"></i> </button>
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

<!-- Add Coupon Modal -->
<div class="modal fade" id="add_coupon" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('coupon.store')}}" method="POST">
                        @csrf                           
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" id="txtCouponName" class="form-control"  name="txtCouponName">
                            </div>

                            <div class="form-group col-12">
                                <label>Code <span class="text-danger">*</span></label>
                                <input type="text" id="txtCouponCode" class="form-control"  name="txtCouponCode">
                            </div>

                            <div class="form-group col-12">
                                <label>Number of times <span class="text-danger">*</span></label>
                                <input type="number" id="txtCouponNumber" class="form-control"  name="txtCouponNumber">
                            </div>

                            <div class="form-group col-12">
                                <label>Expired Date <span class="text-danger">*</span></label>
                                <input type="text" id="txtCouponDate" class="form-control datepicker"  name="txtCouponDate" autocomplete="off">
                            </div>

                            <div class="form-group col-12">
                                <label>Discount <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <select id="txtCouponDiscountType" class="form-control" name="txtCouponDiscountType" required>
                                            @foreach ($discount as $count)
                                            <option value="{{ $count->id }}">{{ $count->d_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="text" name="txtCouponDiscount" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Status <span class="text-danger">*</span></label>
                                <select id="txtStatus" class="form-control" name="txtStatus" required>
									<option selected><-----Select Status----></option>
									@foreach ($statuses as $status)
									<option value="{{ $status->id }}">{{ $status->s_name }}</option>
									@endforeach
								</select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Add Coupon Modal -->
<!-- Edit Coupon Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{url('coupon-update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')                       
                        <div class="row">
                            <div class="form-group col-12">
                                <input type="hidden" value="" id="cmbCouponId" name="cmbCouponId" >
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" id="eCouponName" class="form-control"  name="txtCouponName">
                            </div>

                            <div class="form-group col-12">
                                <label>Code <span class="text-danger">*</span></label>
                                <input type="text" id="eCouponCode" class="form-control"  name="txtCouponCode">
                            </div>

                            <div class="form-group col-12">
                                <label>Number of times <span class="text-danger">*</span></label>
                                <input type="number" id="eCouponNumber" class="form-control"  name="txtCouponNumber">
                            </div>

                            <div class="form-group col-12">
                                <label>Expired Date <span class="text-danger">*</span></label>
                                <input type="text" id="eCouponDate" class="form-control datepicker"  name="txtCouponDate" autocomplete="off">
                            </div>

                            <div class="form-group col-12">
                                <label>Discount <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <select id="eCouponDiscountType" class="form-control" name="txtCouponDiscountType">
                                            @foreach ($discount as $count)
                                            <option value="{{ $count->id }}">{{ $count->d_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="text" name="txtCouponDiscount" id="eCouponDiscount" class="form-control" aria-label="Discount" aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Status <span class="text-danger">*</span></label>
                                <select id="eStatus" class="form-control" name="txtStatus" required>
									<option selected><-----Select Status----></option>
									@foreach ($statuses as $status)
									<option value="{{ $status->id }}">{{ $status->s_name }}</option>
									@endforeach
								</select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Coupon Modal -->
<!-- Delete Coupon Modal -->
<div class="modal custom-modal fade" id="delete_coupon" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Coupon</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-coupon')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_couponId" name="d_coupon">
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
<!-- /Delete Coupon Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>   
    $(document).ready(function () {

        $(document).on('click','#couponDbtn',function(){
            // alart("ok");
			var coupon_id=$(this).val();
			$('#delete_coupon').modal('show');
			$('#delete_couponId').val(coupon_id);
		});

		$(document).on('click','#editcoupon',function(){
			//  alert("ok");

			var eid=$(this).val();
			// alert(id);
			$('#editModal').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-coupon/"+eid,
				success:function(response){
					$('#cmbCouponId').val(eid);		
					$('#eCouponName').val(response.coupon.coupon_name);
                    $('#eCouponCode').val(response.coupon.coupon_code);
                    $('#eCouponNumber').val(response.coupon.coupon_number);
                    $('#eCouponDate').val(response.coupon.coupon_date);
                    $('#eCouponDiscount').val(response.coupon.coupon_discount);
                    $('#eCouponDiscountType').val(response.coupon.discount_type);
                    $('#eStatus').val(response.coupon.coupon_status);
					
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