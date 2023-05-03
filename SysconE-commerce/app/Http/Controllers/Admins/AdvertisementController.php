<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Advertisement;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisement=Advertisement::all();
        $ststus=Status::all();
        
        $advertisement =DB::table('advertisements')
        ->join('ststus','ststus.id', '=', 'advertisements.id')
        ->select('advertisements.*','ststus.s_name')
        ->get();
              //dd($advertisement);
        return view("pages.backends.advertisement.index",["advertisement"=>$advertisement, "ststus"=>$ststus]);
        
    }

    public function edit($id){
        $advertisement=Advertisement::find($id);
        $ststus=Status::all();
        return view("pages.backends.advertisement.index",["advertisement"=>$advertisement, "ststus"=>$ststus]);	
	}

        
    public function update(Request $request,$id){
        $advertisement = Advertisement::find($id);
        //dd($request->txtSliderStatus);

        if(isset($request->filemegabanner)){
            $megaimgName = (rand(100,1000)).'.'.$request->filemegabanner->extension();
            $advertisement->megamenu_img=$megaimgName;
            $request->filemegabanner->move(public_path('img'),$megaimgName);
        }

        if(isset($request->txtMegaTitle)){
          $advertisement->megamenu_title=$request->txtMegaTitle;
        }

        if(isset($request->txtMegaDescription)){
            $advertisement->megamenu_description=$request->txtMegaDescription;
        }
  
        if(isset($request->txtMegaButtonlink)){
            $advertisement->megamenu_buttonlink=$request->txtMegaButtonlink;
        }
  
        if(isset($request->txtMegaButtontext)){
            $advertisement->megamenu_buttontext=$request->txtMegaButtontext;
        }

        if(isset($request->txtMegaStatus)){
            $advertisement->megamenu_status=$request->txtMegaStatus;
        }
  
        if(isset($request->filehomeimg)){
            $homeimgName = (rand(100,1000)).'.'.$request->filehomeimg->extension();
            $advertisement->homepage_img=$homeimgName;
            $request->filehomeimg->move(public_path('img'),$homeimgName);
        }
  
        if(isset($request->txtHomepageTitle)){
            $advertisement->homepage_title=$request->txtHomepageTitle;
        }
        
        if(isset($request->txtHomepageDescription)){
            $advertisement->homepage_description=$request->txtHomepageDescription;
        }
  
        if(isset($request->txtHomepageBlink)){
            $advertisement->homepage_buttonlink=$request->txtHomepageBlink;
        }
  
        if(isset($request->filehomefirstimgone)){
            $homefirstimgoneName = (rand(100,1000)).'.'.$request->filehomefirstimgone->extension();
            $advertisement->homepage_first_imgone=$homefirstimgoneName;
            $request->filehomefirstimgone->move(public_path('img'),$homefirstimgoneName);
        }

        if(isset($request->txtHomepageFirsttitleone)){
            $advertisement->homepage_first_titleone=$request->txtHomepageFirsttitleone;
        }

        if(isset($request->txtHomepageFirstDescone)){
            $advertisement->homepage_first_descriptionone=$request->txtHomepageFirstDescone;
        }

        if(isset($request->txtHomepageFirstBLinkone)){
            $advertisement->homepage_first_buttonlinkone=$request->txtHomepageFirstBLinkone;
        }

        if(isset($request->filehomefirstimgtwo)){
            $homefirstimgtwoName = (rand(100,1000)).'.'.$request->filehomefirstimgtwo->extension();
            $advertisement->homepage_first_imgtwo=$homefirstimgtwoName;
            $request->filehomefirstimgtwo->move(public_path('img'),$homefirstimgtwoName);
        }

        if(isset($request->txtHomepageFirsttitletwo)){
            $advertisement->homepage_first_titletwo=$request->txtHomepageFirsttitletwo;
        }

        if(isset($request->txtHomepageFirstDesctwo)){
            $advertisement->homepage_first_descriptiontwo=$request->txtHomepageFirstDesctwo;
        }

        if(isset($request->txtHomepageFirstBLinktwo)){
            $advertisement->homepage_first_buttonlinktwo=$request->txtHomepageFirstBLinktwo;
        }

        if(isset($request->filehomesecondimgone)){
            $homesecondimgoneName = (rand(100,1000)).'.'.$request->filehomesecondimgone->extension();
            $advertisement->homepage_second_imgone=$homesecondimgoneName;
            $request->filehomesecondimgone->move(public_path('img'),$homesecondimgoneName);
        }

        if(isset($request->txtHomepageSecondtitleone)){
            $advertisement->homepage_second_titleone=$request->txtHomepageSecondtitleone;
        }

        if(isset($request->txtHomepageSecondDescone)){
            $advertisement->homepage_second_descriptionone=$request->txtHomepageSecondDescone;
        }

        if(isset($request->txtHomepageSecondBLinkone)){
            $advertisement->homepage_second_buttonlinkone=$request->txtHomepageSecondBLinkone;
        }

        if(isset($request->filehomesecondimgtwo)){
            $homesecondimgtwoName = (rand(100,1000)).'.'.$request->filehomesecondimgtwo->extension();
            $advertisement->homepage_second_imgtwo=$homesecondimgtwoName;
            $request->filehomesecondimgtwo->move(public_path('img'),$homesecondimgtwoName);
        }

        if(isset($request->txtHomepageSecondtitletwo)){
            $advertisement->homepage_second_titletwo=$request->txtHomepageSecondtitletwo;
        }

        if(isset($request->txtHomepageSecondDesctwo)){
            $advertisement->homepage_second_descriptiontwo=$request->txtHomepageSecondDesctwo;
        }

        if(isset($request->txtHomepageSecondBLinktwo)){
            $advertisement->homepage_second_buttonlinktwo=$request->txtHomepageSecondBLinktwo;
        }


        if(isset($request->filehomethirdimgone)){
            $homethirdimgoneName = (rand(100,1000)).'.'.$request->filehomethirdimgone->extension();
            $advertisement->homepage_third_imgone=$homethirdimgoneName;
            $request->filehomethirdimgone->move(public_path('img'),$homethirdimgoneName);
        }

        if(isset($request->txtHomepageThirdtitleone)){
            $advertisement->homepage_third_titleone=$request->txtHomepageThirdtitleone;
        }

        if(isset($request->txtHomepageThirdDescone)){
            $advertisement->homepage_third_descriptionone=$request->txtHomepageThirdDescone;
        }

        if(isset($request->txtHomepageThirdBLinkone)){
            $advertisement->homepage_third_buttonlinkone=$request->txtHomepageThirdBLinkone;
        }

        if(isset($request->filehomethirdimgtwo)){
            $homethirdimgtwoName = (rand(100,1000)).'.'.$request->filehomethirdimgtwo->extension();
            $advertisement->homepage_third_imgtwo=$homethirdimgtwoName;
            $request->filehomethirdimgtwo->move(public_path('img'),$homethirdimgtwoName);
        }

        if(isset($request->txtHomepageThirdtitletwo)){
            $advertisement->homepage_third_titletwo=$request->txtHomepageThirdtitletwo;
        }

        if(isset($request->txtHomepageThirdDesctwo)){
            $advertisement->homepage_third_descriptiontwo=$request->txtHomepageThirdDesctwo;
        }

        if(isset($request->txtHomepageThirdBLinktwo)){
            $advertisement->homepage_third_buttonlinktwo=$request->txtHomepageThirdBLinktwo;
        }

        if(isset($request->fileshoppageimg)){
            $shoppageimgName = (rand(100,1000)).'.'.$request->fileshoppageimg->extension();
            $advertisement->shoppage_img=$shoppageimgName;
            $request->fileshoppageimg->move(public_path('img'),$shoppageimgName);
        }

        if(isset($request->txtShoppageHeaderone)){
            $advertisement->shoppage_headerone=$request->txtShoppageHeaderone;
        }

        if(isset($request->txtShoppageHeadertwo)){
            $advertisement->shoppage_headertwo=$request->txtShoppageHeadertwo;
        }

        if(isset($request->txtShoppageTitleone)){
            $advertisement->shoppage_titleone=$request->txtShoppageTitleone;
        }

        if(isset($request->txtShoppageTitletwo)){
            $advertisement->shoppage_titletwo=$request->txtShoppageTitletwo;
        }

        if(isset($request->txtShoppageStatus)){
            $advertisement->shoppage_status=1;
        }else{
            $advertisement->shoppage_status=2;
        }

        if(isset($request->txtShoppageLink)){
            $advertisement->shoppage_link=$request->txtShoppageLink;
        }

        if(isset($request->txtShoppageButtontext)){
            $advertisement->shoppage_buttontext=$request->txtShoppageButtontext;
        }

        if(isset($request->txtProductStatus)){
            $advertisement->product_status=1;
        }else{
            $advertisement->product_status=2;
        }

        if(isset($request->fileproductimg)){
            $productimgName = (rand(100,1000)).'.'.$request->fileproductimg->extension();
            $advertisement->product_img=$productimgName;
            $request->fileproductimg->move(public_path('img'),$productimgName);
        }

        if(isset($request->txtProductTitle)){
            $advertisement->product_title=$request->txtProductTitle;
        }

        if(isset($request->txtProductDescription)){
            $advertisement->product_description=$request->txtProductDescription;
        }

        if(isset($request->txtProductBLink)){
            $advertisement->product_buttonlink=$request->txtProductBLink;
        }

        if(isset($request->txtShoppingStatus)){
            $advertisement->shopping_status=1;
        }else{
            $advertisement->shopping_status=2;
        }

        if(isset($request->fileshoppingimgone)){
            $shoppingimgoneName = (rand(100,1000)).'.'.$request->fileshoppingimgone->extension();
            $advertisement->shopping_imgone=$shoppingimgoneName;
            $request->fileshoppingimgone->move(public_path('img'),$shoppingimgoneName);
        }

        if(isset($request->txtShoppingTitleone)){
            $advertisement->shopping_titleone=$request->txtShoppingTitleone;
        }

        if(isset($request->txtShoppingDescone)){
            $advertisement->shopping_descriptionone=$request->txtShoppingDescone;
        }

        if(isset($request->txtShoppingBLinkone)){
            $advertisement->shopping_buttonlinkone=$request->txtShoppingBLinkone;
        }

        if(isset($request->fileshoppingimgtwo)){
            $shoppingimgtwoName = (rand(100,1000)).'.'.$request->fileshoppingimgtwo->extension();
            $advertisement->shopping_imgtwo=$shoppingimgtwoName;
            $request->fileshoppingimgtwo->move(public_path('img'),$shoppingimgtwoName);
        }

        if(isset($request->txtShoppingTitletwo)){
            $advertisement->shopping_titletwo=$request->txtShoppingTitletwo;
        }

        if(isset($request->txtShoppingDesctwo)){
            $advertisement->shopping_descriptiontwo=$request->txtShoppingDesctwo;
        }

        if(isset($request->txtShoppingBLinktwo)){
            $advertisement->shopping_buttonlinktwo=$request->txtShoppingBLinktwo;
        }
        
        $advertisement->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
