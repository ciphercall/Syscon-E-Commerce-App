@extends('layout.backends.home')
@section('page')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Topbar Contact</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Topbar Contact</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('topbar-contact/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')                                 
                                <div class="form-group">
                                    <label for="">Topbar Phone</label>
                                    <input type="text" name="txtPhone" class="form-control" value="{{$topbarcontact->phone}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Topbar Email</label>
                                    <input type="email" name="txtEmail" class="form-control" value="{{$topbarcontact->email}}">
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