<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Orderstatus;
use App\Models\Paymentstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        //$order=Order::all(); 
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all();

        $order =DB::table('orders')
            ->join('orderstatuses','orderstatuses.id', '=', 'orders.status')
            ->join('paymentstatuses','paymentstatuses.id', '=', 'orders.payment')
            ->select('orderstatuses.order_status', 'paymentstatuses.payment_status', 'orders.*')
            ->get();
        return view("pages.backends.order.index",["order"=>$order, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
        
    }

    public function create()
    {
        $order=Order::all();
        $orderstatus=Orderstatus::all();
        $paymentstatus=Paymentstatus::all(); 
        return view("pages.backends.order.create",["order"=>$order, "orderstatus"=>$orderstatus, "paymentstatus"=>$paymentstatus]);
    }

    public function store(Request $request){
        $order=new Order; 
        $order->order_id=$request->txtOrderId;
        $order->user_id=$request->txtUserId;
        $order->shipping_add=$request->txtShippingAdd;
        $order->date=$request->txtDate;
        $order->quantity=$request->txtQuantity;
        $order->amount=$request->txtAmount;
        $order->status=$request->txtStatus;
        $order->payment=$request->txtPayment;

        $order->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$order=Order::find($id);
		return response()->json([
			'status'=>200,
			'order'=>$order
		]);
	}

    public function update(Request $request,Order $order){
        $orderid=$request->input('cmbOrderId');
        $order = Order::find($orderid);
        $order->id=$request->cmbOrderId; 
        $order->order_id=$request->txtOrderId;
        $order->user_id=$request->txtUserId;
        $order->shipping_add=$request->txtShippingAdd;
        $order->date=$request->txtDate;
        $order->quantity=$request->txtQuantity;
        $order->amount=$request->txtAmount;
        $order->status=$request->txtStatus;
        $order->payment=$request->txtPayment;

        $order->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }
}
