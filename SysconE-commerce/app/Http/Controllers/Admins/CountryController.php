<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        //$country=Country::all();
        $statuses=Status::all();

        $country =DB::table('countries')
            ->join('statuses','statuses.id', '=', 'countries.status')
            ->select('countries.*','statuses.s_name')
            ->get();
        return view("pages.backends.country.index",["country"=>$country, "statuses"=>$statuses]);
        
    }

    public function store(Request $request){
        $country=new Country; 
        $country->country_name=$request->txtCountryName;
        $country->status=$request->txtStatus;
        $country->deleted_at=$request->txtDeleted_at;
        $country->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$country=Country::find($id);
		return response()->json([
			'status'=>200,
			'country'=>$country
		]);
	}

    public function update(Request $request,Country $country){
        $countryid=$request->input('cmbCountryId');
        $country = Country::find($countryid);
        $country->id=$request->cmbCountryId; 
        $country->country_name=$request->txtCountryName;
        $country->status=$request->txtStatus;
        $country->deleted_at=$request->txtDeleted_at;		   
        $country->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $countryid=$request->input('d_country');
		$country= Country::find($countryid);
		$country->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
