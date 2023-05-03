<?php

namespace App\Http\Controllers\Admins;

use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentstatusController extends Controller
{
    public function index()
    {
        $paymentstatus=Paymentstatus::all();
        return view("pages.backends.payment-status.index",["paymentstatus"=> $paymentstatus]);
        
    }

    public function store(Request $request){
        $paymentstatus=new Paymentstatus; 
        $paymentstatus->payment_status=$request->txtPaymentStatus;
        $paymentstatus->deleted_at=$request->txtDeleted_at;
        $paymentstatus->save();

        return back()->with('success','Created Successfully.');     
    }

    public function edit($id){
		$paymentstatus=Paymentstatus::find($id);
		return response()->json([
			'status'=>200,
			'paymentstatus'=>$paymentstatus
		]);
	}

    public function update(Request $request,Paymentstatus $paymentstatus){
        $paymentstatusid=$request->input('cmbPaymentstatusId');
        $paymentstatus = Paymentstatus::find($paymentstatusid);
        $paymentstatus->id=$request->cmbPaymentstatusId; 
        $paymentstatus->payment_status=$request->txtPaymentStatus;
        $paymentstatus->deleted_at=$request->txtDeleted_at;		   
        $paymentstatus->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $paymentstatusid=$request->input('d_paymentstatus');
		$paymentstatus= Paymentstatus::find($paymentstatusid);
		$paymentstatus->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
