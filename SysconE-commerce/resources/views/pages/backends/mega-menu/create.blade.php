@extends('layout.backends.home')
@section('page')
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Create Mega Menu Category</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Mega Menu Category</div>
            </div>
		</div>
        <div class="section-body">
            <a href="{{url('mega-menu-category')}}" class="btn btn-primary"><i class="fas fa-list"></i>&nbsp;Mega Menu Category</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('mega-menu-category.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Category&nbsp;<span class="text-danger">*</span></label>
                                        <!-- <input type="text" name="txtMegamenuCategory" id="txtMegamenuCategory" class="form-control"> -->
                                        <select id="txtMegamenuCategory" class="form-control" name="txtMegamenuCategory" required>
                                            <option selected>Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->c_name }}</option>
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