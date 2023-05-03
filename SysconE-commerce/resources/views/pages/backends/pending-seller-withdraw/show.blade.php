@extends('layout.backends.home')
@section("css")
<link rel="stylesheet" href="{{url('backends/assets/modules/summernote/summernote-bs4.css')}}">
@endsection
@section('page')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pending Seller withdraw</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{url('/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Pending Seller withdraw</div>
            </div>
        </div>
        <div class="section-body">
            <a href="{{url('pending-seller-withdraw')}}" class="btn btn-primary"><i class="fas fa-list"></i> Pending Seller withdraw</a>
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <td width="50%">Seller</td>
                                <td width="50%"><a href="#">{{$pendingseller->Pseller_name}}</a></td>
                            </tr>
                            <tr>
                                <td width="50%">Withdraw Method</td>
                                <td width="50%">{{$pendingseller->Pseller_b_method}}</td>
                            </tr>

                            <tr>
                                <td width="50%">Withdraw Charge</td>
                                <td width="50%">{{$pendingseller->Pseller_charge}}%</td>
                            </tr>

                            <tr>
                                <td width="50%">Withdraw Charge Amount</td>
                                <td width="50%">${{$pendingseller->Pseller_c_amount}}</td>
                            </tr>

                            <tr>
                                <td width="50%">Total amount</td>
                                <td width="50%">${{$pendingseller->Pseller_t_ammount}}</td>
                            </tr>
                            <tr>
                                <td width="50%">Withdraw amount</td>
                                <td width="50%">${{$pendingseller->Pseller_w_ammount}}</td>
                            </tr>
                            <tr>
                                <td width="50%">Status</td>
                                <td width="50%">
                                    @if($pendingseller->Pseller_status==1)
                                    <div>
                                        <span class="badge badge-success">{{$pendingseller->seller_status}}</span>
                                    </div>
                                    @else($pendingseller->Pseller_status==2)
                                    <div>
                                        <span class="badge badge-danger">{{$pendingseller->seller_status}}</span>
                                    </div>
                                    @endif
                                </td>

                            </tr>
                            <tr>
                                <td width="50%">Requested Date</td>
                                <td width="50%">{{$pendingseller->Pseller_date}}</td>
                            </tr>
                            
                            <tr>
                                <td width="50%">Account Information</td>
                                <td width="50%">{{$pendingseller->Pseller_information}} </td>
                            </tr>

                        </table>
                        <form action="https://demo.websolutionus.com/topcommerce/admin/approved-seller-withdraw/4" method="POST" id="approved-withdraw">
                            <input type="hidden" name="_token" value="lcYu46FuhksbIt5EhUHUkhKNxQHLpJKnUkj9esVT">                                
                            <input type="hidden" name="_method" value="PUT">                            
                        </form>

                            <a href="https://demo.websolutionus.com/topcommerce/admin/show-seller-withdraw/4" class="btn btn-primary" onclick="event.preventDefault();
                            document.getElementById('approved-withdraw').submit();">Approve withdraw</i></a>
                        <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" onclick="deleteData(4)">Delete withdraw request</a>
                    </div>
                  </div>
                </div>
          </div>
    </section>
</div>
@endsection