<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Secondcolumnlink;
use App\Models\Columnlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondcolumnlinkController extends Controller
{
    public function index()
    {
        //$secondcolumn=Secondcolumnlink::all();
        $columnlist=Columnlist::all();

        $secondcolumn =DB::table('secondcolumnlinks')
            ->join('columnlists','columnlists.id', '=', 'secondcolumnlinks.column_title')
            ->select('columnlists.column_name', 'secondcolumnlinks.*')
            ->get();
              //dd($firstcolumn);
        return view("pages.backends.second-columnlink.index",["secondcolumn"=>$secondcolumn, "columnlist"=>$columnlist]);
        
    }

    public function store(Request $request){
        $secondcolumn=new Secondcolumnlink; 
        $secondcolumn->column_title=$request->txtColumnTitle;
        $secondcolumn->link_name=$request->txtLinkName;
        $secondcolumn->link=$request->txtLink;
        $secondcolumn->deleted_at=$request->txtDeleted_at;
        $secondcolumn->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$secondcolumn=Secondcolumnlink::find($id);
		return response()->json([
			'status'=>200,
			'secondcolumn'=>$secondcolumn
		]);
	}

    public function update(Request $request,Secondcolumnlink $secondcolumn){
        $secondcolumnid=$request->input('cmbSecondcolumnId');
        $secondcolumn = Secondcolumnlink::find($secondcolumnid);
        $secondcolumn->id=$request->cmbSecondcolumnId; 
        $secondcolumn->column_title=$request->txtColumnTitle;
        $secondcolumn->link_name=$request->txtLinkName;
        $secondcolumn->link=$request->txtLink;
        $secondcolumn->deleted_at=$request->txtDeleted_at;		   
        $secondcolumn->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $secondcolumnid=$request->input('d_secondcolumn');
		$secondcolumn= Secondcolumnlink::find($secondcolumnid);
		$secondcolumn->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
