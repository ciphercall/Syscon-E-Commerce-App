<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Productgallery;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductgalleryController extends Controller
{
    public function index()
    {
        $gallery=Productgallery::all();
        $products=Products::all();  
        return view("pages.backends.product-gallery.index",["gallery"=>$gallery, "products"=>$products]);       
    }


    public function create()
    {
        $gallery=Productgallery::all();
        $products=Products::all();
        return view("pages.backends.product-gallery.create",["gallery"=>$gallery, "products"=>$products]);
    }


    public function store(Request $request,Productgallery $gallery){

        $gallery = new Productgallery;
        $gallery->product_id=$request->input('cmbProductgalleryId');
        $gallery->status='1';
        
        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $gallery->product_img=$imgName;
            $gallery->save();
            $request->file_img->move(public_path('img'),$imgName);
        }

        $gallery->save();
        //dd($gallery);        
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){   
        $product = Products::where('id',$id)->first();
        $gallery=Productgallery::where('product_id',$id)->get();
        return view("pages.backends.product-gallery.index",["gallery"=>$gallery,"product"=>$product]);                
    }

    public function destroy(Request $request){  
        $galleryid=$request->input('d_gallery');
		$gallery= Productgallery::find($galleryid);
		$gallery->delete();
        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
