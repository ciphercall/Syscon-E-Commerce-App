<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $statuses=Status::all();

        $categories =DB::table('categories')
            ->join('statuses','statuses.id', '=', 'categories.status')
            ->select('statuses.s_name', 'categories.*')
            ->get();
        return view("pages.backends.categories.index",["categories"=>$categories, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $categories=new Category; 
        $categories->c_name=$request->txtName;
        $categories->slug=$request->txtSlug;
        $categories->icon=$request->txtIcon;
        $categories->status=$request->txtStatus;
        $categories->deleted_at=$request->txtDeleted_at;
        $categories->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$categories=Category::find($id);
		return response()->json([
			'status'=>200,
			'categories'=>$categories
		]);
	}


    public function update(Request $request,Category $categories){
        $categoriesid=$request->input('cmbCategoriesId');
        $categories = Category::find($categoriesid);
        $categories->id=$request->cmbCategoriesId; 
        $categories->c_name=$request->txtName;
        $categories->slug=$request->txtSlug;
        $categories->icon=$request->txtIcon;
        $categories->status=$request->txtStatus;
        $categories->deleted_at=$request->txtDeleted_at;		   
        $categories->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $categoriesid=$request->input('d_categories');
		$categories= Category::find($categoriesid);
		$categories->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
