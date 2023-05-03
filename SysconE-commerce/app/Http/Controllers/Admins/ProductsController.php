<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Products;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Brands;
use App\Models\Status;
use App\Models\Unit;
use App\Models\Specificationkey;
use App\Models\Tax;
use App\Models\Productshowsection;
use App\Models\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function showChildCat(Request $request){      

        $childcat = Childcategory::where('sub_category',$request->id)->get();

        $html="<option selected><-----Choose Child-Category----></option>";

        foreach($childcat as $val){
            $html .='<option value='.$val->id.'>' .$val->child_category. '</option>';
        }
        return $html;

    }

    public function index()
    {
        //$products=Products::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $section=Productshowsection::all();
        //$specification=Specificationkey::all();
        $tax=Tax::all();

        $products =DB::table('products')
             ->join('categories','categories.id', '=', 'products.category')
             ->join('subcategories','subcategories.id', '=', 'products.sub_category')
             ->join('childcategories','childcategories.id', '=', 'products.child_category')
             ->join('brands','brands.id', '=', 'products.brand')
             ->join('statuses','statuses.id', '=', 'products.status')
             ->join('units','units.id', '=', 'products.unit')
             ->join('productshowsections','productshowsections.id', '=', 'products.product_type')
             //->join('specificationkeys','specificationkeys.id', '=', 'products.specification_key')
             ->join('taxes','taxes.id', '=', 'products.tax')
             ->select('products.*','categories.c_name','subcategories.sub_categoryname','childcategories.child_category','brands.name','statuses.s_name', 'units.unit_name', 'taxes.title', 'productshowsections.section_name')
             ->get();
             //return ($products);
        //dd($products);
        return view("pages.backends.products.index",["products"=>$products, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "tax"=>$tax, "section"=>$section]);
        
    }

    public function create()
    {
        $products=Products::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $specification=Specificationkey::all();
        $tax=Tax::all(); 
        $section=Productshowsection::all();
        //$sellers=Seller::all();
        //dd($products);
        return view("pages.backends.products.create",["products"=>$products, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "specification"=>$specification,"tax"=>$tax, "section"=>$section]);
    }

    public function store(Request $request){
        $products=new Products; 
        //$products->seller_id=$request->input('cmbProductsId');
        for ($i=0; $i < count($request->txtSpecificationKey); $i++) { 
            $specification[] = [
             'key'=> $request->txtSpecificationKey[$i],
             'val'=> $request->specifications[$i]
            ];
            
        }
 
        $array = json_encode($specification);
        //return $array;
        //$products->save();
         //return ;
        $products->short_name=$request->txtShortName;
        $products->p_name=$request->txtName;
        $products->slug=$request->txtSlug;
        $products->model_no=$request->txtModelNo;
        $products->category=$request->txtCategory;
        $products->sub_category=$request->txtSubcategory;
        $products->child_category=$request->txtChildcategory;
        $products->brand=$request->txtBrand;
        $products->product_type=$request->txtProductType;
        $products->purchase_scane=$request->txtPurchaseScane;
        $products->sku=$request->txtSku;
        $products->unit=$request->txtUnit;
        $products->price=$request->txtPrice;
        $products->offer_price=$request->txtOfferPrice;
        $products->stock_quantity=$request->txtStockQuantity;
        $products->video_link=$request->txtVideoLink;
        $products->short_description=$request->txtShortDescription;
        $products->long_description=$request->txtLongDescription;
        $products->tag=$request->txtTag;
        $products->tax=$request->txtTax;
        $products->return_policy=$request->txtReturnPolicy;
        $products->warranty=$request->txtWarranty;
        $products->seo_title=$request->txtSeoTitle;
        $products->seo_description=$request->txtSeoDescription;
        //$products->specification=$request->txtSpecification;
        $products->specification_key=$array;
        $products->status=$request->txtStatus;
        $products->seller_id=$request->txtSellerId;
        $products->deleted_at=$request->txtDeleted_at;

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $products->img=$imgName;
            $products->update();
            $request->file_img->move(public_path('img'),$imgName);
        }


        if(isset($request->file_bannerimg)){
            $bannerimgName = (rand(100,1000)).'.'.$request->file_bannerimg->extension();
            $products->banner_img=$bannerimgName;
            $products->update();
            $request->file_bannerimg->move(public_path('img'),$bannerimgName);
        }

        $products->save();
        //dd($products);        
        return back()->with('success','Created Successfully.');
          
    }



    public function edit($id){
        $products=Products::find($id);
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $specification=Specificationkey::all();
        $tax=Tax::all(); 
        $section=Productshowsection::all();	    
        return view("pages.backends.products.edit",["products"=>$products, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "tax"=>$tax, "specification"=>$specification, "section"=>$section]);
		
	}


    public function edithighlight($id){
        $products=Products::find($id); 
        $section=Productshowsection::all();	    
        return view("pages.backends.products.products-highlight",["products"=>$products, "section"=>$section]);
		
	}

    public function update(Request $request,$id){
        $products = Products::find($id);

        if(isset($request->txtShortName)){
        $products->short_name=$request->txtShortName;
        }

        if(isset($request->txtName)){
        $products->p_name=$request->txtName;
        }

        if(isset($request->txtSlug)){
        $products->slug=$request->txtSlug;
        }

        if(isset($request->txtModelNo)){
        $products->model_no=$request->txtModelNo;
        }

        if(isset($request->txtCategory)){
        $products->category=$request->txtCategory;
        } 

        if(isset($request->txtSubcategory)){
        $products->sub_category=$request->txtSubcategory;
        } 

        if(isset($request->txtChildcategory)){
        $products->child_category=$request->txtChildcategory;
        } 

        if(isset($request->txtBrand)){
        $products->brand=$request->txtBrand;
        } 

        if(isset($request->txtProductType)){
        $products->product_type=$request->txtProductType;
        } 

        if(isset($request->txtPurchaseScane)){
        $products->purchase_scane=$request->txtPurchaseScane;
        } 

        if(isset($request->txtSku)){
        $products->sku=$request->txtSku;
        } 

        if(isset($request->txtUnit)){
        $products->unit=$request->txtUnit;
        } 

        if(isset($request->txtPrice)){
        $products->price=$request->txtPrice;
        } 

        if(isset($request->txtOfferPrice)){
        $products->offer_price=$request->txtOfferPrice;
        } 

        if(isset($request->txtStockQuantity)){
        $products->stock_quantity=$request->txtStockQuantity;
        } 

        if(isset($request->txtVideoLink)){
        $products->video_link=$request->txtVideoLink;
        } 

        if(isset($request->txtShortDescription)){
        $products->short_description=$request->txtShortDescription;
        } 

        if(isset($request->txtLongDescription)){
        $products->long_description=$request->txtLongDescription;
        } 

        if(isset($request->txtTag)){
        $products->tag=$request->txtTag;
        } 

        if(isset($request->txtTax)){
        $products->tax=$request->txtTax;
        } 

        if(isset($request->txtReturnPolicy)){
        $products->return_policy=$request->txtReturnPolicy;
        } 

        if(isset($request->txtWarranty)){
        $products->warranty=$request->txtWarranty;
        } 

        if(isset($request->txtSeoTitle)){
        $products->seo_title=$request->txtSeoTitle;
        } 

        if(isset($request->txtSeoDescription)){
        $products->seo_description=$request->txtSeoDescription;
        } 

        // if(isset($request->txtSpecification)){
        // $products->specification=$request->txtSpecification;
        // } 

        if(isset($request->txtStatus)){
        $products->status=$request->txtStatus;
        } 

        if(isset($request->txtStatus)){
        $products->seller_id=$request->txtSellerId;
        } 

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $products->img=$imgName;
            $request->file_img->move(public_path('img'),$imgName);
        }
        
        if(isset($request->file_bannerimg)){
            $bannerimgName = (rand(100,1000)).'.'.$request->file_bannerimg->extension();
            $products->banner_img=$bannerimgName;
            $request->file_bannerimg->move(public_path('img'),$bannerimgName);
        }

        $products->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $productsid=$request->input('d_products');
		$products= Products::find($productsid);
		$products->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
