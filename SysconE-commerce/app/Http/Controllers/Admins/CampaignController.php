<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Campaign;
use App\Models\Status;
use App\Models\Homepageshow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        //$campaign=Campaign::all(); 
        $statuses=Status::all();
        $show=Homepageshow::all();

        $campaign =DB::table('campaigns')
            ->join('statuses','statuses.id', '=', 'campaigns.c_status')
            ->join('homepageshows','homepageshows.id', '=', 'campaigns.show_homepage')
            ->select('statuses.s_name', 'homepageshows.hp_show', 'campaigns.*')
            ->get();
        return view("pages.backends.campaign.index",["campaign"=>$campaign, "statuses"=>$statuses, "show"=>$show]);
        
    }

    public function create()
    {
        $campaign=Campaign::all();
        $statuses=Status::all();
        $show=Homepageshow::all(); 
        return view("pages.backends.campaign.create",["campaign"=>$campaign, "statuses"=>$statuses, "show"=>$show]);
    }

    public function store(Request $request){
        $campaign=new Campaign; 
        $campaign->name=$request->txtName;
        $campaign->slug=$request->txtSlug;
        $campaign->title=$request->txtTitle;
        $campaign->offer=$request->txtOffer;
        $campaign->start_time=$request->txtStartTime;
        $campaign->end_time=$request->txtEndTime;
        $campaign->show_homepage=$request->txtShowHomepage;
        $campaign->c_status=$request->txtStatus;
        $campaign->deleted_at=$request->txtDeleted_at;

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $campaign->img=$imgName;
            $campaign->update();
            $request->file_img->move(public_path('img'),$imgName);
        }
        $campaign->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $campaign=Campaign::find($id);
        $statuses=Status::all();	
        $show=Homepageshow::all();    
        return view("pages.backends.campaign.edit",["campaign"=>$campaign, "statuses"=>$statuses,"show"=>$show]);
		
	}

    public function update(Request $request,$id){
        $campaign = Campaign::find($id);

        if(isset($request->txtName)){
        $campaign->name=$request->txtName;
        }

        if(isset($request->txtSlug)){
        $campaign->slug=$request->txtSlug;
        }

        if(isset($request->txtTitle)){
        $campaign->title=$request->txtTitle;
        }

        if(isset($request->txtOffer)){
        $campaign->offer=$request->txtOffer;
        }

        if(isset($request->txtStartTime)){
        $campaign->start_time=$request->txtStartTime;
        }

        if(isset($request->txtEndTime)){
        $campaign->end_time=$request->txtEndTime;
        }

        if(isset($request->txtShowHomepage)){
        $campaign->show_homepage=$request->txtShowHomepage;
        }

        if(isset($request->txtStatus)){
        $campaign->c_status=$request->txtStatus;
        } 

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $campaign->img=$imgName;
            $request->file_img->move(public_path('img'),$imgName);
        }

        $campaign->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $campaignid=$request->input('d_campaign');
		$campaign= Campaign::find($campaignid);
		$campaign->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
