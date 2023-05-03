<?php

namespace App\Http\Controllers\Admins;

use App\Models\Timezone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimezoneController extends Controller
{
    public function index()
    {
        $timezone=Timezone::all();
        return view("pages.backends.timezone.index",["timezone"=>$timezone]);
        
    }

    public function store(Request $request){
        $timezone=new Timezone; 
        $timezone->time_zone=$request->txtTimezone;
        $timezone->deleted_at=$request->txtDeleted_at;
        $timezone->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$timezone=Timezone::find($id);
		return response()->json([
			'status'=>200,
			'timezone'=>$timezone
		]);
	}

    public function update(Request $request,Timezone $timezone){
        $timezoneid=$request->input('cmbTimezoneId');
        $timezone = Timezone::find($timezoneid);
        $timezone->id=$request->cmbTimezoneId; 
        $timezone->time_zone=$request->txtTimezone;
        $timezone->deleted_at=$request->txtDeleted_at;		   
        $timezone->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $timezoneid=$request->input('d_timezone');
		$timezone= Timezone::find($timezoneid);
		$timezone->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
