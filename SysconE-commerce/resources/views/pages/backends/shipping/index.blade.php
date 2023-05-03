@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<style>
	img {
  background-color: #fff;
}
</style>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Shipping</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Shipping</div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <a href="{{ route('shipping.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                    <th class="sorting">SN</th>
                                    <th class="sorting">Title</th>
                                    <th class="sorting">Fee</th>
                                    <th class="sorting">Status</th>
                                    <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($shipping as $shipping)
                                    <tr class="odd">
                                        <td>{{$shipping-> id}}</td>
                                        <td>{{$shipping-> shipping_title}}</td>
                                        <td>${{$shipping-> shipping_cost}}</td>
                                        <td>
                                            @if($shipping->shipping_status==1)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$shipping->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                                            </div>
                                            @elseif($shipping->shipping_status==2)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$shipping->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                                            </div>
                                            @else
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$shipping->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('shipping/'.$shipping->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit" ></i></a>&nbsp;
                                                <button type="button" value="{{$shipping->id}}" class="btn btn-danger" id="shippingDbtn" ><i class="fas fa-trash"></i> </button>
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
<!-- Delete Shipping Modal -->
<div class="modal custom-modal fade" id="delete_shipping" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Shipping</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-shipping')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_shippingId" name="d_shipping">
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
<!-- /Delete Return-Policy Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#shippingDbtn',function(){
            // alart("ok");
			var shipping_id=$(this).val();
			$('#delete_shipping').modal('show');
			$('#delete_shippingId').val(shipping_id);
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