<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Sellercondition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerconditionController extends Controller
{
    public function index()
    {
        $sellercondition=Sellercondition::all();      
        return view("pages.backends.seller-condition.index",["sellercondition"=>$sellercondition]);
        
    }

    public function edit($id){
		$sellercondition=Sellercondition::find($id);
        //dd($sellercondition);
        return view("pages.backends.seller-condition.index",["sellercondition"=>$sellercondition]);	
	}

    public function update(Request $request,$id){
        $sellercondition = Sellercondition::find($id);

        if(isset($request->txtSellerCondition)){
          $sellercondition->seller_condition=$request->txtSellerCondition;
        }

        $sellercondition->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
