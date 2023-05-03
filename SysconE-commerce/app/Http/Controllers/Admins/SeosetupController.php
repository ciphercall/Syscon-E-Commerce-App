<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use App\Models\Seosetup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SeosetupController extends Controller
{
    public function index()
    {

        $seosetup=Seosetup::all();
        return view("pages.backends.seosetup.index",["seosetup"=>$seosetup]);

    }

    public function edit($id){
		$seosetup=seosetup::find($id);
    return view("pages.backends.seosetup.index",["seosetup"=>$seosetup]);	
	}

    public function update(Request $request,$id){
        $seosetup = seosetup::find($id);

        if(isset($request->txtHomeTitle)){
          $seosetup->home_s_title=$request->txtHomeTitle;
        }

        if(isset($request->txtHomeDescription)){
          $seosetup->home_s_description=$request->txtHomeDescription;
        }

        if(isset($request->txtAboutTitle)){
          $seosetup->about_s_title=$request->txtAboutTitle;
        }

        if(isset($request->txtAboutDescription)){
          $seosetup->about_s_description=$request->txtAboutDescription;
        }

        if(isset($request->txtContactTitle)){
          $seosetup->contact_s_title=$request->txtContactTitle;
        }

        if(isset($request->txtContactDescription)){
          $seosetup->contact_s_description=$request->txtContactDescription;
        }

        if(isset($request->txtBrandTitle)){
          $seosetup->brand_s_title=$request->txtBrandTitle;
        }

        if(isset($request->txtBrandDescription)){
          $seosetup->brand_s_description=$request->txtBrandDescription;
        }

        if(isset($request->txtSellerTitle)){
          $seosetup->seller_s_title=$request->txtSellerTitle;
        }

        if(isset($request->txtSellerDescription)){
          $seosetup->seller_s_description=$request->txtSellerDescription;
        }

        if(isset($request->txtBlogTitle)){
          $seosetup->blog_s_title=$request->txtBlogTitle;
        }

        if(isset($request->txtBlogDescription)){
          $seosetup->blog_s_description=$request->txtBlogDescription;
        }  
        
        if(isset($request->txtCampaignTitle)){
          $seosetup->campaign_s_title=$request->txtCampaignTitle;
        }

        if(isset($request->txtCampaignDescription)){
          $seosetup->campaign_s_description=$request->txtCampaignDescription;
        }

        if(isset($request->txtFlashTitle)){
          $seosetup->flash_s_title=$request->txtFlashTitle;
        }

        if(isset($request->txtFlashDescription)){
          $seosetup->flash_s_description=$request->txtFlashDescription;
        }

        if(isset($request->txtShopTitle)){
          $seosetup->shop_s_title=$request->txtShopTitle;
        }

        if(isset($request->txtShopDescription)){
          $seosetup->shop_s_description=$request->txtShopDescription;
        }

    

      $seosetup->update();
      return redirect()->back()
      ->with('success',' Updated successfully');   
    }
}
