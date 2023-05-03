@extends('layout.backends.home')
@section('css')
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Announcement</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Announcement</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('announcement/1')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')                       
                            <div class="form-group">
                                <label for="">Announcement Status</label>
                                <div>
                                    @if($announcement->status==1)
                                    <div>
                                        <input id="toggle1" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                    </div>
                                    @elseif($announcement->status==2)
                                    <div>
                                        <input id="toggle1" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Existing Image</label>
                                <div>
                                    <img src="{{asset('img/'.$announcement->announcement_img)}}" alt="" sizes="" srcset="" height="110px" width="200px"> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">New Image</label>
                                <input type="file" class="form-control-file" name="file_img">
                            </div>

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="txtAnnouncementTitle" value="{{$announcement->announcement_title}}">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="txtAnnouncementDescription" id="txtAnnouncementDescription" cols="30" rows="10" class="form-control text-area-5">{{$announcement->announcement_description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Footer Text</label>
                                <input type="text" class="form-control" name="txtFooterText" value="{{$announcement->footer_text}}">
                            </div>

                            <div class="form-group">
                                <label for="">Session Expired Date Quantity</label>
                                <input type="number" class="form-control" name="txtSessionQuantity" value="{{$announcement->session_quantity}}">
                            </div>

                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@section('js')
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection