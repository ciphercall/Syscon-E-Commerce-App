<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Brands;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands=Brands::all();
        $statuses=Status::all();

        $brands =DB::table('brands')
            ->join('statuses','statuses.id', '=', 'brands.status')
            ->select('statuses.s_name', 'brands.*')
            ->get();
        return view("pages.backends.brands.index",["brands"=>$brands, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $brands=new Brands; 
        $brands->name=$request->txtName;
        $brands->slug=$request->txtSlug;
        $brands->rating=$request->txtRating;
        $brands->status=$request->txtStatus;
        $brands->deleted_at=$request->txtDeleted_at;

        if(isset($request->file_logo)){
            $logoName = (rand(100,1000)).'.'.$request->file_logo->extension();
            $brands->logo=$logoName;
            $brands->update();
            $request->file_logo->move(public_path('img'),$logoName);
        }
        $brands->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$brands=Brands::find($id);
		return response()->json([
			'status'=>200,
			'brands'=>$brands
		]);
	}

    public function update(Request $request,Brands $brands){
        $brandsid=$request->input('cmbBrandsId');
        $brands = Brands::find($brandsid);
        $brands->id=$request->cmbBrandsId; 
        $brands->name=$request->txtName;
        $brands->slug=$request->txtSlug;
        $brands->rating=$request->txtRating;
        $brands->status=$request->txtStatus;
        $brands->deleted_at=$request->txtDeleted_at;
        
        if(isset($request->file_logo)){
            $logoName = (rand(100,1000)).'.'.$request->file_logo->extension();
            $brands->logo=$logoName;
            $request->file_logo->move(public_path('img'),$logoName);
        }
        $brands->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $brandsid=$request->input('d_brands');
		$brands= Brands::find($brandsid);
		$brands->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
