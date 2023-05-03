@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/css/jquery.datetimepicker.css')}}">
@endsection
@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Campaign</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Create Campaign</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{url('campaign')}}" class="btn btn-primary"><i class="fas fa-list"></i> Campaign</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('campaign.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Image Preview</label>
                                        <div>
                                            <img id="preview-img" class="admin-img" src="{{url('backends/assets/img/preview.png')}}" alt="" height="140px" width="140px">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control-file"  name="file_img" onchange="previewThumnailImage(event)">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" id="txtName" class="form-control"  name="txtName" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <input type="text" id="txtSlug" class="form-control"  name="txtSlug" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" id="txtTitle" class="form-control"  name="txtTitle" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Offer <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">%</span>
                                            <input type="text" class="form-control" name="txtOffer" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Start Time <span class="text-danger">*</span></label>
                                        <input type="text" id="date" class="form-control datetimepicker_mask"  name="txtStartTime" autocomplete="off">
                                    </div>

                                    <div class="form-group col-6">
                                        <label>End Time <span class="text-danger">*</span></label>
                                        <input type="text" id="datee" class="form-control datetimepicker_mask"  name="txtEndTime" autocomplete="off">
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Show Homepage? <span class="text-danger">*</span></label>
                                        <select id="txtShowHomepage" class="form-control" name="txtShowHomepage" required>
                                            <option selected><-----Select-----></option>
                                            @foreach ($show as $val)
                                            <option value="{{ $val->id }}">{{ $val->hp_show }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Status <span class="text-danger">*</span></label>
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