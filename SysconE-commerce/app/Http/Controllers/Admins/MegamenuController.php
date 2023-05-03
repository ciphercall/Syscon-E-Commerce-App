<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Megamenu;
use App\Models\Category;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MegamenuController extends Controller
{
    public function index()
    {
        //$megamenu=Megamenu::all();
        $categories=Category::all(); 
        $statuses=Status::all(); 
        $megamenu =DB::table('megamenus')
            ->join('categories','categories.id', '=', 'megamenus.megamenu_category')
            ->join('statuses','statuses.id', '=', 'megamenus.status')
            ->select('statuses.s_name', 'categories.c_name', 'megamenus.*')
            ->get();

        return view("pages.backends.mega-menu.index",["megamenu"=>$megamenu, "categories"=>$categories, "statuses"=>$statuses]);
        
    }

    public function create()
    {
        $megamenu=Megamenu::all();
        $categories=Category::all();
        $statuses=Status::all(); 
        return view("pages.backends.mega-menu.create",["megamenu"=>$megamenu, "categories"=>$categories, "statuses"=>$statuses]);
    }

    public function store(Request $request){
        $megamenu=new Megamenu; 
        $megamenu->megamenu_category=$request->txtMegamenuCategory;
        $megamenu->serial=$request->txtSerial;
        $megamenu->status=$request->txtStatus;
        $megamenu->deleted_at=$request->txtDeleted_at;

        $megamenu->save();        
        return back()->with('success','Created Successfully.');
          
    }



    public function edit($id){
        $megamenu=Megamenu::find($id);
        $statuses=Status::all();
        $categories=Category::all();	    
        return view("pages.backends.mega-menu.edit",["megamenu"=>$megamenu, "categories"=>$categories, "statuses"=>$statuses]);
		
	}



    public function update(Request $request,$id){
        $megamenu = Megamenu::find($id);

        if(isset($request->txtMegamenuCategory)){
          $megamenu->megamenu_category=$request->txtMegamenuCategory;
        }

        if(isset($request->txtSerial)){
          $megamenu->serial=$request->txtSerial;
        }

        if(isset($request->txtStatus)){
          $megamenu->status=$request->txtStatus;
        }

        $megamenu->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }

    public function destroy(Request $request){  
        $megamenuid=$request->input('d_megamenu');
		$megamenu= Megamenu::find($megamenuid);
		$megamenu->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
