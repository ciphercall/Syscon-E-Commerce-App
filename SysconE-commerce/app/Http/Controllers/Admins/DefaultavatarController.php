<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Defaultavatar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DefaultavatarController extends Controller
{
    public function index()
    {
        $avater=Defaultavatar::all();   
        return view("pages.backends.default-avatar.index",["avater"=>$avater]);    
    }

    public function edit($id){
		$avater=Defaultavatar::find($id);
        return view("pages.backends.default-avatar.index",["avater"=>$avater]);	
	}

    public function update(Request $request,$id){
        $avater = Defaultavatar::find($id);

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $avater->avatar_img=$imgName;
            $request->file_img->move(public_path('img'),$imgName);
        }

        $avater->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
