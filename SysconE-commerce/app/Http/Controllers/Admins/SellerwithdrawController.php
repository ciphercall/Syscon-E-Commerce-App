<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Sellerwithdraw;
use App\Models\Sellerstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerwithdrawController extends Controller
{
    public function index()
    {
        //$seller=Sellerwithdraw::all(); 
        $sellerstatus=Sellerstatus::all();

        $seller =DB::table('sellerwithdraws')
            ->join('sellerstatuses','sellerstatuses.id', '=', 'sellerwithdraws.status')
            ->select('sellerstatuses.seller_status', 'sellerwithdraws.*')
            ->get();
        return view("pages.backends.seller-withdraw.index",["seller"=>$seller, "sellerstatus"=>$sellerstatus]);
        
    }

    public function create()
    {
        $seller=Sellerwithdraw::all();
        $sellerstatus=Sellerstatus::all(); 
        return view("pages.backends.seller-withdraw.create",["seller"=>$seller, "sellerstatus"=>$sellerstatus]);
    }

    public function store(Request $request){
        $seller=new Sellerwithdraw; 
        $seller->seller_name=$request->txtSellerName;
        $seller->seller_b_method=$request->txtSellerMethod;
        $seller->seller_charge=$request->txtSellerCharge;
        $seller->seller_c_amount=$request->txtSellerChargeAmount;
        $seller->seller_t_ammount=$request->txtSellerTotalAmount;
        $seller->seller_w_ammount=$request->txtSellerWithdrawAmount;
        $seller->status=$request->txtStatus;
        $seller->seller_date=$request->txtSellerDate;
        $seller->seller_information=$request->txtSellerInformation;
        $seller->deleted_at=$request->txtDeleted_at;

        $seller->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){        

        $seller =DB::table('sellerwithdraws')
            ->join('sellerstatuses','sellerstatuses.id', '=', 'sellerwithdraws.status')
            ->select('sellerstatuses.seller_status', 'sellerwithdraws.*')
            ->where('sellerwithdraws.id',$id)
            ->first();
        return view("pages.backends.seller-withdraw.show",["seller"=>$seller]);                
    }

    public function destroy(Request $request){  
        $sellerid=$request->input('d_seller');
		$seller= Sellerwithdraw::find($sellerid);
		$seller->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
