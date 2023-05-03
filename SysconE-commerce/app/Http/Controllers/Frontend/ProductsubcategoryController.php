<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Subcategory;

class ProductsubcategoryController extends Controller
{
    public function product_sub_category(Request $request){


        $data['SubcategoryId'] = Subcategory::where('slug',$request->slug)->select('id','sub_categoryname')->first();

        // return $SubcategoryId->id;

        $data['ProductData'] = Products::where('sub_category',$data['SubcategoryId']->id)
        ->paginate(18);

        return view('pages.frontends.product_sub_category.index', $data);
    }
}
