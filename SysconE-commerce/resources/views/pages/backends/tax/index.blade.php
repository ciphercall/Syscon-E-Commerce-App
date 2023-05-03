@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection
@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Product Tax</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Product Tax</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{ route('tax.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Tax</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @forelse ($tax as $tax)
                                        <tr class="odd">
                                        <td>{{$tax-> id}}</td>
                                            <td>{{$tax-> title}}</td>
                                            <td>{{$tax-> price}}%</td>
                                            <td>
                                                @if($tax->t_status==1)
                                                <div>
                                                    <input type="checkbox" checked data-toggle="toggle" data-on="{{$tax->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                                                </div>
                                                @elseif($tax->t_status==2)
                                                <div>
                                                    <input type="checkbox" checked data-toggle="toggle" data-on="{{$tax->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                                                </div>
                                                @else
                                                <div>
                                                    <input type="checkbox" checked data-toggle="toggle" data-on="{{$tax->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
                                                </div>
                                                @endif
                                            </td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{url('tax/'.$tax->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit" ></i></a>&nbsp;
                                                    <button type="button" value="{{$tax->id}}" class="btn btn-danger" id="taxDbtn" ><i class="fas fa-trash"></i> </button>
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
    </section>
</div>

<!-- Delete Tax Modal -->
<div class="modal custom-modal fade" id="delete_tax" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Tax</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-tax')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_taxId" name="d_tax">
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
<!-- /Delete Tax Modal -->
<script>
	$(document).ready(function(){

        $(document).on('click','#taxDbtn',function(){
            // alart("ok");
			var tax_id=$(this).val();
			$('#delete_tax').modal('show');
			$('#delete_taxId').val(tax_id);
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