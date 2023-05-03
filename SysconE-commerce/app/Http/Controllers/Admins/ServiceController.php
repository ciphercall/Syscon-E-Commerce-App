<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
 
        $statuses=Status::all();

        $service =DB::table('services')
            ->join('statuses','statuses.id', '=', 'services.status')
            ->select('statuses.s_name', 'services.*')
            ->get();
        return view("pages.backends.service.index",["service"=>$service, "statuses"=>$statuses]);
        
    }

    public function create()
    {
        $service=Service::all();
        $statuses=Status::all(); 
        return view("pages.backends.service.create",["service"=>$service, "statuses"=>$statuses]);
    }

    public function store(Request $request){
        $service=new Service; 
        $service->s_title=$request->txtServiceTitle;
        $service->s_icon=$request->txtServiceIcon;
        $service->s_description=$request->txtDescription;
        $service->status=$request->txtStatus;
        $service->deleted_at=$request->txtDeleted_at;

        
        $service->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $service=Service::find($id);
        $statuses=Status::all();	    
        return view("pages.backends.service.edit",["service"=>$service, "statuses"=>$statuses]);
		
	}


    public function update(Request $request,$id){
        $service=Service::find($id);

        if(isset($request->txtServiceName)){
        $service->s_title=$request->txtServiceName;
        }

        if(isset($request->txtServiceIcon)){
        $service->s_icon=$request->txtServiceIcon;
        }

        if(isset($request->txtDescription)){
        $service->s_description=$request->txtDescription;
        }

        if(isset($request->txtStatus)){
        $service->status=$request->txtStatus;
        }

        $service->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $serviceid=$request->input('d_service');
		$service= Service::find($serviceid);
		$service->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
