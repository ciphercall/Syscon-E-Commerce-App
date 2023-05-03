<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Homepage;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $homepage=Homepage::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        
        $homepage =DB::table('homepages')
        ->join('categories','categories.id', '=', 'homepages.category1')
        ->join('subcategories','subcategories.id', '=', 'homepages.sub_category1')
        ->join('childcategories','childcategories.id', '=', 'homepages.child_category1')
        ->select('homepages.*','categories.c_name','subcategories.sub_categoryname','childcategories.child_category')
        ->get();
              //dd($homepage);
        return view("pages.backends.home-page.index",["homepage"=>$homepage, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories]);
        
    }

    public function edit($id){
        $homepage=Homepage::find($id);
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        return view("pages.backends.home-page.index",["homepage"=>$homepage, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories]);
		
	}

    public function update(Request $request,$id){
        $homepage = Homepage::find($id);

        if(isset($request->txtSectionTitle)){
          $homepage->s_title=$request->txtSectionTitle;
        }

        if(isset($request->txtProductQuentaty)){
          $homepage->product_qty=$request->txtProductQuentaty;
        }

        if(isset($request->txtCategory1)){
          $homepage->category1=$request->txtCategory1;
        }

        if(isset($request->txtSubCategory1)){
          $homepage->sub_category1=$request->txtSubCategory1;
        }

        if(isset($request->txtChildCategory1)){
          $homepage->child_category1=$request->txtChildCategory1;
        }

        if(isset($request->txtCategory2)){
            $homepage->category2=$request->txtCategory2;
        }
  
        if(isset($request->txtSubCategory2)){
            $homepage->sub_category2=$request->txtSubCategory2;
        }
  
        if(isset($request->txtChildCategory2)){
            $homepage->child_category2=$request->txtChildCategory2;
        }

        if(isset($request->txtCategory3)){
            $homepage->category3=$request->txtCategory3;
        }
  
        if(isset($request->txtSubCategory3)){
            $homepage->sub_category3=$request->txtSubCategory3;
        }
  
        if(isset($request->txtChildCategory3)){
            $homepage->child_category3=$request->txtChildCategory3;
        }
        
        if(isset($request->txtCategory4)){
            $homepage->category4=$request->txtCategory4;
        }
  
        if(isset($request->txtSubCategory4)){
            $homepage->sub_category4=$request->txtSubCategory4;
        }
  
        if(isset($request->txtChildCategory4)){
            $homepage->child_category4=$request->txtChildCategory4;
        }

        $homepage->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
