@extends('layout.backends.home')
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Service</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Service</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('service')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{url('service/'.$service->id)}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')                          
                            <div class="row">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Title&nbsp;</label>
                                    <input type="text" name="txtServiceTitle" class="form-control" value="{{$service->s_title}}">
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Icon&nbsp;</label>
                                    <input type="text" name="txtServiceIcon" class="form-control" value="{{$service->s_icon}}">
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Description&nbsp;</label>
                                    <textarea name="txtDescription" cols="30" rows="3" class="form-control text-area-3">{{$service->s_description}}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Status</label>
                                    <select id="txtStatus" class="form-control" name="txtStatus" required>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ ( $status->id == $service->status) ? 'selected' : '' }}>
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