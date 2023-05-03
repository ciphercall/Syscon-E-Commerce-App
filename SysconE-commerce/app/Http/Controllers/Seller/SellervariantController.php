<?php

namespace App\Http\Controllers\Seller;
use Illuminate\Support\Facades\DB;
use App\Models\Productvariant;
use App\Models\Products;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellervariantController extends Controller
{
    public function index()
    {
        //$sellervariant=Productvariant::all(); 
        $products=Products::all(); 
        $statuses=Status::all();

        $sellervariant =DB::table('productvariants')
            ->join('statuses','statuses.id', '=', 'productvariants.status')
            ->select('statuses.s_name', 'productvariants.*')
            ->get(); 
        return view("pages.sellers.seller-product-variant.index",["sellervariant"=>$sellervariant, "products"=>$products, "statuses"=>$statuses]);       
    }

    public function create()
    {
        $sellervariant=Productvariant::all();
        $products=Products::all();
        $statuses=Status::all();
        return view("pages.sellers.seller-product-variant.create",["sellervariant"=>$sellervariant, "products"=>$products, "statuses"=>$statuses]);
    }


    public function store(Request $request,Productvariant $sellervariant){
        $sellervariant = new Productvariant;
        $sellervariant->product_id=$request->input('cmbProductvariantId');
        //$variant->status='1';
        $sellervariant->variant_name=$request->txtVariantName;
        $sellervariant->variant_item=$request->txtVariantItem;
        $sellervariant->variant_price=$request->txtVariantPrice;
        $sellervariant->variant_quantity=$request->txtVariantQuantity;
        $sellervariant->status=$request->txtStatus;

        $sellervariant->save();
        //dd($sellervariant);        
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){ 
        $statuses=Status::all();  
        $product = Products::where('id',$id)->first();
        $sellervariant=Productvariant::where('product_id',$id)->get();
        return view("pages.sellers.seller-product-variant.index",["sellervariant"=>$sellervariant,"product"=>$product, "statuses"=>$statuses]);                
    }

    public function edit($id){
		$sellervariant=Productvariant::find($id);
		return response()->json([
			'status'=>200,
			'sellervariant'=>$sellervariant
		]);
	}


    public function update(Request $request,Productvariant $sellervariant){
        $sellervariantid=$request->input('cmbProductvariantId');
        $sellervariant = Productvariant::find($sellervariantid);
        $sellervariant->id=$request->cmbProductvariantId; 
        $sellervariant->variant_name=$request->txtVariantName;
        $sellervariant->variant_item=$request->txtVariantItem;
        $sellervariant->variant_price=$request->txtVariantPrice;
        $sellervariant->variant_quantity=$request->txtVariantQuantity;
        $sellervariant->status=$request->txtStatus;

        $sellervariant->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $sellervariantid=$request->input('d_sellervariant');
		$sellervariant= Productvariant::find($sellervariantid);
		$sellervariant->delete();
        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
