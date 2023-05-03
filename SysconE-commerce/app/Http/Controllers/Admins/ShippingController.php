<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Shipping;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        //$shipping=Shipping::all(); 
        $statuses=Status::all();

        $shipping =DB::table('shippings')
            ->join('statuses','statuses.id', '=', 'shippings.shipping_status')
            ->select('statuses.s_name', 'shippings.*')
            ->get();
        return view("pages.backends.shipping.index",["shipping"=>$shipping, "statuses"=>$statuses]);
        
    }

    public function create()
    {
        $shipping=Shipping::all();
        $statuses=Status::all(); 
        return view("pages.backends.shipping.create",["shipping"=>$shipping, "statuses"=>$statuses]);
    }

    public function store(Request $request){
        $shipping=new Shipping; 
        $shipping->shipping_title=$request->txtShippingTitle;
        $shipping->shipping_cost=$request->txtShippingCost;
        $shipping->shipping_description=$request->txtDescription;
        $shipping->shipping_status=$request->txtStatus;
        $shipping->deleted_at=$request->txtDeleted_at;

        $shipping->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $shipping=Shipping::find($id);
        $statuses=Status::all();	    
        return view("pages.backends.shipping.edit",["shipping"=>$shipping, "statuses"=>$statuses]);
		
	}

    public function update(Request $request,$id){
        $shipping = Shipping::find($id);

        if(isset($request->txtShippingTitle)){
        $shipping->shipping_title=$request->txtShippingTitle;
        }

        if(isset($request->txtShippingCost)){
        $shipping->shipping_cost=$request->txtShippingCost;
        }

        if(isset($request->txtDescription)){
        $shipping->shipping_description=$request->txtDescription;
        }

        if(isset($request->txtStatus)){
        $shipping->shipping_status=$request->txtStatus;
        } 

        $shipping->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $shippingid=$request->input('d_shipping');
		$shipping= Shipping::find($shippingid);
		$shipping->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
