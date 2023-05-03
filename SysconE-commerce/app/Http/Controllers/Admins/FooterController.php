<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Footer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer=Footer::all(); 
        return view("pages.backends.footer.index",["footer"=>$footer]);
        
    }

    public function edit($id){
		$footer=Footer::find($id);
        return view("pages.backends.footer.index",["footer"=>$footer]);	
	}

    public function update(Request $request,$id){
        $footer = Footer::find($id);

        if(isset($request->txtfooteremail)){
          $footer->f_email=$request->txtfooteremail;
        }

        if(isset($request->txtFooterPhone)){
          $footer->f_phone=$request->txtFooterPhone;
        }

        if(isset($request->txtfooteraddress)){
          $footer->f_address=$request->txtfooteraddress;
        }

        if(isset($request->txtfootertitle)){
          $footer->img_title=$request->txtfootertitle;
        }

        if(isset($request->txtfootercopyright)){
          $footer->f_copyright=$request->txtfootercopyright;
        }

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $footer->f_img=$imgName;
            $request->file_img->move(public_path('img'),$imgName);
        }

        $footer->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
