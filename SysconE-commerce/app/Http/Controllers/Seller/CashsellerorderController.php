<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Cashsellerorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashsellerorderController extends Controller
{
    public function index()
    {
        //$cashsellerorder=Cashsellerorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $cashsellerorder =DB::table('cashsellerorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'cashsellerorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'cashsellerorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'cashsellerorders.*')
            ->get();
        return view("pages.sellers.cash-seller-order.index",["cashsellerorder"=>$cashsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function store(Request $request){
        $cashsellerorder=new Cashsellerorder; 
        $cashsellerorder->customer_name=$request->txtCustomerName;
        $cashsellerorder->sellerorder_id=$request->txtOrderId;
        $cashsellerorder->date=$request->txtDate;
        $cashsellerorder->quantity=$request->txtQuantity;
        $cashsellerorder->amount=$request->txtAmount;
        $cashsellerorder->status=$request->txtStatus;
        $cashsellerorder->payment=$request->txtPayment;
        $cashsellerorder->deleted_at=$request->txtDeleted_at;

        $cashsellerorder->save();
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){  
        
        $cashsellerorder=Cashsellerorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();        
        // $pendingseller =DB::table('pendingsellerwithdraws')
        // ->join('sellerstatuses','sellerstatuses.id', '=', 'pendingsellerwithdraws.Pseller_status')
        // ->select('sellerstatuses.seller_status', 'pendingsellerwithdraws.*')
        // ->where('pendingsellerwithdraws.id',$id)
        //     ->first();
        return view("pages.sellers.cash-seller-order.show",["cashsellerorder"=>$cashsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    
    }


    public function edit($id){
		$cashsellerorder=Cashsellerorder::find($id);
		return response()->json([
			'status'=>200,
			'cashsellerorder'=>$cashsellerorder
		]);
	}

    public function update(Request $request,Cashsellerorder $cashsellerorder){
        $cashsellerorderid=$request->input('cmbCashsellerorderId');
        $cashsellerorder = Cashsellerorder::find($cashsellerorderid);
        $cashsellerorder->id=$request->cmbCashsellerorderId; 
        $cashsellerorder->payment=$request->txtPayment;
        $cashsellerorder->status=$request->txtStatus;
        $cashsellerorder->deleted_at=$request->txtDeleted_at;		   
        $cashsellerorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }


    public function destroy(Request $request){  
        $cashsellerorderid=$request->input('d_cashsellerorder');
		$cashsellerorder= Cashsellerorder::find($cashsellerorderid);
		$cashsellerorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
