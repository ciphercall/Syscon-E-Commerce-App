<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Returnpolicy;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnpolicyController extends Controller
{
    public function index()
    {
        //$policy=Returnpolicy::all(); 
        $statuses=Status::all();

        $policy =DB::table('returnpolicies')
            ->join('statuses','statuses.id', '=', 'returnpolicies.policy_status')
            ->select('statuses.s_name', 'returnpolicies.*')
            ->get();
        return view("pages.backends.return-policy.index",["policy"=>$policy, "statuses"=>$statuses]);
        
    }

    public function create()
    {
        $policy=Returnpolicy::all();
        $statuses=Status::all(); 
        return view("pages.backends.return-policy.create",["policy"=>$policy, "statuses"=>$statuses]);
    }

    public function store(Request $request){
        $policy=new Returnpolicy; 
        $policy->policy_title=$request->txtPolicyTitle;
        $policy->policy_detail=$request->txtPolicyDetails;
        $policy->policy_status=$request->txtStatus;
        $policy->deleted_at=$request->txtDeleted_at;

        $policy->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $policy=Returnpolicy::find($id);
        $statuses=Status::all();	    
        return view("pages.backends.return-policy.edit",["policy"=>$policy, "statuses"=>$statuses]);
		
	}

    public function update(Request $request,$id){
        $policy = Returnpolicy::find($id);

        if(isset($request->txtPolicyTitle)){
        $policy->policy_title=$request->txtPolicyTitle;
        }

        if(isset($request->txtPolicyDetails)){
        $policy->policy_detail=$request->txtPolicyDetails;
        }

        if(isset($request->txtStatus)){
        $policy->policy_status=$request->txtStatus;
        } 

        $policy->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $policyid=$request->input('d_policy');
		$policy= Returnpolicy::find($policyid);
		$policy->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
