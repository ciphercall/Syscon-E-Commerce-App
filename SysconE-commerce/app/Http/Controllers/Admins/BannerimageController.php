<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Bannerimage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerimageController extends Controller
{
    public function index()
    {
        $bannerimage=Bannerimage::all();
              //dd($bannerimage);
        return view("pages.backends.banner-image.index",["bannerimage"=>$bannerimage]);
        
    }

    public function update(Request $request,$id){
        $bannerimage=Bannerimage::find($id);
        
        if(isset($request->txtBannerName)){
          $bannerimage->b_name=$request->txtBannerName;
        }

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $bannerimage->b_img=$imgName;
            $request->file_img->move(public_path('img'),$imgName);
        }

        $bannerimage->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
