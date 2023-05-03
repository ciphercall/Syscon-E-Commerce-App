<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Progressorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgressorderController extends Controller
{
    public function index()
    {
        //$progressorder=Progressorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $progressorder =DB::table('progressorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'progressorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'progressorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'progressorders.*')
            ->get();
        return view("pages.backends.progress-order.index",["progressorder"=>$progressorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function create()
    {
        $progressorder=Progressorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all(); 
        return view("pages.backends.progress-order.create",["progressorder"=>$progressorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    }


    public function store(Request $request){
        $progressorder=new Progressorder; 
        $progressorder->customer_name=$request->txtCustomerName;
        $progressorder->order_id=$request->txtOrderId;
        $progressorder->date=$request->txtDate;
        $progressorder->quantity=$request->txtQuantity;
        $progressorder->amount=$request->txtAmount;
        $progressorder->status=$request->txtStatus;
        $progressorder->payment=$request->txtPayment;
        $progressorder->deleted_at=$request->txtDeleted_at;

        $progressorder->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$progressorder=Progressorder::find($id);
		return response()->json([
			'status'=>200,
			'progressorder'=>$progressorder
		]);
	}

    public function update(Request $request,Progressorder $progressorder){
        $progressorderid=$request->input('cmbProgressorderId');
        $progressorder = Progressorder::find($progressorderid);
        $progressorder->id=$request->cmbProgressorderId; 
        $progressorder->payment=$request->txtPayment;
        $progressorder->status=$request->txtStatus;
        $progressorder->deleted_at=$request->txtDeleted_at;		   
        $progressorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $progressorderid=$request->input('d_progressorder');
		$progressorder= Progressorder::find($progressorderid);
		$progressorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
