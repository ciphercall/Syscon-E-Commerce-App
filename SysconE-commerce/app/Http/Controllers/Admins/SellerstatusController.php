<?php

namespace App\Http\Controllers\Admins;

use App\Models\Sellerstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerstatusController extends Controller
{
    public function index()
    {
        $sellerstatus=Sellerstatus::all();
        return view("pages.backends.seller-status.index",["sellerstatus"=> $sellerstatus]);
        
    }

    public function store(Request $request){
        $sellerstatus=new Sellerstatus; 
        $sellerstatus->seller_status=$request->txtSellerStatus;
        $sellerstatus->deleted_at=$request->txtDeleted_at;
        $sellerstatus->save();

        return back()->with('success','Created Successfully.');     
    }

    public function edit($id){
		$sellerstatus=Sellerstatus::find($id);
		return response()->json([
			'status'=>200,
			'sellerstatus'=>$sellerstatus
		]);
	}

    public function update(Request $request,Sellerstatus $sellerstatus){
        $sellerstatusid=$request->input('cmbSellerstatusId');
        $sellerstatus = Sellerstatus::find($sellerstatusid);
        $sellerstatus->id=$request->cmbSellerstatusId; 
        $sellerstatus->seller_status=$request->txtSellerStatus;
        $sellerstatus->deleted_at=$request->txtDeleted_at;		   
        $sellerstatus->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $sellerstatusid=$request->input('d_sellerstatus');
		$sellerstatus= Sellerstatus::find($sellerstatusid);
		$sellerstatus->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
