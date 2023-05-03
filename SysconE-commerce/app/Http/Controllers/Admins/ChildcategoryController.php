<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Childcategory;
use App\Models\Category;
use App\Models\Status;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChildcategoryController extends Controller
{
    public function index()
    {

        $childcategories=Childcategory::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $statuses=Status::all();



         $childcategories =DB::table('childcategories')
             ->join('subcategories','subcategories.id', '=', 'childcategories.sub_category')
             ->join('categories','categories.id', '=', 'childcategories.category')
             ->join('statuses','statuses.id', '=', 'childcategories.status')
             ->select('childcategories.*','categories.c_name','subcategories.sub_categoryname','statuses.s_name')
             ->get();

             
        return view("pages.backends.child-categories.index",["childcategories"=>$childcategories, "categories"=>$categories, "subcategories"=>$subcategories, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $childcategories=new Childcategory; 
        $childcategories->child_category=$request->txtChildCategory;
        $childcategories->slug=$request->txtSlug;
        $childcategories->icon=$request->txtIcon;
        $childcategories->sub_category=$request->txtSubcategory;
        $childcategories->category=$request->txtCategory;
        $childcategories->status=$request->txtStatus;
        $childcategories->deleted_at=$request->txtDeleted_at;
        $childcategories->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$childcategories=Childcategory::find($id);
		return response()->json([
			'status'=>200,
			'childcategories'=>$childcategories
		]);
	}

    public function update(Request $request,Childcategory $childcategories){
        $childcategoriesid=$request->input('cmbChildcategoriesId');
        $childcategories = Childcategory::find($childcategoriesid);
        $childcategories->id=$request->cmbChildcategoriesId; 
        $childcategories->child_category=$request->txtChildCategory;
        $childcategories->slug=$request->txtSlug;
        $childcategories->icon=$request->txtIcon;
        $childcategories->sub_category=$request->txtSubcategory;
        $childcategories->category=$request->txtCategory;
        $childcategories->status=$request->txtStatus;
        $childcategories->deleted_at=$request->txtDeleted_at;		   
        $childcategories->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $childcategoriesid=$request->input('d_childcategories');
		$childcategories= Childcategory::find($childcategoriesid);
		$childcategories->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
