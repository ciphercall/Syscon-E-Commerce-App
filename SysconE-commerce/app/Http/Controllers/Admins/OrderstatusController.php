<?php

namespace App\Http\Controllers\Admins;

use App\Models\Orderstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderstatusController extends Controller
{
    public function index()
    {
        $orderstatus=Orderstatus::all();
        return view("pages.backends.order-status.index",["orderstatus"=> $orderstatus]);
        
    }

    public function store(Request $request){
        $orderstatus=new Orderstatus; 
        $orderstatus->order_status=$request->txtOrderStatus;
        $orderstatus->deleted_at=$request->txtDeleted_at;
        $orderstatus->save();

        return back()->with('success','Created Successfully.');     
    }

    public function edit($id){
		$orderstatus=Orderstatus::find($id);
		return response()->json([
			'status'=>200,
			'orderstatus'=>$orderstatus
		]);
	}

    public function update(Request $request,Orderstatus $orderstatus){
        $orderstatusid=$request->input('cmbOrderstatusId');
        $orderstatus = Orderstatus::find($orderstatusid);
        $orderstatus->id=$request->cmbOrderstatusId; 
        $orderstatus->order_status=$request->txtOrderStatus;
        $orderstatus->deleted_at=$request->txtDeleted_at;		   
        $orderstatus->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $orderstatusid=$request->input('d_orderstatus');
		$orderstatus= Orderstatus::find($orderstatusid);
		$orderstatus->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
