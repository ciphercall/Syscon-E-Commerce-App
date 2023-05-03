@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Product Gallery</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{url('seller-products')}}">Products</a></div>
                <div class="breadcrumb-item">Product Gallery</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{url('seller-products')}}" class="btn btn-primary"><i class="fas fa-list"></i> Products</a>
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h2>Product :{{$product->p_name}}</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{route('seller-products-gallery.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf                           
                                <div class="form-group">
                                    <input type="hidden" value="{{$product->id}}"  name="cmbProductgalleryId" >
                                    <label for="">New Image (Multiple)</label>
                                    <input type="file" class="form-control-file" name="file_img" multiple>
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="dataTable_info">
                                    <thead>
                                        <tr>
                                            <!-- <th class="sorting sorting_asc">SN</th> -->
                                            <th class="sorting">Image</th>
                                            <th class="sorting">Status</th>
                                            <th class="sorting">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody> 
                                        @forelse ($sellergallery as $sellergallery)
                                        <tr class="odd">
                                            <!-- <td>{{$sellergallery-> id}}</td> -->
                                            <td><img src="{{asset('img/'.$sellergallery->product_img)}}" height="120px" width="170px" alt=""></td>
                                            <td> 
                                                @if($sellergallery->status==1)
                                                <div>
                                                    <input type="checkbox" checked data-toggle="toggle" data-on="{{$sellergallery->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                                                </div>
                                                @elseif($sellergallery->status==2)
                                                <div>
                                                    <input type="checkbox" checked data-toggle="toggle" data-on="{{$sellergallery->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                                                </div>
                                                @else
                                                <div>
                                                    <input type="checkbox" checked data-toggle="toggle" data-on="{{$sellergallery->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
                                                </div>
                                                @endif
                                            </td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" value="{{$sellergallery->id}}" class="btn btn-danger" id="sellergalleryDbtn" ><i class="fas fa-trash"></i> </button>
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
    </section>
</div>
<!-- Delete Seller-Product-Gallery Modal -->
<div class="modal custom-modal fade" id="delete_sellergallery" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Product</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-seller-products-gallery')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_sellergalleryId" name="d_sellergallery">
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
<!-- /Delete Seller-Product-Gallery Modal -->

@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#sellergalleryDbtn',function(){
            // alart("ok");
			var sellergallery_id=$(this).val();
			$('#delete_sellergallery').modal('show');
			$('#delete_sellergalleryId').val(sellergallery_id);
		});
    
	});
	$(document).ready(function () {
    $('#dataTable').DataTable();
});
</script>
@endsection
@endsection