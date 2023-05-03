@extends('layout.backends.home')
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Create Slider</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Create Slider</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('slider')}}" class="btn btn-primary"><i class="fas fa-backward"></i> Go Back</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label">Slider Image&nbsp;</label>
                                        <input type="file" name="file_img" class="form-control-file">
                                    </div>

                                    <div class="form-group col-12">
                                        <label class="col-form-label">Title&nbsp;</label>
                                        <textarea name="txtSliderName" id="txtSliderName" cols="30" rows="3" class="form-control text-area-3"></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label class="col-form-label">Description&nbsp;</label>
                                        <textarea name="txtDescription" id="txtDescription" cols="30" rows="3" class="form-control text-area-3"></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label class="col-form-label">Button Link&nbsp;</label>
                                        <input type="text" name="txtButtonLink" id="txtButtonLink" class="form-control">
                                    </div>

                                    <div class="form-group col-12">
                                        <label class="col-form-label">Serial&nbsp;</label>
                                        <input type="number" name="txtSerial" id="txtSerial" class="form-control">
                                    </div>

                                    <div class="form-group col-12">
                                        <label class="col-form-label">Status&nbsp;</label>
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