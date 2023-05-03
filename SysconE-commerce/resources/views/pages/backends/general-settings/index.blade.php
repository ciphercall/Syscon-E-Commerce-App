@extends('layout.backends.home')
@section('page')
<div class="main-content">
<section class="section">
<div class="section-header">
<h1>Settings</h1>
<div class="section-header-breadcrumb">
<div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
</div>
</div>
</section>
<div class="section-body">
<div class="row mt-4">
<div class="col">
<div class="card">
<div class="card-header">
<div class="card-body">
<div class="row">
    <div class="col-12 col-sm-12 col-md-3">
        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
            <li class="nav-item border rounded mb-1">
                <a class="nav-link active" id="general-setting-tab" data-toggle="tab" href="#generalSettingTab" role="tab" aria-controls="generalSettingTab" aria-selected="true">General Setting</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="logo-tab" data-toggle="tab" href="#seoTab" role="tab" aria-controls="seoTab" aria-selected="true">SEO Setting</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="logo-tab" data-toggle="tab" href="#contactTab" role="tab" aria-controls="contactTab" aria-selected="true">Contact Info</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="themeColor-tab" data-toggle="tab" href="#themeColorTab" role="tab" aria-controls="themeColorTab" aria-selected="true">Theme color</a>
            </li>
            <li class="nav-item border rounded mb-1">
                <a class="nav-link" id="tawk-chat-tab" data-toggle="tab" href="#tawkChatTab" role="tab" aria-controls="tawkChatTab" aria-selected="true">Tawk Chat</a>
            </li>
        </ul>
    </div>


    <div class="col-12 col-sm-12 col-md-9">
        <div class="border rounded">
            <div class="tab-content no-padding" id="settingsContent">
                <div class="tab-pane fade show active" id="generalSettingTab" role="tabpanel" aria-labelledby="general-setting-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('general-settings/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">                                                            
                                    <label for="">Site Title</label>
                                    <input type="text" name="txtSiteTitle" class="form-control" value="{{$setting->site_title}}">
                                </div>

                                <div class="form-group">
                                    <img src="{{asset('img/'.$setting->site_logo)}}" alt="" sizes="" srcset="" height="110px" width="110px"> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Site Logo</label>
                                    <input type="file" name="file_logo" class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <img src="{{asset('img/'.$setting->site_fabicon)}}" alt="" sizes="" srcset="" height="50px" width="50px"> 
                                </div>

                                <div class="form-group">
                                    <label for="">Site Favicon</label>
                                    <input type="file" name="filefavicon"  class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="txtPhone" class="form-control" value="{{$setting->phone}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Contact Email</label>
                                    <input type="email" name="txtEmail" class="form-control" value="{{$setting->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Default Currency Name</label>
                                    <select id="eCurrency" class="form-control" name="txtCurrency" required>
                                        @foreach ($currencynames as $currency)
                                        <option value="{{ $currency->currency_name }}" {{ ( $currency->currency_name == $setting->currency) ? 'selected' : '' }}>
                                        {{ $currency->currency_name }}  
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Timezone</label>
                                    <select id="eTimezone" class="form-control" name="txtTimezone" required>   
                                        @foreach ($timezones as $timezone)
                                        <option value="{{ $timezone->time_zone }}" {{ ( $timezone->time_zone == $setting->timezone) ? 'selected' : '' }}>
                                        {{ $timezone->time_zone }}  
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="seoTab" role="tabpanel" aria-labelledby="seo-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('general-settings/1')}}" method="POST" enctype="multipart/form-data">                                                            
                                @csrf
                                @method('PUT')                                                          
                                <div class="form-group">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="txtMetaTitle" class="form-control" value="{{$setting->meta_title}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Meta Keyword</label>
                                    <input type="text" name="txtMetaKeyword"  class="form-control" value="{{$setting->meta_keyword}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea class="form-control" name="txtMetaDescription" rows="3">{{$setting->meta_description}}</textarea>
                                </div>

                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contactTab" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('general-settings/1')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')                                                         
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="txtPhone" class="form-control" value="{{$setting->phone}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" value="{{$setting->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Live Chat Script</label>
                                    <textarea class="form-control" name="txtLiveChatScript" rows="3">{{$setting->live_chat_script}}</textarea>
                                </div>

                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="themeColorTab" role="tabpanel" aria-labelledby="themeColor-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('general-settings/1')}}" method="POST">
                                @csrf
                                @method('PUT')                                                          
                                <div class="form-group">
                                    <label for="">Theme Color One</label>
                                    <input type="color" class="form-control" name="txtThemeColorOne" value="{{$setting->theme_color_one}}">
                                </div>

                                <!-- <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" class="form-control">
                                </div> -->
                                            

                                <div class="form-group">
                                    <label for="">Theme Color Two</label>
                                    <input type="color" class="form-control" name="txtThemeColorTwo" value="{{$setting->theme_color_two}}">
                                </div>

                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tawkChatTab" role="tabpanel" aria-labelledby="tawk-chat-tab">
                    <div class="card m-0">
                        <div class="card-body">
                            <form action="{{url('general-settings/1')}}" method="POST">
                                @csrf
                                @method('PUT')                                                         
                                <div class="form-group">
                                    <label for="">Allow Live Chat</label>
                                    <select name="allow" id="tawk_allow" class="form-control">
                                        <option  value="1">Enable</option>
                                        <option selected value="0">Disable</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Tawk Chat Link</label>
                                    <input type="text" class="form-control" name="txtChatLink" value="{{$setting->chat_link}}">
                                </div>
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection