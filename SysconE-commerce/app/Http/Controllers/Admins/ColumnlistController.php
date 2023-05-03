<?php

namespace App\Http\Controllers\Admins;

use App\Models\Columnlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColumnlistController extends Controller
{
    public function index()
    {
        $columnlist=Columnlist::all();
        return view("pages.backends.column-list.index",["columnlist"=>$columnlist]);
        
    }

    public function store(Request $request){
        $columnlist=new Columnlist; 
        $columnlist->column_name=$request->txtColumnName;
        $columnlist->slug=$request->txtSlug;
        $columnlist->deleted_at=$request->txtDeleted_at;
        $columnlist->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$columnlist=Columnlist::find($id);
		return response()->json([
			'status'=>200,
			'columnlist'=>$columnlist
		]);
	}

    public function update(Request $request,Columnlist $columnlist){
        $columnlistid=$request->input('cmbColumnlistId');
        $columnlist = Columnlist::find($columnlistid);
        $columnlist->id=$request->cmbColumnlistId; 
        $columnlist->column_name=$request->txtColumnName;
        $columnlist->slug=$request->txtSlug;
        $columnlist->deleted_at=$request->txtDeleted_at;		   
        $columnlist->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $columnlistid=$request->input('d_columnlist');
		$columnlist= Columnlist::find($columnlistid);
		$columnlist->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
