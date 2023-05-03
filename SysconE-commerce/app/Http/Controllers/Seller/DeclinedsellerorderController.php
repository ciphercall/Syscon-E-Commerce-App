<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Declinedsellerorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeclinedsellerorderController extends Controller
{
    public function index()
    {
        //$declinedsellerorder=Declinedsellerorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $declinedsellerorder =DB::table('declinedsellerorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'declinedsellerorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'declinedsellerorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'declinedsellerorders.*')
            ->get();
        return view("pages.sellers.declined-seller-order.index",["declinedsellerorder"=>$declinedsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function store(Request $request){
        $declinedsellerorder=new Declinedsellerorder; 
        $declinedsellerorder->customer_name=$request->txtCustomerName;
        $declinedsellerorder->sellerorder_id=$request->txtOrderId;
        $declinedsellerorder->date=$request->txtDate;
        $declinedsellerorder->quantity=$request->txtQuantity;
        $declinedsellerorder->amount=$request->txtAmount;
        $declinedsellerorder->status=$request->txtStatus;
        $declinedsellerorder->payment=$request->txtPayment;
        $declinedsellerorder->deleted_at=$request->txtDeleted_at;

        $declinedsellerorder->save();
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){  
        
        $declinedsellerorder=Declinedsellerorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();        
        // $pendingseller =DB::table('pendingsellerwithdraws')
        // ->join('sellerstatuses','sellerstatuses.id', '=', 'pendingsellerwithdraws.Pseller_status')
        // ->select('sellerstatuses.seller_status', 'pendingsellerwithdraws.*')
        // ->where('pendingsellerwithdraws.id',$id)
        //     ->first();
    return view("pages.sellers.declined-seller-order.show",["declinedsellerorder"=>$declinedsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    
    }

    public function edit($id){
		$declinedsellerorder=Declinedsellerorder::find($id);
		return response()->json([
			'status'=>200,
			'declinedsellerorder'=>$declinedsellerorder
		]);
	}

    public function update(Request $request,Declinedsellerorder $declinedsellerorder){
        $declinedsellerorderid=$request->input('cmbDeclinedsellerorderId');
        $declinedsellerorder = Declinedsellerorder::find($declinedsellerorderid);
        $declinedsellerorder->id=$request->cmbDeclinedsellerorderId; 
        $declinedsellerorder->payment=$request->txtPayment;
        $declinedsellerorder->status=$request->txtStatus;
        $declinedsellerorder->deleted_at=$request->txtDeleted_at;		   
        $declinedsellerorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $declinedsellerorderid=$request->input('d_declinedsellerorder');
		$declinedsellerorder= Declinedsellerorder::find($declinedsellerorderid);
		$declinedsellerorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
