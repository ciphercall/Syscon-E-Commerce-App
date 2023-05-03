@extends('layout.backends.home')
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Mega Menu Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Mega Menu Category</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('mega-menu-category')}}" class="btn btn-primary"><i class="fas fa-list"></i>&nbsp;Back Mega Menu Category</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <form action="{{url('mega-menu-category/'.$megamenu->id)}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')                          
                            <div class="row">
                                <div class="form-group col-12">
                                    <label class="col-form-label">Category&nbsp;<span class="text-danger">*</span></label>
                                    <select id="txtMegamenuCategory" class="form-control" name="txtMegamenuCategory" required>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ ( $category->id == $megamenu->megamenu_category) ? 'selected' : '' }}>
                                            {{ $category->c_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Serial&nbsp;<span class="text-danger">*</span></label>
                                    <input type="number" name="txtSerial" class="form-control" value="{{$megamenu->serial}}">
                                </div>

                                <div class="form-group col-12">
                                    <label class="col-form-label">Status&nbsp;<span class="text-danger">*</span></label>
                                    <select id="txtStatus" class="form-control" name="txtStatus" required>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ ( $status->id == $megamenu->status) ? 'selected' : '' }}>
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