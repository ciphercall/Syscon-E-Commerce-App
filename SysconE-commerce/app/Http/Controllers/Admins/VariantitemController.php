<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Variant;
use App\Models\Variantitem;
use App\Models\Status;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VariantitemController extends Controller
{
    public function index()
    {
        $variant=Variant::find($id);
        $statuses=Status::all();
        $products=Products::all(); 

        $items =DB::table('variantitems')
            ->join('variants','variants.id', '=', 'variantitems.variant_id')
            ->join('statuses','statuses.id', '=', 'variantitems.status')
            ->select('statuses.s_name', 'variants.variant_name', 'variantitems.*')
            ->get();
        return view("pages.backends.variant-item.index",["items"=>$items, "variant"=>$variant, "statuses"=>$statuses, "products"=>$products]);
        
    }

    public function store(Request $request){
        $items=new Variantitem; 
        $items->product_id=$request->input('product_id');
        $items->variant_id=$request->cmbVariantId;
        $items->item=$request->txtItem;
        $items->price=$request->txtPrice;
        $items->status=$request->txtStatus;

        $items->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function show($id){
        $statuses=Status::all();
        $variant = Variant::where('id',$id)->first();
       // $items=Variantitem::where('product_id',$id)->get();
        $items=Variantitem::where('variant_id',$id)
            ->join('variants','variants.id', '=', 'variantitems.variant_id')
            ->select('variants.product_id','variants.variant_name', 'variantitems.*') 
            ->get();
        //dd($items);
        return view("pages.backends.variant-item.index",["variant"=>$variant, "items"=>$items, "statuses"=>$statuses]);

    }



    public function edit($id){
		$items=Variantitem::find($id);
		return response()->json([
			'status'=>200,
			'items'=>$items
		]);
	}


    public function update(Request $request,Variantitem $items){
        $itemsid=$request->input('cmbVariantitemId');
        $items = Variantitem::find($itemsid);
        $items->id=$request->cmbVariantitemId; 
        $items->product_id=$request->input('product_id');
        //$items->variant_id=$request->txtVariantId;
        $items->item=$request->txtItem;
        $items->price=$request->txtPrice;
        $items->status=$request->txtStatus;
 
        $items->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $itemsid=$request->input('d_items');
		$items= Variantitem::find($itemsid);
		$items->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
