<?php

namespace App\Http\Controllers\Admins;

use App\Models\Currencyname;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencynameController extends Controller
{
    public function index()
    {
        $currencyname=Currencyname::all();
        return view("pages.backends.currencyname.index",["currencyname"=>$currencyname]);
        
    }

    public function store(Request $request){
        $currencyname=new Currencyname; 
        $currencyname->currency_name=$request->txtCurrencyName;
        $currencyname->deleted_at=$request->txtDeleted_at;
        $currencyname->save();
               
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
		$currencyname=Currencyname::find($id);
		return response()->json([
			'status'=>200,
			'currencyname'=>$currencyname
		]);
	}

    public function update(Request $request,Currencyname $currencyname){
        $currencynameid=$request->input('cmbCurrencynameId');
        $currencyname = Currencyname::find($currencynameid);
        $currencyname->id=$request->cmbCurrencynameId; 
        $currencyname->currency_name=$request->txtCurrencyName;
        $currencyname->deleted_at=$request->txtDeleted_at;		   
        $currencyname->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $currencynameid=$request->input('d_currencyname');
		$currencyname= Currencyname::find($currencynameid);
		$currencyname->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
