<?php
namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\Currencyname;
use App\Models\Timezone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting=Setting::all();
        $currencyname=Currencyname::all();
        $timezone=Timezone::all();
        
         $setting =DB::table('currencynames')
             ->join('settings','currencynames.id', '=', 'settings.id')
             ->select('currencynames.currency_name', 'settings.*')
             ->get();
              //dd($currencyname);
        return view("pages.backends.general-settings.index",["setting"=>$setting, "currencynames"=>$currencyname, "timezones"=>$timezone]);
        
    }

    public function edit($id){
        $currencyname=Currencyname::all();
		    $setting=Setting::find($id);
        $timezone=Timezone::all();
        return view("pages.backends.general-settings.index",["setting"=>$setting, "currencynames"=>$currencyname, "timezones"=>$timezone]);
		
	}

    public function update(Request $request,$id){
              $setting = Setting::find($id);

              if(isset($request->txtSiteTitle)){
                $setting->site_title=$request->txtSiteTitle;
              }

              if(isset($request->txtPhone)){
                $setting->phone=$request->txtPhone;
              }

              if(isset($request->txtEmail)){
                $setting->email=$request->txtEmail;
              }

              if(isset($request->txtCurrency)){
                $setting->currency=$request->txtCurrency;
              }

              if(isset($request->txtTimeZone)){
                $setting->timezone=$request->txtTimeZone;
              }

              if(isset($request->txtMetaTitle)){
                $setting->meta_title=$request->txtMetaTitle;
              }

              if(isset($request->txtMetaKeyword)){
                $setting->meta_keyword=$request->txtMetaKeyword;
              }

              if(isset($request->txtMetaDescription)){
                $setting->meta_description=$request->txtMetaDescription;
              }

              if(isset($request->txtLiveChatScript)){
                $setting->live_chat_script=$request->txtLiveChatScript;
              }

              if(isset($request->txtThemeColorOne)){
                $setting->theme_color_one=$request->txtThemeColorOne;
              }

              if(isset($request->txtThemeColorTwo)){
                $setting->theme_color_two=$request->txtThemeColorTwo;
              }

              if(isset($request->txtChatLink)){
                $setting->chat_link=$request->txtChatLink;
              }    
              
              
            if(isset($request->file_logo)){
                $logoName = (rand(100,1000)).'.'.$request->file_logo->extension();
                $setting->site_logo=$logoName;
                $request->file_logo->move(public_path('img'),$logoName);
            }


            if(isset($request->filefavicon)){
                $fabiconName = (rand(100,1000)).'.'.$request->filefavicon->extension();
                $setting->site_fabicon=$fabiconName;
                $request->filefavicon->move(public_path('img'),$fabiconName);
            }

            $setting->update();
            return redirect()->back()
            ->with('success',' Updated successfully');   
    }
}
