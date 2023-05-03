<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Variant;
use App\Models\Status;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function index()
    {
        //$variant=Variant::all();
        $statuses=Status::all();
        $products=Products::all(); 

        $variant =DB::table('variants')
            ->join('statuses','statuses.id', '=', 'variants.status')
            ->select('statuses.s_name', 'variants.*')
            ->get();
        return view("pages.backends.variant.index",["variant"=>$variant, "statuses"=>$statuses, "products"=>$products]);
        
    }

    
    public function store(Request $request){
        $variant=new Variant; 
        $variant->product_id=$request->input('cmbVariantId');
        $variant->variant_name=$request->txtVariantName;
        $variant->status=$request->txtStatus;

        $variant->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){   
        $product = Products::where('id',$id)->first();
        $variant=Variant::where('product_id',$id)->get();
        $statuses=Status::all();
        return view("pages.backends.variant.index",["variant"=>$variant,"product"=>$product, "statuses"=>$statuses]);                
    }

    public function edit($id){
		$variant=Variant::find($id);
		return response()->json([
			'status'=>200,
			'variant'=>$variant
		]);
	}

    public function update(Request $request,Variant $variant){
        $variantid=$request->input('cmbPvariantId');
        $variant = Variant::find($variantid);
        $variant->id=$request->cmbPvariantId; 
        $variant->product_id=$request->input('cmbVariantId');
        $variant->variant_name=$request->txtVariantName;
        $variant->status=$request->txtStatus;
 
        $variant->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $variantid=$request->input('d_variant');
		$variant= Variant::find($variantid);
		$variant->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
