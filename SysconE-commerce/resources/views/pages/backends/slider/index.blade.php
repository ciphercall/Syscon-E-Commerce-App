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
            <h1>Slider</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Slider</div>
            </div>
        </div>
    </section>
    <!-- /Page Header -->
	<div class="row">
        <div class="col-auto float-right ml-auto pb-2" >
            <a href="{{ route('slider.create') }}" class="btn btn-primary btn-block"><i class="fa fa-plus"></i>Add New</a> 
        </div>
	</div>
    <!-- /Page Header -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                <th class="sorting">Image</th>
                                <th class="sorting">Title</th>
                                <th class="sorting">Description</th>
                                <th class="sorting">Serial</th>
                                <th class="sorting">Status</th>
                                <th class="sorting">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @forelse ($slider as $slider)
                                <tr class="odd">
                                    <td><img src="{{asset('img/'.$slider->img)}}" height="70px" width="120px" alt=""></td>
                                    <td>{{$slider-> s_title}}</td>
                                    <td>{{$slider-> s_description}}</td>
                                    <td>{{$slider-> serial}}</td>
                                    <td>
                                        @if($slider->status==1)
                                        <div>
                                            <input type="checkbox" checked data-toggle="toggle" data-on="{{$slider->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                                        </div>
                                        @elseif($slider->status==2)
                                        <div>
                                            <input type="checkbox" checked data-toggle="toggle" data-on="{{$slider->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                                        </div>
                                        @else
                                        <div>
                                            <input type="checkbox" checked data-toggle="toggle" data-on="{{$slider->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{url('slider/'.$slider->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit" ></i></a>&nbsp;
                                            <!-- <button type="button" value="{{$slider->id}}" class="btn btn-primary" id="editslider" ><i class="fas fa-edit" ></i> </button>&nbsp; -->
                                            <button type="button" value="{{$slider->id}}" class="btn btn-danger" id="sliderDbtn" ><i class="fas fa-trash"></i> </button>
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
<!-- Delete Slider Modal -->
<div class="modal custom-modal fade" id="delete_slider" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Slider</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-slider')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_sliderId" name="d_slider">
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
<!-- /Delete Slider Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>

<script>
	$(document).ready(function(){

        $(document).on('click','#sliderDbtn',function(){
            // alart("ok");
			var slider_id=$(this).val();
			$('#delete_slider').modal('show');
			$('#delete_sliderId').val(slider_id);
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