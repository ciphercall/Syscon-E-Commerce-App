<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Menuvisibility;
use App\Models\Submenu;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
    public function index()
    {
        $menuvisibility=Menuvisibility::all();
        $statuses=Status::all();
        
        $submenu =DB::table('submenus')
        ->join('statuses','statuses.id', '=', 'submenus.status')
        ->join('menuvisibilities','menuvisibilities.id', '=', 'submenus.menu_id')
        ->select('submenus.*','statuses.s_name','menuvisibilities.menu_name')
        ->get();
              //dd($homepage);
        return view("pages.backends.sub-menu.index",["submenu"=>$submenu, "menuvisibility"=>$menuvisibility, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $submenu=new Submenu; 
        $submenu->menu_id=$request->txtMenuId;
        $submenu->submenu_name=$request->txtSubMenuName;
        $submenu->slug=$request->txtSlug;
        $submenu->serial_no=$request->txtSerialNo;
        $submenu->status=$request->txtStatus;
        $submenu->deleted_at=$request->txtDeleted_at;
        $submenu->save();
  
        return back()->with('success','Created Successfully.');     
    }

    public function edit($id){
        $submenu=Submenu::find($id);
        return response()->json([
          'status'=>200,
          'submenu'=>$submenu
        ]);
    }


    public function update(Request $request,Submenu $submenu){
        $submenuid=$request->input('cmbSubmenuId');
        $submenu = Submenu::find($submenuid);
        $submenu->id=$request->cmbSubmenuId; 
        $submenu->menu_id=$request->txtMenuId;
        $submenu->submenu_name=$request->txtSubMenuName;
        $submenu->slug=$request->txtSlug;
        $submenu->serial_no=$request->txtSerialNo;
        $submenu->status=$request->txtStatus;
        $submenu->deleted_at=$request->txtDeleted_at;		   
        $submenu->update();
        return redirect()->back()
        ->with('success',' Updated successfully');              
    }


    public function destroy(Request $request){  
        $submenuid=$request->input('d_submenu');
        $submenu= Submenu::find($submenuid);
        $submenu->delete();
  
        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
