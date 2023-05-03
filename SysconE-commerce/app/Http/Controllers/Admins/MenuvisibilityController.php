<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Menuvisibility;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuvisibilityController extends Controller
{
    public function index()
    {
        $menuvisibility=Menuvisibility::all();
        $statuses=Status::all();
        
        $menuvisibility =DB::table('menuvisibilities')
        ->join('statuses','statuses.id', '=', 'menuvisibilities.visibility_status')
        ->select('menuvisibilities.*','statuses.s_name')
        ->get();
              //dd($homepage);
        return view("pages.backends.menu-visibility.index",["menuvisibility"=>$menuvisibility, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
      $menuvisibility=new Menuvisibility; 
      $menuvisibility->menu_name=$request->txtMenuName;
      $menuvisibility->slug=$request->txtSlug;
      $menuvisibility->serial_no=$request->txtSerialNo;
      $menuvisibility->visibility_status=$request->txtVisibilityStatus;
      $menuvisibility->deleted_at=$request->txtDeleted_at;
      $menuvisibility->save();

      return back()->with('success','Created Successfully.');     
    }

    public function edit($id){
      $menuvisibility=Menuvisibility::find($id);
      return response()->json([
        'status'=>200,
        'menuvisibility'=>$menuvisibility
      ]);
    }

    public function update(Request $request,Menuvisibility $menuvisibility){
      $menuvisibilityid=$request->input('cmbMenuvisibilityId');
      $menuvisibility = Menuvisibility::find($menuvisibilityid);
      $menuvisibility->id=$request->cmbMenuvisibilityId; 
      $menuvisibility->menu_name=$request->txtMenuName;
      $menuvisibility->slug=$request->txtSlug;
      $menuvisibility->serial_no=$request->txtSerialNo;
      $menuvisibility->visibility_status=$request->txtVisibilityStatus;
      $menuvisibility->deleted_at=$request->txtDeleted_at;		   
      $menuvisibility->update();
      return redirect()->back()
      ->with('success',' Updated successfully');              
    }

    public function destroy(Request $request){  
      $menuvisibilityid=$request->input('d_menuvisibility');
      $menuvisibility= Menuvisibility::find($menuvisibilityid);
      $menuvisibility->delete();

      return redirect()->back()
      ->with('success',' Deleted successfully');
    }
}
