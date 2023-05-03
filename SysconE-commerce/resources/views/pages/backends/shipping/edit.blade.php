@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/css/jquery.datetimepicker.css')}}">
@endsection
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Shipping</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Edit Shipping</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('shipping')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{url('shipping/'.$shipping->id)}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')                          
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" id="txtShippingTitle" class="form-control"  name="txtShippingTitle" value="{{$shipping->shipping_title}}">
                                </div>

                                <div class="form-group col-12">
                                    <label>Minimum Order Amount<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" name="txtShippingCost" value="{{$shipping->shipping_cost}}">
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="txtDescription" id="txtDescription" cols="30" rows="10" class="form-control text-area-5">{{$shipping->shipping_description}}</textarea>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                    <select id="txtStatus" class="form-control" name="txtStatus" required>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ ( $status->id == $shipping->shipping_status) ? 'selected' : '' }}>
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