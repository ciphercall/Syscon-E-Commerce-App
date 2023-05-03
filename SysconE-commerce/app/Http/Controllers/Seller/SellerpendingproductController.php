<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Support\Facades\DB;
use App\Models\Sellerpendingproduct;
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

class SellerpendingproductController extends Controller
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
        //$sellerpendingproduct=Sellerpendingproduct::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $section=Productshowsection::all();
        //$specification=Specificationkey::all();
        $tax=Tax::all();

        $sellerpendingproduct =DB::table('sellerpendingproducts')
             ->join('categories','categories.id', '=', 'sellerpendingproducts.category')
             ->join('subcategories','subcategories.id', '=', 'sellerpendingproducts.sub_category')
             ->join('childcategories','childcategories.id', '=', 'sellerpendingproducts.child_category')
             ->join('brands','brands.id', '=', 'sellerpendingproducts.brand')
             ->join('statuses','statuses.id', '=', 'sellerpendingproducts.status')
             ->join('units','units.id', '=', 'sellerpendingproducts.unit')
             ->join('productshowsections','productshowsections.id', '=', 'sellerpendingproducts.product_type')
             //->join('specificationkeys','specificationkeys.id', '=', 'sellerpendingproducts.specification_key')
             ->join('taxes','taxes.id', '=', 'sellerpendingproducts.tax')
             ->select('sellerpendingproducts.*','categories.c_name','subcategories.sub_categoryname','childcategories.child_category','brands.name','statuses.s_name', 'units.unit_name', 'taxes.title', 'productshowsections.section_name')
             ->get();
        //dd($sellerpendingproduct);
        return view("pages.sellers.seller-pending-product.index",["sellerpendingproduct"=>$sellerpendingproduct, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "tax"=>$tax, "section"=>$section]);
        
    }

    
    public function create()
    {
        $sellerpendingproduct=Sellerpendingproduct::all();
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $specification=Specificationkey::all();
        $tax=Tax::all(); 
        $section=Productshowsection::all();
        return view("pages.sellers.seller-product.create",["sellerpendingproduct"=>$sellerpendingproduct, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "specification"=>$specification,"tax"=>$tax, "section"=>$section]);
    }

    public function store(Request $request){
        $sellerpendingproduct=new Sellerpendingproduct; 
        for ($i=0; $i < count($request->txtSpecificationKey); $i++) { 
            $specification[] = [
             'key'=> $request->txtSpecificationKey[$i],
             'val'=> $request->specifications[$i]
            ];
            
        }
 
        $array = json_encode($specification);
        //return $array;
        //$sellerpendingproduct->save();
         //return ;
        $sellerpendingproduct->short_name=$request->txtShortName;
        $sellerpendingproduct->sp_name=$request->txtName;
        $sellerpendingproduct->seller_name=$request->txtSellerName;
        $sellerpendingproduct->slug=$request->txtSlug;
        $sellerpendingproduct->model_no=$request->txtModelNo;
        $sellerpendingproduct->category=$request->txtCategory;
        $sellerpendingproduct->sub_category=$request->txtSubcategory;
        $sellerpendingproduct->child_category=$request->txtChildcategory;
        $sellerpendingproduct->brand=$request->txtBrand;
        $sellerpendingproduct->product_type=$request->txtProductType;
        $sellerpendingproduct->purchase_scane=$request->txtPurchaseScane;
        $sellerpendingproduct->sku=$request->txtSku;
        $sellerpendingproduct->unit=$request->txtUnit;
        $sellerpendingproduct->price=$request->txtPrice;
        $sellerpendingproduct->offer_price=$request->txtOfferPrice;
        $sellerpendingproduct->stock_quantity=$request->txtStockQuantity;
        $sellerpendingproduct->video_link=$request->txtVideoLink;
        $sellerpendingproduct->short_description=$request->txtShortDescription;
        $sellerpendingproduct->long_description=$request->txtLongDescription;
        $sellerpendingproduct->tag=$request->txtTag;
        $sellerpendingproduct->tax=$request->txtTax;
        $sellerpendingproduct->return_policy=$request->txtReturnPolicy;
        $sellerpendingproduct->warranty=$request->txtWarranty;
        $sellerpendingproduct->seo_title=$request->txtSeoTitle;
        $sellerpendingproduct->seo_description=$request->txtSeoDescription;
        //$sellerpendingproduct->specification=$request->txtSpecification;
        $sellerpendingproduct->specification_key=$array;
        $sellerpendingproduct->status=$request->txtStatus;
        $sellerpendingproduct->deleted_at=$request->txtDeleted_at;

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $sellerpendingproduct->img=$imgName;
            $sellerpendingproduct->update();
            $request->file_img->move(public_path('img'),$imgName);
        }


        if(isset($request->file_bannerimg)){
            $bannerimgName = (rand(100,1000)).'.'.$request->file_bannerimg->extension();
            $sellerpendingproduct->banner_img=$bannerimgName;
            $sellerpendingproduct->update();
            $request->file_bannerimg->move(public_path('img'),$bannerimgName);
        }

        $sellerpendingproduct->save();
        //dd($sellerpendingproduct);        
        return back()->with('success','Created Successfully.');
          
    }


    public function edit($id){
        $sellerpendingproduct=Sellerpendingproduct::find($id);
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $childcategories=Childcategory::all();
        $brands=Brands::all();
        $statuses=Status::all();
        $units=Unit::all();
        $specification=Specificationkey::all();
        $tax=Tax::all(); 
        $section=Productshowsection::all();	    
        return view("pages.sellers.seller-pending-product.edit",["sellerpendingproduct"=>$sellerpendingproduct, "categories"=>$categories, "subcategories"=>$subcategories, "childcategories"=>$childcategories, "brands"=>$brands, "statuses"=>$statuses, "units"=>$units, "tax"=>$tax, "specification"=>$specification, "section"=>$section]);
		
	}

    public function edithighlight($id){
        $sellerpendingproduct=Sellerpendingproduct::find($id); 
        $section=Productshowsection::all();	    
        return view("pages.sellers.seller-pending-product.product-highlight",["sellerpendingproduct"=>$sellerpendingproduct, "section"=>$section]);
		
	}


    public function update(Request $request,$id){
        $sellerpendingproduct = Sellerproducts::find($id);

        if(isset($request->txtShortName)){
        $sellerpendingproduct->short_name=$request->txtShortName;
        }

        if(isset($request->txtName)){
        $sellerpendingproduct->sp_name=$request->txtName;
        }

        if(isset($request->txtSellerName)){
        $sellerpendingproduct->seller_name=$request->txtSellerName;
        }

        if(isset($request->txtSlug)){
        $sellerpendingproduct->slug=$request->txtSlug;
        }

        if(isset($request->txtModelNo)){
        $sellerpendingproduct->model_no=$request->txtModelNo;
        }

        if(isset($request->txtCategory)){
        $sellerpendingproduct->category=$request->txtCategory;
        } 

        if(isset($request->txtSubcategory)){
        $sellerpendingproduct->sub_category=$request->txtSubcategory;
        } 

        if(isset($request->txtChildcategory)){
        $sellerpendingproduct->child_category=$request->txtChildcategory;
        } 

        if(isset($request->txtBrand)){
        $sellerpendingproduct->brand=$request->txtBrand;
        } 

        if(isset($request->txtProductType)){
        $sellerpendingproduct->product_type=$request->txtProductType;
        } 

        if(isset($request->txtPurchaseScane)){
        $sellerpendingproduct->purchase_scane=$request->txtPurchaseScane;
        } 

        if(isset($request->txtSku)){
        $sellerpendingproduct->sku=$request->txtSku;
        } 

        if(isset($request->txtUnit)){
        $sellerpendingproduct->unit=$request->txtUnit;
        } 

        if(isset($request->txtPrice)){
        $sellerpendingproduct->price=$request->txtPrice;
        } 

        if(isset($request->txtOfferPrice)){
        $sellerpendingproduct->offer_price=$request->txtOfferPrice;
        } 

        if(isset($request->txtStockQuantity)){
        $sellerpendingproduct->stock_quantity=$request->txtStockQuantity;
        } 

        if(isset($request->txtVideoLink)){
        $sellerpendingproduct->video_link=$request->txtVideoLink;
        } 

        if(isset($request->txtShortDescription)){
        $sellerpendingproduct->short_description=$request->txtShortDescription;
        } 

        if(isset($request->txtLongDescription)){
        $sellerpendingproduct->long_description=$request->txtLongDescription;
        } 

        if(isset($request->txtTag)){
        $sellerpendingproduct->tag=$request->txtTag;
        } 

        if(isset($request->txtTax)){
        $sellerpendingproduct->tax=$request->txtTax;
        } 

        if(isset($request->txtReturnPolicy)){
        $sellerpendingproduct->return_policy=$request->txtReturnPolicy;
        } 

        if(isset($request->txtWarranty)){
        $sellerpendingproduct->warranty=$request->txtWarranty;
        } 

        if(isset($request->txtSeoTitle)){
        $sellerpendingproduct->seo_title=$request->txtSeoTitle;
        } 

        if(isset($request->txtSeoDescription)){
        $sellerpendingproduct->seo_description=$request->txtSeoDescription;
        } 

        // if(isset($request->txtSpecification)){
        // $sellerpendingproduct->specification=$request->txtSpecification;
        // } 

        if(isset($request->txtStatus)){
        $sellerpendingproduct->status=$request->txtStatus;
        } 

        if(isset($request->file_img)){
            $imgName = (rand(100,1000)).'.'.$request->file_img->extension();
            $sellerpendingproduct->img=$imgName;
            $request->file_img->move(public_path('img'),$imgName);
        }
        
        if(isset($request->file_bannerimg)){
            $bannerimgName = (rand(100,1000)).'.'.$request->file_bannerimg->extension();
            $sellerpendingproduct->banner_img=$bannerimgName;
            $request->file_bannerimg->move(public_path('img'),$bannerimgName);
        }

        $sellerpendingproduct->update();
        return redirect()->back()
        ->with('success',' Updated successfully'); 
                    
    }

    
    public function destroy(Request $request){  
        $sellerpendingproductid=$request->input('d_sellerpendingproduct');
		$sellerpendingproduct= Sellerproducts::find($sellerpendingproductid);
		$sellerpendingproduct->delete();

        return redirect()->back()
        ->with('success',' Deleted successfully');
    }
}
