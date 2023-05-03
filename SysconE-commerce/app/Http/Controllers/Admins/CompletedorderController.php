<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Completedorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompletedorderController extends Controller
{
    public function index()
    {
        //$completedorder=Completedorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $completedorder =DB::table('completedorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'completedorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'completedorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'completedorders.*')
            ->get();
        return view("pages.backends.completed-order.index",["completedorder"=>$completedorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function create()
    {
        $completedorder=Completedorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all(); 
        return view("pages.backends.completed-order.create",["completedorder"=>$completedorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    }

    public function store(Request $request){
        $completedorder=new Completedorder; 
        $completedorder->customer_name=$request->txtCustomerName;
        $completedorder->order_id=$request->txtOrderId;
        $completedorder->date=$request->txtDate;
        $completedorder->quantity=$request->txtQuantity;
        $completedorder->amount=$request->txtAmount;
        $completedorder->status=$request->txtStatus;
        $completedorder->payment=$request->txtPayment;
        $completedorder->deleted_at=$request->txtDeleted_at;

        $completedorder->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$completedorder=Completedorder::find($id);
		return response()->json([
			'status'=>200,
			'completedorder'=>$completedorder
		]);
	}


    public function update(Request $request,Completedorder $completedorder){
        $completedorderid=$request->input('cmbCompletedorderId');
        $completedorder = Completedorder::find($completedorderid);
        $completedorder->id=$request->cmbCompletedorderId; 
        $completedorder->payment=$request->txtPayment;
        $completedorder->status=$request->txtStatus;
        $completedorder->deleted_at=$request->txtDeleted_at;		   
        $completedorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $completedorderid=$request->input('d_completedorder');
		$completedorder= Completedorder::find($completedorderid);
		$completedorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
