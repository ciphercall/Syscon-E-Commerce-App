@extends('layout.seller.master')
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
                <div class="breadcrumb-item active"><a href="{{url('/seller-dashboard')}}">Dashboard</a></div>
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
                                    @forelse ($progresssellerorder as $progresssellerorder)
                                    <tr class="odd">
                                        <td>{{$progresssellerorder-> id}}</td>
                                        <td>{{$progresssellerorder-> customer_name}}</td>
                                        <td>{{$progresssellerorder-> sellerorder_id}}</td>
                                        <td>{{$progresssellerorder-> date}}</td>
                                        <td>{{$progresssellerorder-> quantity}}</td>
                                        <td>${{$progresssellerorder-> amount}}</td>
                                        <td>
                                            @if($progresssellerorder->status==1)
                                            <div>
                                              <span class="badge badge-success">{{$progresssellerorder->order_status}}</span>
                                            </div>
                                            @elseif($progresssellerorder->status==2)
                                            <div>
                                              <span class="badge badge-danger">{{$progresssellerorder->order_status}}</span>
                                            </div>
                                            @else($progresssellerorder->status==3)
											<div>
                                                <span class="badge badge-success">{{$progresssellerorder->order_status}}</span>
											</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($progresssellerorder->payment==1)
                                            <div>
                                              <span class="badge badge-success">{{$progresssellerorder->payment_status}}</span>
                                            </div>
                                            @else($progresssellerorder->payment==2)
                                            <div>
                                              <span class="badge badge-danger">{{$progresssellerorder->payment_status}}</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('/seller/progress-order',$progresssellerorder->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;
                                                <!-- <a href="{{url('seller/all-order/'.$progresssellerorder->id.'/show')}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp; -->
                                                <!-- <button type="button" value="{{$progresssellerorder->id}}" class="btn btn-danger" id="progresssellerorderDbtn" ><i class="fas fa-trash"></i> </button>&nbsp; -->
                                                <!-- <button type="button" value="{{$progresssellerorder->id}}" class="btn btn-warning" id="editprogresssellerorder" ><i class="fas fa-truck" ></i> </button> -->
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
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>

$("#table-1").dataTable({
	"columnDefs": [
		{ "sortable": false, "targets": [2,3] }
	]
});
</script>
@endsection
@endsection