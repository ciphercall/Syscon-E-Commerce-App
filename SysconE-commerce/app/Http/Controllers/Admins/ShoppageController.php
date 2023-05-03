<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Shoppage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ShoppageController extends Controller
{
    public function index()
    {
        $shoppage=Shoppage::all();      
        return view("pages.backends.shop-page.index",["shoppage"=>$shoppage]);
        
    }

    public function edit($id){
		$shoppage=Shoppage::find($id);
        //dd($shoppage);
        return view("pages.backends.shop-page.index",["shoppage"=>$shoppage]);	
	}

    public function update(Request $request,$id){
        $shoppage = Shoppage::find($id);

        if(isset($request->txtPriceRange)){
          $shoppage->price_range=$request->txtPriceRange;
        }

        $shoppage->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
