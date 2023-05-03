<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Deliveredsellerorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveredsellerorderController extends Controller
{
    public function index()
    {
        //$deliveredsellerorder=Deliveredsellerorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $deliveredsellerorder =DB::table('deliveredsellerorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'deliveredsellerorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'deliveredsellerorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'deliveredsellerorders.*')
            ->get();
        return view("pages.sellers.delivered-seller-order.index",["deliveredsellerorder"=>$deliveredsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function store(Request $request){
        $deliveredsellerorder=new Deliveredsellerorder; 
        $deliveredsellerorder->customer_name=$request->txtCustomerName;
        $deliveredsellerorder->sellerorder_id=$request->txtOrderId;
        $deliveredsellerorder->date=$request->txtDate;
        $deliveredsellerorder->quantity=$request->txtQuantity;
        $deliveredsellerorder->amount=$request->txtAmount;
        $deliveredsellerorder->status=$request->txtStatus;
        $deliveredsellerorder->payment=$request->txtPayment;
        $deliveredsellerorder->deleted_at=$request->txtDeleted_at;

        $deliveredsellerorder->save();
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){  
        
        $deliveredsellerorder=Deliveredsellerorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();        
        // $pendingseller =DB::table('pendingsellerwithdraws')
        // ->join('sellerstatuses','sellerstatuses.id', '=', 'pendingsellerwithdraws.Pseller_status')
        // ->select('sellerstatuses.seller_status', 'pendingsellerwithdraws.*')
        // ->where('pendingsellerwithdraws.id',$id)
        //     ->first();
    return view("pages.sellers.delivered-seller-order.show",["deliveredsellerorder"=>$deliveredsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    
    }

    
    public function edit($id){
		$deliveredsellerorder=Deliveredsellerorder::find($id);
		return response()->json([
			'status'=>200,
			'deliveredsellerorder'=>$deliveredsellerorder
		]);
	}

    public function update(Request $request,Deliveredsellerorder $deliveredsellerorder){
        $deliveredsellerorderid=$request->input('cmbDeliveredsellerorderId');
        $deliveredsellerorder = Deliveredsellerorder::find($deliveredsellerorderid);
        $deliveredsellerorder->id=$request->cmbDeliveredsellerorderId; 
        $deliveredsellerorder->payment=$request->txtPayment;
        $deliveredsellerorder->status=$request->txtStatus;
        $deliveredsellerorder->deleted_at=$request->txtDeleted_at;		   
        $deliveredsellerorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $deliveredsellerorderid=$request->input('d_deliveredsellerorder');
		$deliveredsellerorder= Deliveredsellerorder::find($deliveredsellerorderid);
		$deliveredsellerorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }


}
