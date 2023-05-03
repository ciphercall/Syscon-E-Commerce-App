<?php

namespace App\Http\Controllers\Admins;

use App\Models\Unit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units=Unit::all();
        return view("pages.backends.unit.index",["units"=>$units]);
        
    }

    public function store(Request $request){
        $units=new Unit; 
        $units->unit_name=$request->txtUnitName;
        $units->deleted_at=$request->txtDeleted_at;
        $units->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$units=Unit::find($id);
		return response()->json([
			'status'=>200,
			'units'=>$units
		]);
	}

    public function update(Request $request,Unit $units){
        $unitsid=$request->input('cmbUnitId');
        $units = Unit::find($unitsid);
        $units->id=$request->cmbUnitId; 
        $units->unit_name=$request->txtUnitName;
        $units->deleted_at=$request->txtDeleted_at;		   
        $units->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $unitsid=$request->input('d_units');
		$units= Unit::find($unitsid);
		$units->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
