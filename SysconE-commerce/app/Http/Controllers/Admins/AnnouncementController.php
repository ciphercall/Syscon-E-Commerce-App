<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcement=Announcement::all();  
        return view("pages.backends.announcement.index",["announcement"=>$announcement]);
        
    }

    public function edit($id){
		$announcement=Announcement::find($id);
        return view("pages.backends.announcement.index",["announcement"=>$announcement]);	
	  }

    public function update(Request $request,$id){
        $announcement = Announcement::find($id);

        if(isset($request->txtAnnouncementTitle)){
          $announcement->announcement_title=$request->txtAnnouncementTitle;
        }

        if(isset($request->txtAnnouncementDescription)){
          $announcement->announcement_description=$request->txtAnnouncementDescription;
        }

        if(isset($request->txtFooterText)){
          $announcement->footer_text=$request->txtFooterText;
        }

        if(isset($request->txtSessionQuantity)){
          $announcement->session_quantity=$request->txtSessionQuantity;
        }

        if(isset($request->txtStatus)){
          $announcement->status=$request->txtStatus;
        }


        if(isset($request->file_img)){
          $ImgName = (rand(100,1000)).'.'.$request->file_img->extension();
          $announcement->announcement_img=$ImgName;
          $request->file_img->move(public_path('img'),$ImgName);
        }

        $announcement->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
