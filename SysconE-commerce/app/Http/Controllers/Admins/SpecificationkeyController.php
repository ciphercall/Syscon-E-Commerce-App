<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Specificationkey;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecificationkeyController extends Controller
{
    public function index()
    {
        //$specification=Specificationkey::all(); 
        $statuses=Status::all();

        $specification =DB::table('specificationkeys')
            ->join('statuses','statuses.id', '=', 'specificationkeys.s_status')
            ->select('statuses.s_name', 'specificationkeys.*')
            ->get();
        return view("pages.backends.specification-key.index",["specification"=>$specification, "statuses"=>$statuses]);
        
    }

    public function create()
    {
        $specification=Specificationkey::all();
        $statuses=Status::all(); 
        return view("pages.backends.specification-key.create",["specification"=>$specification, "statuses"=>$statuses]);
    }

    public function store(Request $request){
        $specification=new Specificationkey;
        $specification->key=$request->txtKey;
        $specification->s_status=$request->txtStatus;
        $specification->deleted_at=$request->txtDeleted_at;

        $specification->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $specification=Specificationkey::find($id);
        $statuses=Status::all();	    
        return view("pages.backends.specification-key.edit",["specification"=>$specification, "statuses"=>$statuses]);
		
	}

    public function update(Request $request,$id){
        $specification=Specificationkey::find($id);

        if(isset($request->txtKey)){
        $specification->key=$request->txtKey;
        }

        if(isset($request->txtStatus)){
        $specification->s_status=$request->txtStatus;
        }

        $specification->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $specificationid=$request->input('d_specification');
		$specification= Specificationkey::find($specificationid);
		$specification->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
