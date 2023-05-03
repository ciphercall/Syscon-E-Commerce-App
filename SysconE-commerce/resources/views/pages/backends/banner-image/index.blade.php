@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Banner Image</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Banner Image</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="dataTable_info">
                                    <thead>
                                        <th>Location</th>
                                        <th>Image</th>
                                        <th>New Image</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody> 
                                        @forelse ($bannerimage as $bannerimage)
                                        <tr class="odd">
                                            <td>{{$bannerimage->b_name}}</td> 
                                            <td><img src="{{asset('img/'.$bannerimage->b_img)}}" height="70px" width="120px" alt=""></td>
                                            <form action="{{url('banner-image/'.$bannerimage->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')                                       
                                                <td><input type="file" class="form-control-file" name="file_img" required></td>  
                                                <td><button class="btn btn-primary" type="submit">Update</button></td> 
                                            </form>
                                        </tr>
                                    </tbody> 
                                    @empty
                                        <tr><td colspan="14">No records found</td></tr>
                                    @endforelse  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
	$(document).ready(function () {
    $('#dataTable').DataTable();
});

</script>
@section('js')
<script src="{{url('backends/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection
