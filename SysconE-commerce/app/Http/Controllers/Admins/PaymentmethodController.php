<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Paymentmethod;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentmethodController extends Controller
{
    public function index()
    {
        //$method=Paymentmethod::all();
        $status=Status::all();
        
        $method =DB::table('paymentmethods')
            ->join('status','status.id', '=', 'paymentmethods.id')
            ->select('paymentmethods.*','status.s_name')
            ->get();
              //dd($method);
        return view("pages.backends.payment-method.index",["method"=>$method, "status"=>$status]);
        
    }

    public function edit($id){
        $method=Paymentmethod::find($id);
        $status=Status::all();
        return view("pages.backends.payment-method.index",["method"=>$method, "status"=>$status]);	
	}


        
    public function update(Request $request,$id){
        $method = Paymentmethod::find($id);

        //dd($request->txtBankDetail);
        if(isset($request->txtBankDetail)){
          $method->b_account_detail=$request->txtBankDetail;
        }


        if(isset($request->txtBankStatus)){
          $method->bank_status=$request->txtBankStatus;
        }

        if(isset($request->txtBankCash)){
            $method->cash_status=$request->txtBankCash;
        }
  
        $method->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
