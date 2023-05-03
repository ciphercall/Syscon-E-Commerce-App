<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function showSubCat(Request $request){      

        $subcat = Subcategory::where('category',$request->id)->get();

        $html="<option selected><-----Choose Sub-Category----></option>";

        foreach($subcat as $val){
            $html .='<option value='.$val->id.'>' .$val->sub_categoryname. '</option>';
        }
        return $html;

    }


    public function index()
    {
        $subcategories=Subcategory::all();
        $categories=Category::all();
        $statuses=Status::all();

        $subcategories =DB::table('subcategories')
            ->join('categories','categories.id', '=', 'subcategories.category')
            ->join('statuses','statuses.id', '=', 'subcategories.status')
            ->select('subcategories.*','categories.c_name','statuses.s_name')
            ->get();

        return view("pages.backends.sub-categories.index",["subcategories"=>$subcategories, "categories"=>$categories, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $subcategories=new Subcategory; 
        $subcategories->sub_categoryname=$request->txtSubCategoryName;
        $subcategories->slug=$request->txtSlug;
        $subcategories->icon=$request->txtIcon;
        $subcategories->category=$request->txtCategory;
        $subcategories->status=$request->txtStatus;
        $subcategories->deleted_at=$request->txtDeleted_at;
        $subcategories->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$subcategories=Subcategory::find($id);
		return response()->json([
			'status'=>200,
			'subcategories'=>$subcategories
		]);
	}

    public function update(Request $request,Subcategory $subcategories){
        $subcategoriesid=$request->input('cmbSubcategoriesId');
        $subcategories = Subcategory::find($subcategoriesid);
        $subcategories->id=$request->cmbSubcategoriesId; 
        $subcategories->sub_categoryname=$request->txtSubCategoryName;
        $subcategories->slug=$request->txtSlug;
        $subcategories->icon=$request->txtIcon;
        $subcategories->category=$request->txtCategory;
        $subcategories->status=$request->txtStatus;
        $subcategories->deleted_at=$request->txtDeleted_at;		   
        $subcategories->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $subcategoriesid=$request->input('d_subcategories');
		$subcategories= Subcategory::find($subcategoriesid);
		$subcategories->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
