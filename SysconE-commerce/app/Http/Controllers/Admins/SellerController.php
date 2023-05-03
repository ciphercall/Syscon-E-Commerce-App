<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Seller;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $sellers=Seller::all();
        $products=Products::all();  
        return view("pages.backends.seller.index",["sellers"=>$sellers, "products"=>$products]);       
    }

    public function create()
    {
        $sellers=Seller::all();
        $products=Products::all();
        return view("pages.backends.seller.create",["sellers"=>$sellers, "products"=>$products]);
    }

    public function store(Request $request){
        $sellers=new Seller; 
        $sellers->seller_name=$request->txtSellerName;
        $sellers->shop_name=$request->txtShopName;
        $sellers->email=$request->txtEmail;
        $sellers->phone=$request->txtPhone;
        $sellers->status=$request->txtStatus;
     
        $sellers->save();
        //dd($sellers);        
        return back()->with('success','Created Successfully.');
          
    }
}
