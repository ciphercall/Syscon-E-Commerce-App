@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/summernote/summernote-bs4.css')}}">
@endsection
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Withdraw Method</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{url('/widthdraw-method')}}">Withdraw Method</a></div>
              <div class="breadcrumb-item">Edit Withdraw Method</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('widthdraw-method')}}" class="btn btn-primary"><i class="fas fa-list"></i> Withdraw Method</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{url('widthdraw-method/'.$widthdraw->id)}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')                          
                            <div class="row">
                            <div class="form-group col-12">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" id="txtWidthdrawName" class="form-control"  name="txtWidthdrawName" value="{{$widthdraw->w_name}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Minimum Amount <span class="text-danger">*</span></label>
                                    <input type="text" id="txtWidthdrawMin" class="form-control"  name="txtWidthdrawMin" value="{{$widthdraw->w_min_amount}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Maximum Amount <span class="text-danger">*</span></label>
                                    <input type="text" id="txtWidthdrawMax" class="form-control"  name="txtWidthdrawMax" value="{{$widthdraw->w_max_amount}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Withdraw Charge <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">%</span>
                                        <input type="text" class="form-control" name="txtWidthdrawCharge" value="{{$widthdraw->widthdraw_charge}}">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="txtWidthdrawDetail" id="" cols="30" rows="10" class="summernote">{{$widthdraw->widthdraw_detail}}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Status</label>
                                    <select id="txtStatus" class="form-control" name="txtStatus" required>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ ( $status->id == $widthdraw->widthdraw_status) ? 'selected' : '' }}>
                                            {{ $status->s_name }}
                                        </option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
	$(document).ready(function () {
    $('.summernote').summernote();
});
</script>
@section('js')
<script src="{{url('backends/assets/modules/summernote/summernote-bs4.js')}}"></script>
@endsection
@endsection