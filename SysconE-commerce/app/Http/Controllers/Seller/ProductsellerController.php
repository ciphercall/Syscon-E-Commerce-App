<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Sellerproducts;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Brands;
use App\Models\Status;
use App\Models\Unit;
use App\Models\Specificationkey;
use App\Models\Tax;
use App\Models\Productshowsection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsellerController extends Controller
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
        //$productseller=Products::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $section=Productshowsection::all();
        //$specification=Specificationkey::all();
        $tax=Tax::all();

        $productseller =DB::table('products')
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
        //dd($productseller);
        return view("pages.sellers.seller-product.index",["productseller"=>$productseller, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "tax"=>$tax, "section"=>$section]);
        
    }

    public function create()
    {
        $productseller=Products::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $specification=Specificationkey::all();
        $tax=Tax::all(); 
        $section=Productshowsection::all();
        return view("pages.sellers.seller-product.create",["productseller"=>$productseller, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "specification"=>$specification,"tax"=>$tax, "section"=>$section]);
    }

    public function store(Request $request){
        $productseller=new Products; 
        for ($i=0; $i < count($request->txtSpecificationKey); $i++) { 
            $specification[] = [
             'key'=> $request->txtSpecificationKey[$i],
             'val'=> $request->specifications[$i]
            ];
            
        }
 
        $array = json_encode($specification);
        //return $array;
        //$productseller->save();
         //return ;
        $productseller->short_name=$request->txtShortName;
        $productseller->p_name=$request->txtName;
        $productseller->slug=$request->txtSlug;
        $productseller->model_no=$request->txtModelNo;
        $productseller->category=$request->txtCategory;
        $productseller->sub_category=$request->txtSubcategory;
        $productseller->child_category=$request->txtChildcategory;
        $productseller->brand=$request->txtBrand;
        $productseller->product_type=$request->txtProductType;
        $productseller->purchase_scane=$request->txtPurchaseScane;
        $productseller->sku=$request->txtSku;
        $productseller->unit=$request->txtUnit;
        $productseller->price=$request->txtPrice;
        $productseller->offer_price=$request->txtOfferPrice;
        $productseller->stock_quantity=$request->txtStockQuantity;
        $productseller->video_link=$request->txtVideoLink;
        $productseller->short_description=$request->txtShortDescription;
        $productseller->long_description=$request->txtLongDescription;
        $productseller->tag=$request->txtTag;
        $productseller->tax=$request->txtTax;
        $productseller->return_policy=$request->txtReturnPolicy;
        $productseller->warranty=$request->txtWarranty;
        $productseller->seo_title=$request->txtSeoTitle;
        $productseller->seo_description=$request->txtSeoDescription;
        //$productseller->specification=$request->txtSpecification;
        $productseller->specification_key=$array;
        $productseller->status=$request->txtStatus;
        $productseller->seller_id=$request->txtSellerId;
        $productseller->deleted_at=$request->txtDeleted_at;

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $productseller->img=$imgName;
            $productseller->update();
            $request->file_img->move(public_path('img'),$imgName);
        }


        if(isset($request->file_bannerimg)){
            $bannerimgName = (rand(100,1000)).'.'.$request->file_bannerimg->extension();
            $productseller->banner_img=$bannerimgName;
            $productseller->update();
            $request->file_bannerimg->move(public_path('img'),$bannerimgName);
        }

        $productseller->save();
        //dd($productseller);        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $productseller=Products::find($id);
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $specification=Specificationkey::all();
        $tax=Tax::all(); 
        $section=Productshowsection::all();	    
        return view("pages.sellers.seller-product.edit",["productseller"=>$productseller, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "tax"=>$tax, "specification"=>$specification, "section"=>$section]);
		
	}

    
    public function edithighlight($id){
        $productseller=Products::find($id); 
        $section=Productshowsection::all();	    
        return view("pages.sellers.seller-product.product-highlight",["productseller"=>$productseller, "section"=>$section]);
		
	}


    public function update(Request $request,$id){
        $productseller = Products::find($id);

        if(isset($request->txtShortName)){
        $productseller->short_name=$request->txtShortName;
        }

        if(isset($request->txtName)){
        $productseller->p_name=$request->txtName;
        }

        if(isset($request->txtSlug)){
        $productseller->slug=$request->txtSlug;
        }

        if(isset($request->txtModelNo)){
        $productseller->model_no=$request->txtModelNo;
        }

        if(isset($request->txtCategory)){
        $productseller->category=$request->txtCategory;
        } 

        if(isset($request->txtSubcategory)){
        $productseller->sub_category=$request->txtSubcategory;
        } 

        if(isset($request->txtChildcategory)){
        $productseller->child_category=$request->txtChildcategory;
        } 

        if(isset($request->txtBrand)){
        $productseller->brand=$request->txtBrand;
        } 

        if(isset($request->txtProductType)){
        $productseller->product_type=$request->txtProductType;
        } 

        if(isset($request->txtPurchaseScane)){
        $productseller->purchase_scane=$request->txtPurchaseScane;
        } 

        if(isset($request->txtSku)){
        $productseller->sku=$request->txtSku;
        } 

        if(isset($request->txtUnit)){
        $productseller->unit=$request->txtUnit;
        } 

        if(isset($request->txtPrice)){
        $productseller->price=$request->txtPrice;
        } 

        if(isset($request->txtOfferPrice)){
        $productseller->offer_price=$request->txtOfferPrice;
        } 

        if(isset($request->txtStockQuantity)){
        $productseller->stock_quantity=$request->txtStockQuantity;
        } 

        if(isset($request->txtVideoLink)){
        $productseller->video_link=$request->txtVideoLink;
        } 

        if(isset($request->txtShortDescription)){
        $productseller->short_description=$request->txtShortDescription;
        } 

        if(isset($request->txtLongDescription)){
        $productseller->long_description=$request->txtLongDescription;
        } 

        if(isset($request->txtTag)){
        $productseller->tag=$request->txtTag;
        } 

        if(isset($request->txtTax)){
        $productseller->tax=$request->txtTax;
        } 

        if(isset($request->txtReturnPolicy)){
        $productseller->return_policy=$request->txtReturnPolicy;
        } 

        if(isset($request->txtWarranty)){
        $productseller->warranty=$request->txtWarranty;
        } 

        if(isset($request->txtSeoTitle)){
        $productseller->seo_title=$request->txtSeoTitle;
        } 

        if(isset($request->txtSeoDescription)){
        $productseller->seo_description=$request->txtSeoDescription;
        } 

        // if(isset($request->txtSpecification)){
        // $productseller->specification=$request->txtSpecification;
        // } 

        if(isset($request->txtStatus)){
        $productseller->status=$request->txtStatus;
        } 

        if(isset($request->txtSellerId)){
        $productseller->seller_id=$request->txtSellerId;
        } 


        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $productseller->img=$imgName;
            $request->file_img->move(public_path('img'),$imgName);
        }
        
        if(isset($request->file_bannerimg)){
            $bannerimgName = (rand(100,1000)).'.'.$request->file_bannerimg->extension();
            $productseller->banner_img=$bannerimgName;
            $request->file_bannerimg->move(public_path('img'),$bannerimgName);
        }

        $productseller->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    public function destroy(Request $request){  
        $productsellerid=$request->input('d_productseller');
		$productseller= Products::find($productsellerid);
		$productseller->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
