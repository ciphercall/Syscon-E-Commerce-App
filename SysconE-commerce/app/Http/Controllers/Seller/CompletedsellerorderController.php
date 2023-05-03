<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Completedsellerorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompletedsellerorderController extends Controller
{
    public function index()
    {
        //$completedsellerorder=Completedsellerorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $completedsellerorder =DB::table('completedsellerorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'completedsellerorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'completedsellerorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'completedsellerorders.*')
            ->get();
        return view("pages.sellers.completed-seller-order.index",["completedsellerorder"=>$completedsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function store(Request $request){
        $completedsellerorder=new Completedsellerorder; 
        $completedsellerorder->customer_name=$request->txtCustomerName;
        $completedsellerorder->sellerorder_id=$request->txtOrderId;
        $completedsellerorder->date=$request->txtDate;
        $completedsellerorder->quantity=$request->txtQuantity;
        $completedsellerorder->amount=$request->txtAmount;
        $completedsellerorder->status=$request->txtStatus;
        $completedsellerorder->payment=$request->txtPayment;
        $completedsellerorder->deleted_at=$request->txtDeleted_at;

        $completedsellerorder->save();
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){  
        
        $completedsellerorder=Completedsellerorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();        
        // $pendingseller =DB::table('pendingsellerwithdraws')
        // ->join('sellerstatuses','sellerstatuses.id', '=', 'pendingsellerwithdraws.Pseller_status')
        // ->select('sellerstatuses.seller_status', 'pendingsellerwithdraws.*')
        // ->where('pendingsellerwithdraws.id',$id)
        //     ->first();
    return view("pages.sellers.completed-seller-order.show",["completedsellerorder"=>$completedsellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    
    }

    public function edit($id){
		$completedsellerorder=Completedsellerorder::find($id);
		return response()->json([
			'status'=>200,
			'completedsellerorder'=>$completedsellerorder
		]);
	}

    public function update(Request $request,Completedsellerorder $completedsellerorder){
        $completedsellerorderid=$request->input('cmbCompletedsellerorderId');
        $completedsellerorder = Completedsellerorder::find($completedsellerorderid);
        $completedsellerorder->id=$request->cmbCompletedsellerorderId; 
        $completedsellerorder->payment=$request->txtPayment;
        $completedsellerorder->status=$request->txtStatus;
        $completedsellerorder->deleted_at=$request->txtDeleted_at;		   
        $completedsellerorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $completedsellerorderid=$request->input('d_completedsellerorder');
		$completedsellerorder= Completedsellerorder::find($completedsellerorderid);
		$completedsellerorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
