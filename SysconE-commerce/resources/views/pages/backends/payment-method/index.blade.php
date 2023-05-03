@extends('layout.backends.home')
@section('css')
<style>
    .toggle.btn {
    min-width: 5.7rem !important;
}
</style>
<link rel="stylesheet" href="{{url('backends/assets/bootstrap4-toggle-3.6.1/css/bootstrap4-toggle.min.css')}}">
@endsection

@section('page')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Payment Methods</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
            </div>
        </div>

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
                                                <a class="nav-link active" id="bank-account-tab" data-toggle="tab" href="#bankAccountTab" role="tab" aria-controls="bankAccountTab" aria-selected="true">Bank Account</a>
                                            </li>
                                            
                                            <li class="nav-item border rounded mb-1">
                                                <a class="nav-link" id="cash-tab" data-toggle="tab" href="#cashTab" role="tab" aria-controls="cashTab" aria-selected="true">Cash On Deliver</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-9">
                                        <div class="border rounded">
                                            <div class="tab-content no-padding" id="settingsContent">
                                                <div class="tab-pane fade show active" id="bankAccountTab" role="tabpanel" aria-labelledby="bank-account-tab">
                                                    <div class="card m-0">
                                                        <div class="card-body">
                                                            <form action="{{url('payment-method/1')}}" method="POST">
                                                                @csrf
                                                                @method('PUT')                                                          
                                                                <div class="form-group">
                                                                    <label for="">Bank Payment Status</label>
                                                                    <div>
                                                                        @if($method->bank_status==1)
                                                                        <div>
                                                                            <input id="toggle1" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                        </div>
                                                                        @else($method->bank_status==2)
                                                                        <div>
                                                                            <input id="toggle1" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">Account Information</label>
                                                                    <textarea name="txtBankDetail" id="" cols="30" rows="10" class="text-area-5 form-control">{{$method->b_account_detail}}</textarea>
                                                                </div>
                                                                
                                                                <button class="btn btn-primary">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="cashTab" role="tabpanel" aria-labelledby="cash-tab">
                                                    <div class="card m-0">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="">Cash on delivery Status</label>
                                                                <div>
                                                                    <a onclick="changeCashOnDeliveryStatus()" href="javascript:;">
                                                                    <div>
                                                                        @if($method->cash_status==1)
                                                                        <div>
                                                                            <input id="toggle2" type="checkbox" checked data-toggle="toggle" data-on="Inable" data-off="Disable" data-onstyle="success" data-offstyle="danger">   
                                                                        </div>
                                                                        @else($method->cash_status==2)
                                                                        <div>
                                                                            <input id="toggle2" type="checkbox" checked data-toggle="toggle" data-on="Disable" data-off="Inable" data-onstyle="danger" data-offstyle="success">   
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    </a>
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
        </div>
    </section>
</div>
@section('js')
<script src="{{url('backends/assets/bootstrap4-toggle-3.6.1/js/bootstrap4-toggle.min.js')}}"></script>
@endsection
@endsection