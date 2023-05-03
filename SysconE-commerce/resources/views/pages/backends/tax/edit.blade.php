@extends('layout.backends.home')
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Product Tax</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Edit Product Tax</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('tax')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('tax/'.$tax->id)}}" method="POST" enctype="multipart/form-data"> 
                                @csrf
                                @method('PUT')                          
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label">Title&nbsp;</label>
                                        <input type="text" name="txtTitle" class="form-control" value="{{$tax->title}}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Price <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">%</span>
                                            <input type="text" class="form-control" name="txtPrice" value="{{$tax->price}}">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label class="col-form-label">Status</label>
                                        <select id="txtStatus" class="form-control" name="txtStatus" required>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" {{ ( $status->id == $tax->t_status) ? 'selected' : '' }}>
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
        </div>
    </section>
</div>
@endsection