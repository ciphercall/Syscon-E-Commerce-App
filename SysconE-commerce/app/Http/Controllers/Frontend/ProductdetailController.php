<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Variant;
use App\Models\Variantitem;
use App\Models\Productgallery;
use App\Models\Childcategory;

class ProductdetailController extends Controller
{
    public function product_details(Request $request){

        $data['ProductData'] = Products::where('products.slug',$request->slug)
        ->join('categories','categories.id', '=', 'products.category')
        ->join('brands','brands.id', '=', 'products.brand')
        ->select('categories.c_name', 'brands.name', 'products.*')
        ->first();

        $data['productgallery'] = Productgallery::where('product_id',$data['ProductData']->id)->select('id','product_img')->get();

        $data['varient'] = Variant::where('product_id',$data['ProductData']->id)->select('id','variant_name')->get();

        $data['varientitems'] = Variantitem::where('product_id',$data['ProductData']->id)->select('id','variant_id', 'item')->get();

        $data['sub_category'] = Products::where('sub_category',$data['ProductData']->id)->select('id','p_name', 'price', 'offer_price', 'img', 'banner_img')->get();
        // dd($data);
         return view('pages.frontends.product-details.index', $data);

    }
}
