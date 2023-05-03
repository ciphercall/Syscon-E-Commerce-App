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
            <h1>Declined Orders</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/seller-dashboard')}}">Dashboard</a></div>
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
                                    @forelse ($declinedsellerorder as $declinedsellerorder)
                                    <tr class="odd">
                                        <td>{{$declinedsellerorder-> id}}</td>
                                        <td>{{$declinedsellerorder-> customer_name}}</td>
                                        <td>{{$declinedsellerorder-> sellerorder_id}}</td>
                                        <td>{{$declinedsellerorder-> date}}</td>
                                        <td>{{$declinedsellerorder-> quantity}}</td>
                                        <td>${{$declinedsellerorder-> amount}}</td>
                                        <td>
                                            @if($declinedsellerorder->status==1)
                                            <div>
                                              <span class="badge badge-success">{{$declinedsellerorder->order_status}}</span>
                                            </div>
                                            @elseif($declinedsellerorder->status==2)
                                            <div>
                                              <span class="badge badge-danger">{{$declinedsellerorder->order_status}}</span>
                                            </div>
                                            @else($declinedsellerorder->status==3)
											<div>
                                                <span class="badge badge-success">{{$declinedsellerorder->order_status}}</span>
											</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($declinedsellerorder->payment==1)
                                            <div>
                                              <span class="badge badge-success">{{$declinedsellerorder->payment_status}}</span>
                                            </div>
                                            @else($declinedsellerorder->payment==2)
                                            <div>
                                              <span class="badge badge-danger">{{$declinedsellerorder->payment_status}}</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('/seller/declined-order',$declinedsellerorder->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;
                                                <!-- <a href="{{url('seller/all-order/'.$declinedsellerorder->id.'/show')}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp; -->
                                                <!-- <button type="button" value="{{$declinedsellerorder->id}}" class="btn btn-danger" id="declinedsellerorderDbtn" ><i class="fas fa-trash"></i> </button>&nbsp; -->
                                                <!-- <button type="button" value="{{$declinedsellerorder->id}}" class="btn btn-warning" id="editdeclinedsellerorder" ><i class="fas fa-truck" ></i> </button> -->
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