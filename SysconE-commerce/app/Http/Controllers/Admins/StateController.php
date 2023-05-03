<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\State;
use App\Models\Country;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function showState(Request $request){      

        $state = State::where('country',$request->id)->get();

        $html="<option selected><-----Choose State----></option>";

        foreach($state as $val){
            $html .='<option value='.$val->id.'>' .$val->state_name. '</option>';
        }
        return $html;

    }

    public function index()
    {
        $country=Country::all();
        $statuses=Status::all();

        $state =DB::table('states')
            ->join('statuses','statuses.id', '=', 'states.status')
            ->join('countries','countries.id', '=', 'states.country')
            ->select('states.*','statuses.s_name','countries.country_name')
            ->get();
        return view("pages.backends.state.index",[ "state"=>$state, "country"=>$country, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $state=new State; 
        $state->country=$request->txtCountry;
        $state->state_name=$request->txtStateName;
        $state->status=$request->txtStatus;
        $state->deleted_at=$request->txtDeleted_at;
        $state->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$state=State::find($id);
		return response()->json([
			'status'=>200,
			'state'=>$state
		]);
	}

    public function update(Request $request,State $state){
        $stateid=$request->input('cmbStateId');
        $state = State::find($stateid);
        $state->id=$request->cmbStateId; 
        $state->country=$request->txtCountry;
        $state->state_name=$request->txtStateName;
        $state->status=$request->txtStatus;
        $state->deleted_at=$request->txtDeleted_at;		   
        $state->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $stateid=$request->input('d_state');
		$state= State::find($stateid);
		$state->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
