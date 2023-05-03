@extends('layout.backends.home')
@section('page')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Shop Page</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Shop Page</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('shop-page/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')                                 
                                <div class="form-group">
                                    <label for="">Filter Maximum price range</label>
                                    <input type="text" name="txtPriceRange" class="form-control" value="{{$shoppage->price_range}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection