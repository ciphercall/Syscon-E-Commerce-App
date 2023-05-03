<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Tax;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        //$tax=Tax::all(); 
        $statuses=Status::all();

        $tax =DB::table('taxes')
            ->join('statuses','statuses.id', '=', 'taxes.t_status')
            ->select('statuses.s_name', 'taxes.*')
            ->get();
        return view("pages.backends.tax.index",["tax"=>$tax, "statuses"=>$statuses]);
        
    }

    public function create()
    {
        $tax=Tax::all();
        $statuses=Status::all(); 
        return view("pages.backends.tax.create",["tax"=>$tax, "statuses"=>$statuses]);
    }

    public function store(Request $request){
        $tax=new Tax;
        $tax->title=$request->txtTitle;
        $tax->price=$request->txtPrice;
        $tax->t_status=$request->txtStatus;
        $tax->deleted_at=$request->txtDeleted_at;

        $tax->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $tax=Tax::find($id);
        $statuses=Status::all();	    
        return view("pages.backends.tax.edit",["tax"=>$tax, "statuses"=>$statuses]);	
	}

    public function update(Request $request,$id){
        $tax=Tax::find($id);

        if(isset($request->txtTitle)){
        $tax->title=$request->txtTitle;
        }

        if(isset($request->txtPrice)){
        $tax->price=$request->txtPrice;
        }

        if(isset($request->txtStatus)){
        $tax->t_status=$request->txtStatus;
        }

        $tax->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $taxid=$request->input('d_tax');
		$tax= Tax::find($taxid);
		$tax->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
