<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Pendingsellerorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendingsellerorderController extends Controller
{
    public function index()
    {
        //$pendingsellerorder=Pendingsellerorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $pendingsellerorder =DB::table('pendingsellerorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'pendingsellerorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'pendingsellerorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'pendingsellerorders.*')
            ->get();
        return view("pages.sellers.pending-seller-order.index",["pendingsellerorder"=>$pendingsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    
    public function store(Request $request){
        $pendingsellerorder=new Pendingsellerorder; 
        $pendingsellerorder->customer_name=$request->txtCustomerName;
        $pendingsellerorder->sellerorder_id=$request->txtOrderId;
        $pendingsellerorder->date=$request->txtDate;
        $pendingsellerorder->quantity=$request->txtQuantity;
        $pendingsellerorder->amount=$request->txtAmount;
        $pendingsellerorder->status=$request->txtStatus;
        $pendingsellerorder->payment=$request->txtPayment;
        $pendingsellerorder->deleted_at=$request->txtDeleted_at;

        $pendingsellerorder->save();
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){  
        
        $pendingsellerorder=Pendingsellerorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();        
        // $pendingseller =DB::table('pendingsellerwithdraws')
        // ->join('sellerstatuses','sellerstatuses.id', '=', 'pendingsellerwithdraws.Pseller_status')
        // ->select('sellerstatuses.seller_status', 'pendingsellerwithdraws.*')
        // ->where('pendingsellerwithdraws.id',$id)
        //     ->first();
    return view("pages.sellers.pending-seller-order.show",["pendingsellerorder"=>$pendingsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    
    }

    public function edit($id){
		$pendingsellerorder=Pendingsellerorder::find($id);
		return response()->json([
			'status'=>200,
			'pendingsellerorder'=>$pendingsellerorder
		]);
	}

    public function update(Request $request,Pendingsellerorder $pendingsellerorder){
        $pendingsellerorderid=$request->input('cmbPendingsellerorderId');
        $pendingsellerorder = Pendingsellerorder::find($pendingsellerorderid);
        $pendingsellerorder->id=$request->cmbPendingsellerorderId; 
        $pendingsellerorder->payment=$request->txtPayment;
        $pendingsellerorder->status=$request->txtStatus;
        $pendingsellerorder->deleted_at=$request->txtDeleted_at;		   
        $pendingsellerorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    
    public function destroy(Request $request){  
        $pendingsellerorderid=$request->input('d_pendingsellerorder');
		$pendingsellerorder= Pendingsellerorder::find($pendingsellerorderid);
		$pendingsellerorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
