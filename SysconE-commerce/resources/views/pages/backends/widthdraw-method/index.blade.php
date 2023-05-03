@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Widthdraw Method</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Widthdraw Method</div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <a href="{{ route('widthdraw-method.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New</a> 
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
                                    <th class="sorting">Minimum Amount </th>
                                    <th class="sorting">Maximum Amount</th>
                                    <th class="sorting">Charge</th>
                                    <th class="sorting">Status</th>
                                    <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($widthdraw as $widthdraw)
                                    <tr class="odd">
                                        <td>{{$widthdraw-> id}}</td>
                                        <td>{{$widthdraw-> w_name}}</td>
                                        <td>${{$widthdraw-> w_min_amount}}</td>
                                        <td>${{$widthdraw-> w_max_amount}}</td>
                                        <td>{{$widthdraw-> widthdraw_charge}}%</td>
                                        <td>
                                            @if($widthdraw->widthdraw_status==1)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$widthdraw->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                                            </div>
                                            @elseif($widthdraw->widthdraw_status==2)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$widthdraw->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                                            </div>
                                            @else
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$widthdraw->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('widthdraw-method/'.$widthdraw->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit" ></i></a>&nbsp;
                                                <button type="button" value="{{$widthdraw->id}}" class="btn btn-danger" id="widthdrawDbtn" ><i class="fas fa-trash"></i> </button>
                                            </div>
                                        </td>   
                                    </tr>
                                </tbody> 
                                @empty
                                    <tr><td colspan="14">No records found</td></tr>
                                @endforelse  
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Widthdraw-Method Modal -->
<div class="modal custom-modal fade" id="delete_widthdraw" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Widthdraw-Method</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-widthdraw-method')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_widthdrawId" name="d_widthdraw">
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
<!-- /Delete Widthdraw-Method Modal -->
<script>
	$(document).ready(function(){

        $(document).on('click','#widthdrawDbtn',function(){
            // alart("ok");
			var widthdraw_id=$(this).val();
			$('#delete_widthdraw').modal('show');
			$('#delete_widthdrawId').val(widthdraw_id);
		});
    
	});
	$(document).ready(function () {
    $('#dataTable').DataTable();
});

</script>
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection