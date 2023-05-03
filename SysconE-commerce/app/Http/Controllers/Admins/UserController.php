<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user=User::all();
        return view("pages.frontends.user-login.index",["user"=>$user]);
        
    }

    public function userindex()
    {
        $user=User::all();
        return view("pages.backends.users.index",["user"=>$user]);
        
    }

    public function store(Request $request){
        $user=new User; 
        $user->name=$request->txtName;
        $user->email=$request->txtEmail;
        $user->role_id=$request->txtRoleId;
        // $user->email_verified_at=$request->txtEmailVerifiedAt;
        $user->password=Hash::make($request->txtPassword);
        $user->confirm_password=Hash::make($request->txtConfirmPassword);
        $user->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$user=User::find($id);
		return response()->json([
			'status'=>200,
			'user'=>$user
		]);
	}

    public function update(Request $request,User $user){
        $userid=$request->input('cmbUserId');
        $user = User::find($userid);
        $user->id=$request->cmbUserId; 
        $user->name=$request->txtName;
        $user->email=$request->txtEmail;
        $user->role_id=$request->txtRoleId;
        // $user->email_verified_at=$request->txtEmailVerifiedAt;
        $user->password=Hash::make($request->txtPassword);
        $user->confirm_password=Hash::make($request->txtConfirmPassword);	   
        $user->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $userid=$request->input('d_user');
		$user= User::find($userid);
		$user->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
