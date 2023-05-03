<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Declinedorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeclinedorderController extends Controller
{
    public function index()
    {
        //$declinedorder=Declinedorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $declinedorder =DB::table('declinedorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'declinedorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'declinedorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'declinedorders.*')
            ->get();
        return view("pages.backends.declined-order.index",["declinedorder"=>$declinedorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function create()
    {
        $declinedorder=Declinedorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all(); 
        return view("pages.backends.declined-order.create",["declinedorder"=>$declinedorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    }

    public function store(Request $request){
        $declinedorder=new Declinedorder; 
        $declinedorder->customer_name=$request->txtCustomerName;
        $declinedorder->order_id=$request->txtOrderId;
        $declinedorder->date=$request->txtDate;
        $declinedorder->quantity=$request->txtQuantity;
        $declinedorder->amount=$request->txtAmount;
        $declinedorder->status=$request->txtStatus;
        $declinedorder->payment=$request->txtPayment;
        $declinedorder->deleted_at=$request->txtDeleted_at;

        $declinedorder->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$declinedorder=Declinedorder::find($id);
		return response()->json([
			'status'=>200,
			'declinedorder'=>$declinedorder
		]);
	}

    public function update(Request $request,Declinedorder $declinedorder){
        $declinedorderid=$request->input('cmbDeclinedorderId');
        $declinedorder = Declinedorder::find($declinedorderid);
        $declinedorder->id=$request->cmbDeclinedorderId; 
        $declinedorder->payment=$request->txtPayment;
        $declinedorder->status=$request->txtStatus;
        $declinedorder->deleted_at=$request->txtDeleted_at;		   
        $declinedorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $declinedorderid=$request->input('d_declinedorder');
		$declinedorder= Declinedorder::find($declinedorderid);
		$declinedorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }

}
