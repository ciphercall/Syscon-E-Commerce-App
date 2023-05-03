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
            <h1>Campaign</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Campaign</div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <a href="{{ route('campaign.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add New</a> 
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                    <th class="sorting">SN</th>
                                    <th class="sorting">Campaign</th>
                                    <th class="sorting">Start Time</th>
                                    <th class="sorting">End Time</th>
                                    <th class="sorting">Banner</th>
                                    <th class="sorting">Offer</th>
                                    <th class="sorting">Show Homepage</th>
                                    <th class="sorting">Status</th>
                                    <th class="sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @forelse ($campaign as $campaign)
                                    <tr class="odd">
                                        <td>{{$campaign-> id}}</td>
                                        <td>{{$campaign-> name}}</td>
                                        <td>{{$campaign-> start_time}}</td>
                                        <td>{{$campaign-> end_time}}</td>
                                        <td><img src="{{asset('img/'.$campaign->img)}}" height="70px" width="120px" alt=""></td>
                                        <td>{{$campaign-> offer}}%</td>
                                        <td>
                                            @if($campaign->show_homepage==1)
                                            <div>
                                              <span class="badge badge-success">{{$campaign->hp_show}}</span>
                                            </div>
                                            @else($campaign->show_homepage==2)
                                            <div>
                                              <span class="badge badge-danger">{{$campaign->hp_show}}</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($campaign->c_status==1)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$campaign->s_name}}" data-off="InActive" data-onstyle="success" data-offstyle="danger">   
                                            </div>
                                            @elseif($campaign->c_status==2)
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$campaign->s_name}}" data-off="Active" data-onstyle="danger" data-offstyle="success">   
                                            </div>
                                            @else
                                            <div>
                                                <input type="checkbox" checked data-toggle="toggle" data-on="{{$campaign->s_name}}" data-off="Active" data-onstyle="warning" data-offstyle="success">   
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url('campaign/'.$campaign->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit" ></i></a>&nbsp;
                                                <button type="button" value="{{$campaign->id}}" class="btn btn-danger" id="campaignDbtn" ><i class="fas fa-trash"></i> </button>&nbsp;
                                                <a href="" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true"></i></a>
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
<!-- Delete Campaign Modal -->
<div class="modal custom-modal fade" id="delete_campaign" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header" style="text-align:center;">
					<h3>Delete Campaign</h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row float-right">
						<div class="col-6">
							<form action="{{url('delete-campaign')}}" method="post" >
								@csrf
								@method("DELETE")
                                <input type="hidden" id="delete_campaignId" name="d_campaign">
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
<!-- /Delete Campaign Modal -->
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('backends/assets/modules/datatables/dataTables.select.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
<script>
	$(document).ready(function(){

        $(document).on('click','#campaignDbtn',function(){
            // alart("ok");
			var campaign_id=$(this).val();
			$('#delete_campaign').modal('show');
			$('#delete_campaignId').val(campaign_id);
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