<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Deliveredorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveredorderController extends Controller
{
    public function index()
    {
        //$deliveredorder=Deliveredorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $deliveredorder =DB::table('deliveredorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'deliveredorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'deliveredorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'deliveredorders.*')
            ->get();
        return view("pages.backends.delivered-order.index",["deliveredorder"=>$deliveredorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function create()
    {
        $deliveredorder=Deliveredorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all(); 
        return view("pages.backends.delivered-order.create",["deliveredorder"=>$deliveredorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    }

    public function store(Request $request){
        $deliveredorder=new Deliveredorder; 
        $deliveredorder->customer_name=$request->txtCustomerName;
        $deliveredorder->order_id=$request->txtOrderId;
        $deliveredorder->date=$request->txtDate;
        $deliveredorder->quantity=$request->txtQuantity;
        $deliveredorder->amount=$request->txtAmount;
        $deliveredorder->status=$request->txtStatus;
        $deliveredorder->payment=$request->txtPayment;
        $deliveredorder->deleted_at=$request->txtDeleted_at;

        $deliveredorder->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$deliveredorder=Deliveredorder::find($id);
		return response()->json([
			'status'=>200,
			'deliveredorder'=>$deliveredorder
		]);
	}

    public function update(Request $request,Deliveredorder $deliveredorder){
        $deliveredorderid=$request->input('cmbDeliveredorderId');
        $deliveredorder = Deliveredorder::find($deliveredorderid);
        $deliveredorder->id=$request->cmbDeliveredorderId; 
        $deliveredorder->payment=$request->txtPayment;
        $deliveredorder->status=$request->txtStatus;
        $deliveredorder->deleted_at=$request->txtDeleted_at;		   
        $deliveredorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $deliveredorderid=$request->input('d_deliveredorder');
		$deliveredorder= Deliveredorder::find($deliveredorderid);
		$deliveredorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
