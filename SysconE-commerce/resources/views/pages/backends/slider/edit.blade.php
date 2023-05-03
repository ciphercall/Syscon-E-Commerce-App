@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/css/jquery.datetimepicker.css')}}">
@endsection
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Slider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Edit Slider</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('slider')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{url('slider/'.$slider->id)}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')                          
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Current Slider</label>
                                    <div>
                                        <img src="{{asset('img/'.$slider->img)}}" alt="" sizes="" srcset="" height="110px" width="200px"> 
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>New Slider</label>
                                    <input type="file" name="file_img" class="form-control-file">
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Title&nbsp;</label>
                                    <textarea name="txtSliderName" cols="30" rows="3" class="form-control text-area-3">{{$slider->s_title}}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Description&nbsp;</label>
                                    <textarea name="txtDescription" cols="30" rows="3" class="form-control text-area-3">{{$slider->s_description}}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Button Link&nbsp;</label>
                                    <input type="text" name="txtButtonLink" class="form-control" value="{{$slider->button_link}}">
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Serial&nbsp;</label>
                                    <input type="number" name="txtSerial" class="form-control" value="{{$slider->serial}}">
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Status</label>
                                    <select id="txtStatus" class="form-control" name="txtStatus" required>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ ( $status->id == $slider->status) ? 'selected' : '' }}>
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
@endsection