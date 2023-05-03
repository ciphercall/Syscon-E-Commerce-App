<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\submegamenu;
use App\Models\Category;
use App\Models\Megamenu;
use App\Models\Subcategory;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmegamenuController extends Controller
{
    public function showSubCat(Request $request){      

        $subcat = Subcategory::where('singlecategories',$request->id)->get();

        $html="<option selected><-----Choose Sub-Category----></option>";

        foreach($subcat as $val){
            $html .='<option value='.$val->id.'>' .$val->sub_categoryname. '</option>';
        }
        return $html;
    }


    public function index($id)
    {
        $singleMegamenu = Megamenu::find($id);
        $singlecategories=Category::find($singleMegamenu->megamenu_category);
        //$megamenu=Megamenu::all();
        $categories=Category::all(); 
        $subcategories=Subcategory::all(); 
        $statuses=Status::all(); 

        $submegamenu =DB::table('submegamenus')
            ->join('subcategories','subcategories.id', '=', 'submegamenus.submegamenu_category')
            ->join('statuses','statuses.id', '=', 'submegamenus.status')
            ->select('statuses.s_name', 'subcategories.sub_categoryname', 'submegamenus.*')
            ->where('submegamenus.megamenu_id',$id)
            ->get();
        return view("pages.backends.sub-megamenu.index",["submegamenu"=>$submegamenu,"add_id"=>$id, "singlecategories"=>$singlecategories, "subcategories"=>$subcategories, "statuses"=>$statuses]);
        
    }

    
    public function SubCreate($id)  
    {
        $singleMegamenu = Megamenu::find($id);
        $singlecategories=Category::find($singleMegamenu->megamenu_category);
        //megamenu_category
        $submegamenu=Submegamenu::join('subcategories','subcategories.id','=','submegamenus.submegamenu_category')
        ->select('subcategories.sub_categoryname','submegamenus.*')
        ->where('submegamenus.submegamenu_category',$singlecategories->id)
        ->first();
         $subcategories=Subcategory::where('category',$singlecategories->id)->get();
        // $categories=Category::all();
        $statuses=Status::all(); 
        // $megamenu=Megamenu::all();
       // dd($singlecategories->id);
        return view("pages.backends.sub-megamenu.create",["megaId"=>$id,"subcategories"=>$subcategories,"submegamenu"=>$submegamenu, "singlecategories"=>$singlecategories,"statuses"=>$statuses]);
    }


    public function store(Request $request){
        $submegamenu=new Submegamenu; 
        $submegamenu->megamenu_id=$request->input('cmbSubmegamenuId');
        $submegamenu->submegamenu_category=$request->txtSubMegamenuCategory;
        $submegamenu->serial=$request->txtSerial;
        $submegamenu->status=$request->txtStatus;

        $submegamenu->save(); 
        //dd($submegamenu);       
        return back()->with('success','Created Successfully.');
          
    }


    public function show($id){
        
        $statuses=Status::all();
        $megamenu = Megamenu::where('id',$id)->first();
        $submegamenu=Submegamenu::where('megamenu_id',$id)->get();
        $submegamenu=Submegamenu::where('submegamenu_category',$id)
            ->join('subcategories','subcategories.id', '=', 'submegamenus.submegamenu_category')
            ->select('subcategories.sub_categoryname', 'submegamenus.*') 
            ->get();
        //dd($submegamenu);
        return view("pages.backends.sub-megamenu.index",["submegamenu"=>$submegamenu, "megamenu"=>$megamenu, "statuses"=>$statuses]);

    }



    public function edit($id){
        $submegamenu=Submegamenu::find($id);
        $statuses=Status::all();
        $subcategories=Subcategory::all();	    
        return view("pages.backends.sub-megamenu.edit",["submegamenu"=>$submegamenu, "subcategories"=>$subcategories, "statuses"=>$statuses]);
		
	}



    public function update(Request $request,$id){
        $submegamenu = Submegamenu::find($id);

        if(isset($request->txtSubMegamenuCategory)){
          $submegamenu->submegamenu_category=$request->txtSubMegamenuCategory;
        }

        if(isset($request->txtSerial)){
          $submegamenu->serial=$request->txtSerial;
        }

        if(isset($request->txtStatus)){
          $submegamenu->status=$request->txtStatus;
        }

        $submegamenu->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }

    public function destroy(Request $request){  
        $submegamenuid=$request->input('d_submegamenu');
		$submegamenu= Submegamenu::find($submegamenuid);
		$submegamenu->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }

}
