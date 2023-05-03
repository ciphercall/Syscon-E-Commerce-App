@extends('layout.frontends.master')
@section('main_content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login mt-60">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>login</h2>
                    <form action="{{route('user-login.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Username or email <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="email" class="form-control" name="txtEmail" required>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Passwords <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" name="txtPassword" required>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="login_submit">
                                <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label>
                                <button type="submit">login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Register</h2>
                    <form action="{{route('user-login.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="txtName" required>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Username or email <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="email" class="form-control" name="txtEmail" required>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Passwords <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" name="txtPassword" required>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label>Passwords <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" name="txtConfirmPassword" required>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="login_submit">
                                <button type="submit">Register</button>
                                <!-- <button type="submit">Register</button> -->
                                <!-- <button type="submit">Register</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--register area end-->
        </div>
    </div>
</div>
<!-- customer login end -->




@endsection