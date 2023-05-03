@extends('layout.backends.home')
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Create Mega Menu Sub Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Create Mega Menu Sub Category</div>
            </div>
		</div>
        <div class="section-body">
            <button onclick="history.go(-1)" class="btn btn-primary"><i class="fas fa-list"></i>&nbsp;Mega Menu Sub Category</button>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3>Category : {{$singlecategories->c_name}}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{url('create-mega-sub-category')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                       <input type="hidden" value="{{$megaId}}"  name="cmbSubmegamenuId" >
                                        <label> Sub Category&nbsp;<span class="text-danger">*</span></label>
                                        <select id="txtSubMegamenuCategory" class="form-control" name="txtSubMegamenuCategory" required>
                                            <option selected>Select Sub Category</option>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->sub_categoryname }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label">Serial&nbsp;<span class="text-danger">*</span></label>
                                        <input type="number" name="txtSerial" id="txtSerial" class="form-control">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Status&nbsp;<span class="text-danger">*</span></label>
                                        <select id="txtStatus" class="form-control" name="txtStatus" required>
                                            <option selected>Select Status</option>
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