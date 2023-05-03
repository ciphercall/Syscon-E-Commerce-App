<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Homevisibility;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomevisibilityController extends Controller
{
    public function index()
    {
        $homevisibility=Homevisibility::all();
        $status=Status::all();
        
        $homevisibility =DB::table('homevisibilities')
        ->join('status','status.id', '=', 'homevisibilities.id')
        ->select('homevisibilities.*','status.s_name')
        ->get();
              //dd($homevisibility);
        return view("pages.backends.home-visibility.index",["homevisibility"=>$homevisibility, "status"=>$status]);
        
    }

    public function edit($id){
        $homevisibility=Homevisibility::find($id);
        $status=Status::all();
        return view("pages.backends.home-visibility.index",["homevisibility"=>$homevisibility, "status"=>$status]);	
	}


    
    public function update(Request $request,$id){
        $homevisibility = Homevisibility::find($id);

        if(isset($request->txtSliderStatus)){
          $homevisibility->slider_status=1;
        }else{
            $homevisibility->slider_status=2;
        }
//dd($request->txtSliderStatus);

        if(isset($request->txtSliderQuentaty)){
          $homevisibility->slider_quantity=$request->txtSliderQuentaty;
        }

        if(isset($request->txtBrandStatus)){
            $homevisibility->brand_status=1;
        }else{
            $homevisibility->brand_status=2;
        }

        if(isset($request->txtBrandQuantity)){
          $homevisibility->brand_quantity=$request->txtBrandQuantity;
        }

        if(isset($request->txtCampaignStatus)){
            $homevisibility->campaign_status=1;
        }else{
            $homevisibility->campaign_status=2;
        }

        if(isset($request->txtCampaignQuantity)){
            $homevisibility->campaign_quantity=$request->txtCampaignQuantity;
        }
  
        if(isset($request->txtProductCategoryStatus)){
            $homevisibility->p_category_status=$request->txtProductCategoryStatus;
        }
  
        if(isset($request->txtFirstBannerStatus)){
            $homevisibility->first_banner_status=$request->txtFirstBannerStatus;
        }

        if(isset($request->txtFlashStatus)){
            $homevisibility->flash_status=$request->txtFlashStatus;
        }
  
        if(isset($request->txtFlashQuantity)){
            $homevisibility->flash_quantity=$request->txtFlashQuantity;
        }
  
        if(isset($request->txtProductStatus)){
            $homevisibility->product_status=$request->txtProductStatus;
        }
        
        if(isset($request->txtProductQuantity)){
            $homevisibility->product_quantity=$request->txtProductQuantity;
        }
  
        if(isset($request->txtSecondBannerStatus)){
            $homevisibility->second_banner_status=$request->txtSecondBannerStatus;
        }
  
        if(isset($request->txtColCategoryStatus)){
            $homevisibility->col_category_status=$request->txtColCategoryStatus;
        }

        if(isset($request->txtColCategoryQuantity)){
            $homevisibility->col_category_quantity=$request->txtColCategoryQuantity;
        }

        if(isset($request->txtThirdBannerStatus)){
            $homevisibility->third_banner_status=$request->txtThirdBannerStatus;
        }

        if(isset($request->txtServiceStatus)){
            $homevisibility->service_status=$request->txtServiceStatus;
        }

        if(isset($request->txtServiceQuantity)){
            $homevisibility->service_quantity=$request->txtServiceQuantity;
        }

        if(isset($request->txtBlogStatus)){
            $homevisibility->blog_status=$request->txtBlogStatus;
        }

        if(isset($request->txtBlogQuantity)){
            $homevisibility->blog_quantity=$request->txtBlogQuantity;
        }

        $homevisibility->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
