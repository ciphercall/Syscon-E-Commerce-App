<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Sociallink;
use App\Models\Columnlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SociallinkController extends Controller
{
    public function index()
    {
        //$sociallink=Sociallink::all();
        $columnlist=Columnlist::all();

        $sociallink =DB::table('sociallinks')
            ->join('columnlists','columnlists.id', '=', 'sociallinks.column_title')
            ->select('columnlists.column_name', 'sociallinks.*')
            ->get();
              //dd($sociallink);
        return view("pages.backends.social-link.index",["sociallink"=>$sociallink, "columnlist"=>$columnlist]);
        
    }

    public function store(Request $request){
        $sociallink=new Sociallink; 
        $sociallink->column_title=$request->txtColumnTitle;
        $sociallink->social_link=$request->txtSocialLink;
        $sociallink->social_icon=$request->txtSocialIcon;
        $sociallink->deleted_at=$request->txtDeleted_at;
        $sociallink->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$sociallink=Sociallink::find($id);
		return response()->json([
			'status'=>200,
			'sociallink'=>$sociallink
		]);
	}

    public function update(Request $request,Sociallink $sociallink){
        $sociallinkid=$request->input('cmbSociallinkId');
        $sociallink = Sociallink::find($sociallinkid);
        $sociallink->id=$request->cmbSociallinkId; 
        $sociallink->column_title=$request->txtColumnTitle;
        $sociallink->social_link=$request->txtSocialLink;
        $sociallink->social_icon=$request->txtSocialIcon;
        $sociallink->deleted_at=$request->txtDeleted_at;		   
        $sociallink->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $sociallinkid=$request->input('d_sociallink');
		$sociallink= Sociallink::find($sociallinkid);
		$sociallink->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
