<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Coupon;
use App\Models\Status;
use App\Models\Discount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        //$coupon=Coupon::all();
        $statuses=Status::all();
        $discount=Discount::all();

        $coupon =DB::table('coupons')
            ->join('statuses','statuses.id', '=', 'coupons.coupon_status')
            ->join('discounts','discounts.id', '=', 'coupons.discount_type')
            ->select('statuses.s_name', 'discounts.d_name', 'coupons.*')
            ->get();
        return view("pages.backends.coupon.index",["coupon"=>$coupon, "statuses"=>$statuses, "discount"=>$discount]);    
    }


    public function store(Request $request){
        $coupon=new Coupon; 
        $coupon->coupon_name=$request->txtCouponName;
        $coupon->coupon_code=$request->txtCouponCode;
        $coupon->coupon_number=$request->txtCouponNumber;
        $coupon->coupon_date=$request->txtCouponDate;
        $coupon->coupon_discount=$request->txtCouponDiscount;
        $coupon->discount_type=$request->txtCouponDiscountType;
        $coupon->coupon_status=$request->txtStatus;
        $coupon->deleted_at=$request->txtDeleted_at;
        $coupon->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$coupon=Coupon::find($id);
		return response()->json([
			'status'=>200,
			'coupon'=>$coupon
		]);
	}

    public function update(Request $request,Coupon $categories){
        $couponid=$request->input('cmbCouponId');
        $coupon = Coupon::find($couponid);
        $coupon->id=$request->cmbCouponId; 
        $coupon->coupon_name=$request->txtCouponName;
        $coupon->coupon_code=$request->txtCouponCode;
        $coupon->coupon_number=$request->txtCouponNumber;
        $coupon->coupon_date=$request->txtCouponDate;
        $coupon->coupon_discount=$request->txtCouponDiscount;
        $coupon->discount_type=$request->txtCouponDiscountType;
        $coupon->coupon_status=$request->txtStatus;
        $coupon->deleted_at=$request->txtDeleted_at;		   
        $coupon->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $couponid=$request->input('d_coupon');
		$coupon= Coupon::find($couponid);
		$coupon->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
