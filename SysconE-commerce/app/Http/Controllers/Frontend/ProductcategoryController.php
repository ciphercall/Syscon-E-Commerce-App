<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Productcategory;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Subcategory;

class ProductcategoryController extends Controller
{
    public function product_category(Request $request){

        //return $request->slug;

        $data['CategoryId'] = Category::where('slug',$request->slug)->select('id','c_name')->first();

        // return $CategoryId->id;

        $data['ProductData'] = Products::where('category',$data['CategoryId']->id)
        ->paginate(18);


        return view('pages.frontends.product_category.index', $data);
    }
}
