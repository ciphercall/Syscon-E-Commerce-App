@extends('layout.backends.home')
@section('page')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Footer</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Footer</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('footer/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row"> 
                                    <div class="form-group col-12">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="txtfooteremail" class="form-control" value="{{$footer->f_email}}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="txtFooterPhone" class="form-control" value="{{$footer->f_phone}}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input type="text" name="txtfooteraddress" class="form-control" value="{{$footer->f_address}}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Existing Avatar</label>
                                        <div>
                                            <img src="{{asset('img/'.$footer->f_img)}}" alt="" sizes="" srcset="" height="60px" width="200px"> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-12">
                                        <label for="">Payment Card Image</label>
                                        <input type="file" name="file_img" class="form-control-file">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Image Title <span class="text-danger">*</span></label>
                                        <input type="text" name="txtfootertitle" class="form-control" value="{{$footer->img_title}}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Copyright <span class="text-danger">*</span></label>
                                        <input type="text" name="txtfootercopyright" class="form-control" value="{{$footer->f_copyright}}">
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