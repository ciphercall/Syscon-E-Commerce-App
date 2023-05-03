<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Cashorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashorderController extends Controller
{
    public function index()
    {
        //$cashorder=Cashorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $cashorder =DB::table('cashorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'cashorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'cashorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'cashorders.*')
            ->get();
        return view("pages.backends.cash-order.index",["cashorder"=>$cashorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function create()
    {
        $cashorder=Cashorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all(); 
        return view("pages.backends.cash-order.create",["cashorder"=>$cashorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    }

    public function store(Request $request){
        $cashorder=new Cashorder; 
        $cashorder->customer_name=$request->txtCustomerName;
        $cashorder->order_id=$request->txtOrderId;
        $cashorder->date=$request->txtDate;
        $cashorder->quantity=$request->txtQuantity;
        $cashorder->amount=$request->txtAmount;
        $cashorder->status=$request->txtStatus;
        $cashorder->payment=$request->txtPayment;
        $cashorder->deleted_at=$request->txtDeleted_at;

        $cashorder->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$cashorder=Cashorder::find($id);
		return response()->json([
			'status'=>200,
			'cashorder'=>$cashorder
		]);
	}

    public function update(Request $request,Cashorder $cashorder){
        $cashorderid=$request->input('cmbCashorderId');
        $cashorder = Cashorder::find($cashorderid);
        $cashorder->id=$request->cmbCashorderId; 
        $cashorder->payment=$request->txtPayment;
        $cashorder->status=$request->txtStatus;
        $cashorder->deleted_at=$request->txtDeleted_at;		   
        $cashorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $cashorderid=$request->input('d_cashorder');
		$cashorder= Cashorder::find($cashorderid);
		$cashorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
