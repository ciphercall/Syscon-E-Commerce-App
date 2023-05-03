<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Support\Facades\DB;
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
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerproductsController extends Controller
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
        //$sellerproducts=Products::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $section=Productshowsection::all();
        //$specification=Specificationkey::all();
        $tax=Tax::all();

        $sellerproducts =DB::table('products')
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
        //dd($products);
        return view("pages.backends.seller-products.index",["sellerproducts"=>$sellerproducts, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "tax"=>$tax, "section"=>$section]);
        
    }


    public function create()
    {
        $sellerproducts=Products::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $specification=Specificationkey::all();
        $tax=Tax::all(); 
        $section=Productshowsection::all();
        return view("pages.backends.seller-products.create",["sellerproducts"=>$sellerproducts, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "specification"=>$specification,"tax"=>$tax, "section"=>$section]);
    }

    
    public function store(Request $request){
        $sellerproducts=new Products; 
        for ($i=0; $i < count($request->txtSpecificationKey); $i++) { 
            $specification[] = [
             'key'=> $request->txtSpecificationKey[$i],
             'val'=> $request->specifications[$i]
            ];
            
        }
 
        $array = json_encode($specification);
        //return $array;
        //$sellerproducts->save();
         //return ;
        $sellerproducts->short_name=$request->txtShortName;
        $sellerproducts->p_name=$request->txtName;
        $sellerproducts->slug=$request->txtSlug;
        $sellerproducts->model_no=$request->txtModelNo;
        $sellerproducts->category=$request->txtCategory;
        $sellerproducts->sub_category=$request->txtSubcategory;
        $sellerproducts->child_category=$request->txtChildcategory;
        $sellerproducts->brand=$request->txtBrand;
        $sellerproducts->product_type=$request->txtProductType;
        $sellerproducts->purchase_scane=$request->txtPurchaseScane;
        $sellerproducts->sku=$request->txtSku;
        $sellerproducts->unit=$request->txtUnit;
        $sellerproducts->price=$request->txtPrice;
        $sellerproducts->offer_price=$request->txtOfferPrice;
        $sellerproducts->stock_quantity=$request->txtStockQuantity;
        $sellerproducts->video_link=$request->txtVideoLink;
        $sellerproducts->short_description=$request->txtShortDescription;
        $sellerproducts->long_description=$request->txtLongDescription;
        $sellerproducts->tag=$request->txtTag;
        $sellerproducts->tax=$request->txtTax;
        $sellerproducts->return_policy=$request->txtReturnPolicy;
        $sellerproducts->warranty=$request->txtWarranty;
        $sellerproducts->seo_title=$request->txtSeoTitle;
        $sellerproducts->seo_description=$request->txtSeoDescription;
        //$sellerproducts->specification=$request->txtSpecification;
        $sellerproducts->specification_key=$array;
        $sellerproducts->status=$request->txtStatus;
        $sellerproducts->seller_id=$request->txtSellerId;
        $sellerproducts->deleted_at=$request->txtDeleted_at;

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $sellerproducts->img=$imgName;
            $sellerproducts->update();
            $request->file_img->move(public_path('img'),$imgName);
        }


        if(isset($request->file_bannerimg)){
            $bannerimgName = (rand(100,1000)).'.'.$request->file_bannerimg->extension();
            $sellerproducts->banner_img=$bannerimgName;
            $sellerproducts->update();
            $request->file_bannerimg->move(public_path('img'),$bannerimgName);
        }

        $sellerproducts->save();
        //dd($sellerproducts);        
        return back()->with('success','Created Successfully.');
          
    }

    public function edit($id){
        $sellerproducts=Products::find($id);
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $specification=Specificationkey::all();
        $tax=Tax::all(); 
        $section=Productshowsection::all();	    
        return view("pages.backends.seller-products.edit",["sellerproducts"=>$sellerproducts, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "tax"=>$tax, "specification"=>$specification, "section"=>$section]);
		
	}

    public function edithighlight($id){
        $sellerproducts=Products::find($id); 
        $section=Productshowsection::all();	    
        return view("pages.backends.seller-products.products-highlight",["sellerproducts"=>$sellerproducts, "section"=>$section]);
		
	}

    public function update(Request $request,$id){
        $sellerproducts = Products::find($id);

        if(isset($request->txtShortName)){
        $sellerproducts->short_name=$request->txtShortName;
        }

        if(isset($request->txtName)){
        $sellerproducts->p_name=$request->txtName;
        }

        if(isset($request->txtSlug)){
        $sellerproducts->slug=$request->txtSlug;
        }

        if(isset($request->txtModelNo)){
        $sellerproducts->model_no=$request->txtModelNo;
        }

        if(isset($request->txtCategory)){
        $sellerproducts->category=$request->txtCategory;
        } 

        if(isset($request->txtSubcategory)){
        $sellerproducts->sub_category=$request->txtSubcategory;
        } 

        if(isset($request->txtChildcategory)){
        $sellerproducts->child_category=$request->txtChildcategory;
        } 

        if(isset($request->txtBrand)){
        $sellerproducts->brand=$request->txtBrand;
        } 

        if(isset($request->txtProductType)){
        $sellerproducts->product_type=$request->txtProductType;
        } 

        if(isset($request->txtPurchaseScane)){
        $sellerproducts->purchase_scane=$request->txtPurchaseScane;
        } 

        if(isset($request->txtSku)){
        $sellerproducts->sku=$request->txtSku;
        } 

        if(isset($request->txtUnit)){
        $sellerproducts->unit=$request->txtUnit;
        } 

        if(isset($request->txtPrice)){
        $sellerproducts->price=$request->txtPrice;
        } 

        if(isset($request->txtOfferPrice)){
        $sellerproducts->offer_price=$request->txtOfferPrice;
        } 

        if(isset($request->txtStockQuantity)){
        $sellerproducts->stock_quantity=$request->txtStockQuantity;
        } 

        if(isset($request->txtVideoLink)){
        $sellerproducts->video_link=$request->txtVideoLink;
        } 

        if(isset($request->txtShortDescription)){
        $sellerproducts->short_description=$request->txtShortDescription;
        } 

        if(isset($request->txtLongDescription)){
        $sellerproducts->long_description=$request->txtLongDescription;
        } 

        if(isset($request->txtTag)){
        $sellerproducts->tag=$request->txtTag;
        } 

        if(isset($request->txtTax)){
        $sellerproducts->tax=$request->txtTax;
        } 

        if(isset($request->txtReturnPolicy)){
        $sellerproducts->return_policy=$request->txtReturnPolicy;
        } 

        if(isset($request->txtWarranty)){
        $sellerproducts->warranty=$request->txtWarranty;
        } 

        if(isset($request->txtSeoTitle)){
        $sellerproducts->seo_title=$request->txtSeoTitle;
        } 

        if(isset($request->txtSeoDescription)){
        $sellerproducts->seo_description=$request->txtSeoDescription;
        } 

        // if(isset($request->txtSpecification)){
        // $sellerproducts->specification=$request->txtSpecification;
        // } 

        if(isset($request->txtStatus)){
        $sellerproducts->status=$request->txtStatus;
        } 

        if(isset($request->txtSellerId)){
        $sellerproducts->seller_id=$request->txtSellerId;
        } 


        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $sellerproducts->img=$imgName;
            $request->file_img->move(public_path('img'),$imgName);
        }
        
        if(isset($request->file_bannerimg)){
            $bannerimgName = (rand(100,1000)).'.'.$request->file_bannerimg->extension();
            $sellerproducts->banner_img=$bannerimgName;
            $request->file_bannerimg->move(public_path('img'),$bannerimgName);
        }

        $sellerproducts->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    
    public function destroy(Request $request){  
        $sellerproductsid=$request->input('d_sellerproducts');
		$sellerproducts= Products::find($sellerproductsid);
		$sellerproducts->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
