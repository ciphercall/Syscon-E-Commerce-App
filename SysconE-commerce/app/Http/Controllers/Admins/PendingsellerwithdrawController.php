<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Pendingsellerwithdraw;
use App\Models\Sellerstatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendingsellerwithdrawController extends Controller
{
    public function index()
    {
        //$pendingseller=Pendingsellerwithdraw::all(); 
        $sellerstatus=Sellerstatus::all();

        $pendingseller =DB::table('pendingsellerwithdraws')
            ->join('sellerstatuses','sellerstatuses.id', '=', 'pendingsellerwithdraws.Pseller_status')
            ->select('sellerstatuses.seller_status', 'pendingsellerwithdraws.*')
            ->get();
        return view("pages.backends.pending-seller-withdraw.index",["pendingseller"=>$pendingseller, "sellerstatus"=>$sellerstatus]);
        
    }

    public function create()
    {
        $pendingseller=Pendingsellerwithdraw::all();
        $sellerstatus=Sellerstatus::all(); 
        return view("pages.backends.pending-seller-withdraw.create",["pendingseller"=>$pendingseller, "sellerstatus"=>$sellerstatus]);
    }

    public function store(Request $request){
        $pendingseller=new Pendingsellerwithdraw; 
        $pendingseller->Pseller_name=$request->txtPSellerName;
        $pendingseller->Pseller_b_method=$request->txtPSellerMethod;
        $pendingseller->Pseller_charge=$request->txtPSellerCharge;
        $pendingseller->Pseller_c_amount=$request->txtPSellerChargeAmount;
        $pendingseller->Pseller_t_ammount=$request->txtPSellerTotalAmount;
        $pendingseller->Pseller_w_ammount=$request->txtPSellerWithdrawAmount;
        $pendingseller->Pseller_status=$request->txtStatus;
        $pendingseller->Pseller_date=$request->txtPsellerDate;
        $pendingseller->Pseller_information=$request->txtPsellerInformation;
        $pendingseller->deleted_at=$request->txtDeleted_at;

        $pendingseller->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){         
        $pendingseller =DB::table('pendingsellerwithdraws')
        ->join('sellerstatuses','sellerstatuses.id', '=', 'pendingsellerwithdraws.Pseller_status')
        ->select('sellerstatuses.seller_status', 'pendingsellerwithdraws.*')
        ->where('pendingsellerwithdraws.id',$id)
            ->first();
    return view("pages.backends.pending-seller-withdraw.show",["pendingseller"=>$pendingseller]);
    
    }



    public function destroy(Request $request){  
        $pendingsellerid=$request->input('d_pendingseller');
		$pendingseller= Pendingsellerwithdraw::find($pendingsellerid);
		$pendingseller->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
