<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Topbarcontact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopbarcontactController extends Controller
{
    public function index()
    {
        $topbarcontact=Topbarcontact::all();
        
        return view("pages.backends.topbar-contact.index",["topbarcontact"=>$topbarcontact]);
        
    }

    public function edit($id){
		$topbarcontact=Topbarcontact::find($id);
        return view("pages.backends.topbar-contact.index",["topbarcontact"=>$topbarcontact]);	
	}

    public function update(Request $request,$id){
        $topbarcontact = Topbarcontact::find($id);

        if(isset($request->txtPhone)){
          $topbarcontact->phone=$request->txtPhone;
        }

        if(isset($request->txtEmail)){
            $topbarcontact->email=$request->txtEmail;
          }

        $topbarcontact->update();
        return redirect()->back()
        ->with('success',' Updated successfully');   
    }
}
