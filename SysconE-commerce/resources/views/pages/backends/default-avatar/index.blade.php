@extends('layout.backends.home')
@section('page')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Default Avatar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Default Avatar</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('default-avatar/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')                                 
                                <div class="form-group">
                                    <label for="">Existing Avatar</label>
                                    <div>
                                        <img src="{{asset('img/'.$avater->avatar_img)}}" alt="" sizes="" srcset="" height="100px" width="100px"> 
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">New Avatar</label>
                                    <input type="file" name="file_img" class="form-control-file">
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