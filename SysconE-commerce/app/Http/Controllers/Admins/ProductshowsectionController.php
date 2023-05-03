<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Productshowsection;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductshowsectionController extends Controller
{
    public function index()
    {
        //$section=Productshowsection::all();
        $statuses=Status::all();

        $section =DB::table('productshowsections')
            ->join('statuses','statuses.id', '=', 'productshowsections.status')
            ->select('statuses.s_name', 'productshowsections.*')
            ->get();
        return view("pages.backends.product-section.index",["section"=>$section, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $section=new Productshowsection; 
        $section->section_name=$request->txtSectionName;
        $section->status=$request->txtStatus;
        $section->deleted_at=$request->txtDeleted_at;
        $section->save();
               
        return back()->with('success','Created Successfully.');
          
    }


    public function edit($id){
		$section=Productshowsection::find($id);
		return response()->json([
			'status'=>200,
			'section'=>$section
		]);
	}


    public function update(Request $request,Productshowsection $section){
        $sectionid=$request->input('cmbSectionId');
        $section = Productshowsection::find($sectionid);
        $section->id=$request->cmbSectionId; 
        $section->section_name=$request->txtSectionName;
        $section->status=$request->txtStatus;
        $section->deleted_at=$request->txtDeleted_at;		   
        $section->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $sectionid=$request->input('d_section');
		$section= Productshowsection::find($sectionid);
		$section->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
