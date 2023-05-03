<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Progresssellerorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ProgresssellerorderController extends Controller
{
    public function index()
    {
        //$progresssellerorder=Progresssellerorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $progresssellerorder =DB::table('progresssellerorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'progresssellerorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'progresssellerorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'progresssellerorders.*')
            ->get();
        return view("pages.sellers.progress-seller-order.index",["progresssellerorder"=>$progresssellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function store(Request $request){
        $progresssellerorder=new Progresssellerorder; 
        $progresssellerorder->customer_name=$request->txtCustomerName;
        $progresssellerorder->sellerorder_id=$request->txtOrderId;
        $progresssellerorder->date=$request->txtDate;
        $progresssellerorder->quantity=$request->txtQuantity;
        $progresssellerorder->amount=$request->txtAmount;
        $progresssellerorder->status=$request->txtStatus;
        $progresssellerorder->payment=$request->txtPayment;
        $progresssellerorder->deleted_at=$request->txtDeleted_at;

        $progresssellerorder->save();
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){  
        
        $progresssellerorder=Progresssellerorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();        
        // $pendingseller =DB::table('pendingsellerwithdraws')
        // ->join('sellerstatuses','sellerstatuses.id', '=', 'pendingsellerwithdraws.Pseller_status')
        // ->select('sellerstatuses.seller_status', 'pendingsellerwithdraws.*')
        // ->where('pendingsellerwithdraws.id',$id)
        //     ->first();
    return view("pages.sellers.progress-seller-order.show",["progresssellerorder"=>$progresssellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    
    }

    public function edit($id){
		$progresssellerorder=Progresssellerorder::find($id);
		return response()->json([
			'status'=>200,
			'progresssellerorder'=>$progresssellerorder
		]);
	}

    public function update(Request $request,Progresssellerorder $progresssellerorder){
        $progresssellerorderid=$request->input('cmbProgresssellerorderId');
        $progresssellerorder = Progresssellerorder::find($progresssellerorderid);
        $progresssellerorder->id=$request->cmbProgresssellerorderId; 
        $progresssellerorder->payment=$request->txtPayment;
        $progresssellerorder->status=$request->txtStatus;
        $progresssellerorder->deleted_at=$request->txtDeleted_at;		   
        $progresssellerorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $progresssellerorderid=$request->input('d_progresssellerorder');
		$progresssellerorder= Progresssellerorder::find($progresssellerorderid);
		$progresssellerorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
