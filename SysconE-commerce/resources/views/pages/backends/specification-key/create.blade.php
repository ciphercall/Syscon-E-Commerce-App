@extends('layout.backends.home')
@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create Specification Key</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Create Specification Key</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{url('specification-key')}}" class="btn btn-primary"><i class="fas fa-list"></i> Specification Key</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('specification-key.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf                            
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Key <span class="text-danger">*</span></label>
                                        <input type="text" id="txtKey" class="form-control"  name="txtKey">
                                    </div>
                                    
                                    <div class="form-group col-12">
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

@endsection