<?php

namespace App\Http\Controllers\Admins;

use App\Models\Homepageshow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageshowController extends Controller
{
    public function index()
    {
        $show=Homepageshow::all();
        return view("pages.backends.homepage-show.index",["show"=>$show]);
        
    }

    public function store(Request $request){
        $show=new Homepageshow; 
        $show->hp_show=$request->txtHomepageShow;
        $show->deleted_at=$request->txtDeleted_at;
        $show->save();         
        return back()->with('success','Created Successfully.');      
    }

    public function edit($id){
		$show=Homepageshow::find($id);
		return response()->json([
			'status'=>200,
			'show'=>$show
		]);
	}

    public function update(Request $request,Homepageshow $show){
        $showid=$request->input('cmbHomepageId');
        $show = Homepageshow::find($showid);
        $show->id=$request->cmbHomepageId; 
        $show->hp_show=$request->txtHomepageShow;
        $show->deleted_at=$request->txtDeleted_at;		   
        $show->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $showid=$request->input('d_show');
		$show= Homepageshow::find($showid);
		$show->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }

}
