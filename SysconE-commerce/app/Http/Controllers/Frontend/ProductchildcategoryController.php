<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Childcategory;

class ProductchildcategoryController extends Controller
{
    public function product_child_category(Request $request){


        $data['ChildcategoryId'] = Childcategory::where('slug',$request->slug)->select('id','child_category')->first();

        // return $ChildcategoryId->id;

        $data['ProductData'] = Products::where('child_category',$data['ChildcategoryId']->id)
        ->paginate(18);

        return view('pages.frontends.product_child_category.index', $data);
    }
}
