<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $country=Country::all();
        $state=State::all();
        $statuses=Status::all();

        $cities =DB::table('cities')
            ->join('statuses','statuses.id', '=', 'cities.status')
            ->join('states','states.id', '=', 'cities.state')
            ->join('countries','countries.id', '=', 'cities.country')
            ->select('cities.*','statuses.s_name','countries.country_name','states.state_name')
            ->get();
        return view("pages.backends.city.index",[ "cities"=>$cities, "state"=>$state, "country"=>$country, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $cities=new City; 
        $cities->country=$request->txtCountry;
        $cities->state=$request->txtState;
        $cities->city_name=$request->txtCityName;
        $cities->status=$request->txtStatus;
        $cities->deleted_at=$request->txtDeleted_at;
        $cities->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$cities=City::find($id);
		return response()->json([
			'status'=>200,
			'cities'=>$cities
		]);
	}

    public function update(Request $request,City $cities){
        $citiesid=$request->input('cmbCityId');
        $cities = City::find($citiesid);
        $cities->id=$request->cmbCityId; 
        $cities->country=$request->txtCountry;
        $cities->state=$request->txtState;
        $cities->city_name=$request->txtCityName;
        $cities->status=$request->txtStatus;
        $cities->deleted_at=$request->txtDeleted_at;		   
        $cities->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $citiesid=$request->input('d_cities');
		$cities= State::find($citiesid);
		$cities->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
