@extends('layout.backends.home')
@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Product Highlight</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Product Highlight</div>
            </div>
        </div>

        <div class="section-body">
            <a href="{{url('seller-products')}}" class="btn btn-primary"><i class="fas fa-list"></i> Products</a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('seller-products/'.$sellerproducts->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')                            
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Select Type <span class="text-danger">*</span></label>
                                        <select id="txtProductType" class="form-control" name="txtProductType" required>
                                            <option selected><-----Choose Type----></option>
                                            @foreach ($section as $val)
                                            <option value="{{ $val->id }}" {{ ( $val->id == $sellerproducts->product_type) ? 'selected' : '' }}>
                                                {{ $val->section_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12 d-none" id="dateBox">
                                        <label for="">Enter Date</label>
                                        <input type="text" name="date" class="form-control datepicker" autocomplete="off">
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