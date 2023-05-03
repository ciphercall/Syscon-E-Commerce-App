<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Productgallery;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellergalleryController extends Controller
{
    public function index()
    {
        $sellergallery=Productgallery::all();
        $products=Products::all();  
        return view("pages.sellers.seller-product-gallery.index",["sellergallery"=>$sellergallery, "products"=>$products]);       
    }



    public function create()
    {
        $sellergallery=Productgallery::all();
        $products=Products::all();
        return view("pages.sellers.seller-product-gallery.create",["sellergallery"=>$sellergallery, "products"=>$products]);
    }



    public function store(Request $request,Productgallery $sellergallery){

        $sellergallery = new Productgallery;
        $sellergallery->product_id=$request->input('cmbProductgalleryId');
        $sellergallery->status='1';
        
        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $sellergallery->product_img=$imgName;
            $sellergallery->save();
            $request->file_img->move(public_path('img'),$imgName);
        }

        $sellergallery->save();
        //dd($sellergallery);        
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){   
        $product = Products::where('id',$id)->first();
        $sellergallery=Productgallery::where('product_id',$id)->get();
        return view("pages.sellers.seller-product-gallery.index",["sellergallery"=>$sellergallery,"product"=>$product]);                
    }

    
    public function destroy(Request $request){  
        $sellergalleryid=$request->input('d_sellergallery');
		$sellergallery= Productgallery::find($sellergalleryid);
		$sellergallery->delete();
        return redirect()->back()
        ->with('success',' Deleted successfully');
    }

}
