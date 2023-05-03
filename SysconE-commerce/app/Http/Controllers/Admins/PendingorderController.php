<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Pendingorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendingorderController extends Controller
{
    public function index()
    {
        //$pendingorder=Pendingorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $pendingorder =DB::table('pendingorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'pendingorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'pendingorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'pendingorders.*')
            ->get();
        return view("pages.backends.pending-order.index",["pendingorder"=>$pendingorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function create()
    {
        $pendingorder=Pendingorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all(); 
        return view("pages.backends.pending-order.create",["pendingorder"=>$pendingorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    }

    public function store(Request $request){
        $pendingorder=new Pendingorder; 
        $pendingorder->customer_name=$request->txtCustomerName;
        $pendingorder->order_id=$request->txtOrderId;
        $pendingorder->date=$request->txtDate;
        $pendingorder->quantity=$request->txtQuantity;
        $pendingorder->amount=$request->txtAmount;
        $pendingorder->status=$request->txtStatus;
        $pendingorder->payment=$request->txtPayment;
        $pendingorder->deleted_at=$request->txtDeleted_at;

        $pendingorder->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$pendingorder=Pendingorder::find($id);
		return response()->json([
			'status'=>200,
			'pendingorder'=>$pendingorder
		]);
	}

    public function update(Request $request,Pendingorder $pendingorder){
        $pendingorderid=$request->input('cmbPendingorderId');
        $pendingorder = Pendingorder::find($pendingorderid);
        $pendingorder->id=$request->cmbPendingorderId; 
        $pendingorder->payment=$request->txtPayment;
        $pendingorder->status=$request->txtStatus;
        $pendingorder->deleted_at=$request->txtDeleted_at;		   
        $pendingorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $pendingorderid=$request->input('d_pendingorder');
		$pendingorder= Pendingorder::find($pendingorderid);
		$pendingorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
