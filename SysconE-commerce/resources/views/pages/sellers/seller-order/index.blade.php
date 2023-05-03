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
            <h1>All Orders</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/seller-dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">All Orders</div>
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
                                    @forelse ($sellerorder as $sellerorder)
                                    <tr class="odd">
                                        <td>{{$sellerorder-> id}}</td>
                                        <td>{{$sellerorder-> customer_name}}</td>
                                        <td>{{$sellerorder-> sellerorder_id}}</td>
                                        <td>{{$sellerorder-> date}}</td>
                                        <td>{{$sellerorder-> quantity}}</td>
                                        <td>${{$sellerorder-> amount}}</td>
                                        <td>
                                            @if($sellerorder->status==1)
                                            <div>
                                              <span class="badge badge-success">{{$sellerorder->order_status}}</span>
                                            </div>
                                            @elseif($sellerorder->status==2)
                                            <div>
                                              <span class="badge badge-danger">{{$sellerorder->order_status}}</span>
                                            </div>
                                            @else($sellerorder->status==3)
											<div>
                                                <span class="badge badge-success">{{$sellerorder->order_status}}</span>
											</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($sellerorder->payment==1)
                                            <div>
                                              <span class="badge badge-success">{{$sellerorder->payment_status}}</span>
                                            </div>
                                            @else($sellerorder->payment==2)
                                            <div>
                                              <span class="badge badge-danger">{{$sellerorder->payment_status}}</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('/seller/all-order',$sellerorder->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp;
                                                <!-- <a href="{{url('seller/all-order/'.$sellerorder->id.'/show')}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>&nbsp; -->
                                                <!-- <button type="button" value="{{$sellerorder->id}}" class="btn btn-danger" id="sellerorderDbtn" ><i class="fas fa-trash"></i> </button>&nbsp; -->
                                                <!-- <button type="button" value="{{$sellerorder->id}}" class="btn btn-warning" id="editsellerorder" ><i class="fas fa-truck" ></i> </button> -->
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