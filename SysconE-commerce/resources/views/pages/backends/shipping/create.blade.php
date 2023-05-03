@extends('layout.backends.home')
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Create Shipping</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Create Shipping</div>
            </div>
		</div>

        <div class="section-body">
            <a href="{{url('shipping')}}" class="btn btn-primary"><i class="fas fa-list"></i> Shipping</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('shipping.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf                            
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" id="txtShippingTitle" class="form-control"  name="txtShippingTitle">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Shipping Coast <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"> $</span>
                                            <input type="text" class="form-control" name="txtShippingCost">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea name="txtDescription" class="form-control text-area-5" id="txtDescription" cols="30" rows="10"></textarea>
                                    </div>

                                    
                                    <div class="form-group col-12">
                                        <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                        <select id="txtStatus" class="form-control" name="txtStatus" required>
                                            <option selected><-----Select Status----></option>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->s_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">Save</button>
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