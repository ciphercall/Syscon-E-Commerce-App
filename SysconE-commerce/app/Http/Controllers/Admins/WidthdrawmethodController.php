<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Widthdrawmethod;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WidthdrawmethodController extends Controller
{
    public function index()
    {
        //$widthdraw=Widthdrawmethod::all(); 
        $statuses=Status::all();

        $widthdraw =DB::table('widthdrawmethods')
            ->join('statuses','statuses.id', '=', 'widthdrawmethods.widthdraw_status')
            ->select('statuses.s_name', 'widthdrawmethods.*')
            ->get();
        return view("pages.backends.widthdraw-method.index",["widthdraw"=>$widthdraw, "statuses"=>$statuses]);
        
    }

    public function create()
    {
        $widthdraw=Widthdrawmethod::all();
        $statuses=Status::all(); 
        return view("pages.backends.widthdraw-method.create",["widthdraw"=>$widthdraw, "statuses"=>$statuses]);
    }

    public function store(Request $request){
        $widthdraw=new Widthdrawmethod; 
        $widthdraw->w_name=$request->txtWidthdrawName;
        $widthdraw->w_min_amount=$request->txtWidthdrawMin;
        $widthdraw->w_max_amount=$request->txtWidthdrawMax;
        $widthdraw->widthdraw_charge=$request->txtWidthdrawCharge;
        $widthdraw->widthdraw_detail=$request->txtWidthdrawDetail;
        $widthdraw->widthdraw_status=$request->txtStatus;
        $widthdraw->deleted_at=$request->txtDeleted_at;

        $widthdraw->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $widthdraw=Widthdrawmethod::find($id);
        $statuses=Status::all();	    
        return view("pages.backends.widthdraw-method.edit",["widthdraw"=>$widthdraw, "statuses"=>$statuses]);
		
	}

    public function update(Request $request,$id){
        $widthdraw = Widthdrawmethod::find($id);

        if(isset($request->txtWidthdrawName)){
        $widthdraw->w_name=$request->txtWidthdrawName;
        }

        if(isset($request->txtWidthdrawMin)){
        $widthdraw->w_min_amount=$request->txtWidthdrawMin;
        }

        if(isset($request->txtWidthdrawMax)){
        $widthdraw->w_max_amount=$request->txtWidthdrawMax;
        }

        if(isset($request->txtWidthdrawCharge)){
        $widthdraw->widthdraw_charge=$request->txtWidthdrawCharge;
        }

        if(isset($request->txtWidthdrawDetail)){
        $widthdraw->widthdraw_detail=$request->txtWidthdrawDetail;
        }

        if(isset($request->txtStatus)){
        $widthdraw->widthdraw_status=$request->txtStatus;
        } 

        $widthdraw->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $widthdrawid=$request->input('d_widthdraw');
		$widthdraw= Widthdrawmethod::find($widthdrawid);
		$widthdraw->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
