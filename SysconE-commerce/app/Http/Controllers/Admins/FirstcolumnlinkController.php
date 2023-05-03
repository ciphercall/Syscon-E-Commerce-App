<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Firstcolumnlink;
use App\Models\Columnlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirstcolumnlinkController extends Controller
{
    public function index()
    {
        //$firstcolumn=Firstcolumnlink::all();
        $columnlist=Columnlist::all();

        $firstcolumn =DB::table('firstcolumnlinks')
            ->join('columnlists','columnlists.id', '=', 'firstcolumnlinks.column_title')
            ->select('columnlists.column_name', 'firstcolumnlinks.*')
            ->get();
              //dd($firstcolumn);
        return view("pages.backends.first-columnlink.index",["firstcolumn"=>$firstcolumn, "columnlist"=>$columnlist]);
        
    }

    public function store(Request $request){
        $firstcolumn=new Firstcolumnlink; 
        $firstcolumn->column_title=$request->txtColumnTitle;
        $firstcolumn->link_name=$request->txtLinkName;
        $firstcolumn->link=$request->txtLink;
        $firstcolumn->deleted_at=$request->txtDeleted_at;
        $firstcolumn->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$firstcolumn=Firstcolumnlink::find($id);
		return response()->json([
			'status'=>200,
			'firstcolumn'=>$firstcolumn
		]);
	}

    public function update(Request $request,Firstcolumnlink $firstcolumn){
        $firstcolumnid=$request->input('cmbFirstcolumnId');
        $firstcolumn = Firstcolumnlink::find($firstcolumnid);
        $firstcolumn->id=$request->cmbFirstcolumnId; 
        $firstcolumn->column_title=$request->txtColumnTitle;
        $firstcolumn->link_name=$request->txtLinkName;
        $firstcolumn->link=$request->txtLink;
        $firstcolumn->deleted_at=$request->txtDeleted_at;		   
        $firstcolumn->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $firstcolumnid=$request->input('d_firstcolumn');
		$firstcolumn= Firstcolumnlink::find($firstcolumnid);
		$firstcolumn->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
