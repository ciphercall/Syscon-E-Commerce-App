<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Sellerorder;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerorderController extends Controller
{
    public function index()
    {
        //$sellerorder=Sellerorder::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $sellerorder =DB::table('sellerorders')
            ->join('orderstatuses','orderstatuses.id', '=', 'sellerorders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'sellerorders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'sellerorders.*')
            ->get();
        return view("pages.sellers.seller-order.index",["sellerorder"=>$sellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function create()
    {
        $sellerorder=Sellerorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all(); 
        return view("pages.sellers.seller-order.create",["sellerorder"=>$sellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    }

    public function store(Request $request){
        $sellerorder=new Sellerorder; 
        $sellerorder->customer_name=$request->txtCustomerName;
        $sellerorder->sellerorder_id=$request->txtOrderId;
        $sellerorder->date=$request->txtDate;
        $sellerorder->quantity=$request->txtQuantity;
        $sellerorder->amount=$request->txtAmount;
        $sellerorder->status=$request->txtStatus;
        $sellerorder->payment=$request->txtPayment;
        $sellerorder->deleted_at=$request->txtDeleted_at;

        $sellerorder->save();
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){  
        
        $sellerorder=Sellerorder::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();        
        // $pendingseller =DB::table('pendingsellerwithdraws')
        // ->join('sellerstatuses','sellerstatuses.id', '=', 'pendingsellerwithdraws.Pseller_status')
        // ->select('sellerstatuses.seller_status', 'pendingsellerwithdraws.*')
        // ->where('pendingsellerwithdraws.id',$id)
        //     ->first();
    return view("pages.sellers.seller-order.show",["sellerorder"=>$sellerorder, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    
    }

    public function edit($id){
		$sellerorder=Sellerorder::find($id);
		return response()->json([
			'status'=>200,
			'sellerorder'=>$sellerorder
		]);
	}

    public function update(Request $request,Sellerorder $sellerorder){
        $sellerorderid=$request->input('cmbSellerorderId');
        $sellerorder = Sellerorder::find($sellerorderid);
        $sellerorder->id=$request->cmbSellerorderId; 
        $sellerorder->payment=$request->txtPayment;
        $sellerorder->status=$request->txtStatus;
        $sellerorder->deleted_at=$request->txtDeleted_at;		   
        $sellerorder->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $sellerorderid=$request->input('d_sellerorder');
		$sellerorder= Sellerorder::find($sellerorderid);
		$sellerorder->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
