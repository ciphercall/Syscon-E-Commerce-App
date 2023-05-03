<?php

namespace App\Http\Controllers\Admins;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        //$slider=Slider::all(); 
        $statuses=Status::all();

        $slider =DB::table('sliders')
            ->join('statuses','statuses.id', '=', 'sliders.status')
            ->select('statuses.s_name', 'sliders.*')
            ->get();
        return view("pages.backends.slider.index",["slider"=>$slider, "statuses"=>$statuses]);
        
    }

    public function create()
    {
        $slider=Slider::all();
        $statuses=Status::all(); 
        return view("pages.backends.slider.create",["slider"=>$slider, "statuses"=>$statuses]);
    }

    public function store(Request $request){
        $slider=new Slider; 
        $slider->s_title=$request->txtSliderName;
        $slider->s_description=$request->txtDescription;
        $slider->button_link=$request->txtButtonLink;
        $slider->serial=$request->txtSerial;
        $slider->status=$request->txtStatus;
        $slider->deleted_at=$request->txtDeleted_at;

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $slider->img=$imgName;
            $slider->update();
            $request->file_img->move(public_path('img'),$imgName);
        }
        $slider->save();        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $slider=Slider::find($id);
        $statuses=Status::all();	    
        return view("pages.backends.slider.edit",["slider"=>$slider, "statuses"=>$statuses]);
		
	}

    public function update(Request $request,$id){
        $slider = Slider::find($id);

        if(isset($request->txtSliderName)){
        $slider->s_title=$request->txtSliderName;
        }

        if(isset($request->txtDescription)){
        $slider->s_description=$request->txtDescription;
        }

        if(isset($request->txtButtonLink)){
        $slider->button_link=$request->txtButtonLink;
        }

        if(isset($request->txtSerial)){
        $slider->serial=$request->txtSerial;
        }

        if(isset($request->txtStatus)){
        $slider->status=$request->txtStatus;
        } 

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $slider->img=$imgName;
            $request->file_img->move(public_path('img'),$imgName);
        }

        $slider->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $sliderid=$request->input('d_slider');
		$slider= Slider::find($sliderid);
		$slider->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
