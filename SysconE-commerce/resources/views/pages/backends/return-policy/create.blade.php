@extends('layout.backends.home')
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Create Return Policy</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Create Return Policy</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('return-policy')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('return-policy.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" id="txtPolicyTitle" class="form-control"  name="txtPolicyTitle">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Details <span class="text-danger">*</span></label>
                                        <textarea name="txtPolicyDetails" id="txtPolicyDetails" cols="30" rows="10" class="form-control text-area-5"></textarea>
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