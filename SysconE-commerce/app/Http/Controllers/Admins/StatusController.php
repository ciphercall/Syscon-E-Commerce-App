<?php

namespace App\Http\Controllers\Admins;

use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses=Status::all();
        return view("pages.backends.status.index",["statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $statuses=new Status; 
        $statuses->s_name=$request->txtName;
        $statuses->deleted_at=$request->txtDeleted_at;
        $statuses->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$statuses=Status::find($id);
		return response()->json([
			'status'=>200,
			'statuses'=>$statuses
		]);
	}


    public function update(Request $request,Status $statuses){
        $statusesid=$request->input('cmbStatusId');
        $statuses = Status::find($statusesid);
        $statuses->id=$request->cmbStatusId; 
        $statuses->s_name=$request->txtName;
        $statuses->deleted_at=$request->txtDeleted_at;		   
        $statuses->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $statusesid=$request->input('d_statuses');
		$statuses= Status::find($statusesid);
		$statuses->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
