@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/css/jquery.datetimepicker.css')}}">
@endsection
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Campaign</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Edit Campaign</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('campaign')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{url('campaign/'.$campaign->id)}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')                          
                            <div class="row">

                                <div class="form-group col-12">
                                    <label>Image Preview</label>
                                    <div>
                                        <img id="preview-img" class="admin-img" src="{{asset('img/'.$campaign->img)}}" alt="" sizes="" srcset="" height="150px" width="170px"> 
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file"  name="file_img" onchange="previewThumnailImage(event)">
                                </div>

                                <div class="form-group col-6">  
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" id="txtName" class="form-control"  name="txtName" value="{{$campaign->name}}">
                                </div>

                                <div class="form-group col-6">
                                    <label>Slug <span class="text-danger">*</span></label>
                                    <input type="text" id="txtSlug" class="form-control"  name="txtSlug" value="{{$campaign->slug}}">
                                </div>

                                <div class="form-group col-6">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" id="txtTitle" class="form-control"  name="txtTitle" value="{{$campaign->title}}">
                                </div>

                                <div class="form-group col-6">
                                    <label>Offer <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">%</span>
                                        <input type="text" class="form-control" name="txtOffer" value="{{$campaign->offer}}">
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label>Start Date <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control datetimepicker_mask"  name="txtStartTime" value="{{$campaign->start_time}}" autocomplete="off">
                                </div>

                                <div class="form-group col-6">
                                    <label>End Date <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control datetimepicker_mask"  name="txtEndTime" value="{{$campaign->end_time}}" autocomplete="off">
                                </div>

                                <div class="form-group col-6">
                                    <label>Show Homepage? <span class="text-danger">*</span></label>
                                    <select id="txtShowHomepage" class="form-control" name="txtShowHomepage" required>
                                        @foreach ($show as $val)
                                        <option value="{{ $val->id }}" {{ ( $val->id == $campaign->show_homepage) ? 'selected' : '' }}>
                                            {{ $val->hp_show }}
                                        </option>
                                        @endforeach
                                    </select> 
                                </div>

                                <div class="form-group col-6">
                                    <label>Status</label>
                                    <select id="txtStatus" class="form-control" name="txtStatus" required>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ ( $status->id == $campaign->c_status) ? 'selected' : '' }}>
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
        $('.datetimepicker_mask').datetimepicker({
            format:'Y-m-d H:i',

        });

    });

    function previewThumnailImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview-img');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);

    };
    
</script>
@section('js')
<script src="{{url('backends/assets/js/jquery.datetimepicker.js')}}"></script>
@endsection
@endsection