<?php

namespace App\Http\Controllers\Admins;

use App\Models\Discount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discount=Discount::all();
        return view("pages.backends.discount.index",["discount"=>$discount]);
        
    }

    public function store(Request $request){
        $discount=new Discount; 
        $discount->d_name=$request->txtDiscountName;
        $discount->deleted_at=$request->txtDeleted_at;
        $discount->save();         
        return back()->with('success','Created Successfully.');      
    }

    public function edit($id){
		$discount=Discount::find($id);
		return response()->json([
			'status'=>200,
			'discount'=>$discount
		]);
	}

    public function update(Request $request,Discount $discount){
        $discountid=$request->input('cmbDiscountId');
        $discount = Discount::find($discountid);
        $discount->id=$request->cmbDiscountId; 
        $discount->d_name=$request->txtDiscountName;
        $discount->deleted_at=$request->txtDeleted_at;		   
        $discount->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $discountid=$request->input('d_discount');
		$discount= Discount::find($discountid);
		$discount->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
