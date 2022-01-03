<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Advertisement;

class ProductCategoryController extends Controller
{

    public function findBaseOnCategory(Request $request, Category $categorySlug){

        if($request->min_price == null  && $request->max_price == null){
               $advertisementWithoutFilterPrice = $categorySlug->ads;//the ads methods from subcategory model          
        }else{
            $advertisementBaseFilterPrice = Advertisement::where('category_id',$categorySlug->id)
            ->whereBetween('price',[$request->min_price, $request->max_price])
            ->get();

        }

        $advertisement=($advertisementWithoutFilterPrice)??$advertisementBaseFilterPrice;

        $filterCategory = $categorySlug->ads->unique('subcategory_id');

       return view('products.category',compact('advertisement','filterCategory'));

    }



    public function findBaseOnSubCategory(Request $request,$categorySlug,Subcategory $subcategorySlug){//meaning of this is $subcategorySlug variable is connected to Subcategory model
         
        if($request->min_price == null  && $request->max_price == null){
             $advertisementWithoutFilterPrice = $subcategorySlug->ads;//the ads methods from subcategory model
        }else{
            $advertisementBaseFilterPrice = Advertisement::where('subcategory_id',$subcategorySlug->id)
            ->whereBetween('price',[$request->min_price, $request->max_price])
            ->get();      
        }
            //condtion if $advertisementWithoutFilterPrice is have value then assign to advertisement variable else advertisement variable assign to $advertisementBaseFilterPrice
        $advertisement=($advertisementWithoutFilterPrice)??$advertisementBaseFilterPrice;

        $filterChildCategory = $subcategorySlug->ads->unique('childcategory_id');

        return view('products.subcategory',compact('advertisement','filterChildCategory'));
    }   




    public function findBaseOnChildCategory
    (Request $request,$categorySlug,Subcategory $subcategorySlug,Childcategory $childcategorySlug){

        if($request->min_price == null  && $request->max_price == null){
             $advertisementWithoutFilterPrice = $childcategorySlug->ads;//the ads methods from subcategory model
        }else{
            $advertisementBaseFilterPrice = Advertisement::where('childcategory_id',$childcategorySlug->id)
            ->whereBetween('price',[$request->min_price, $request->max_price])
            ->get();     
        }
            //condtion if $advertisementWithoutFilterPrice is have value then assign to advertisement variable else advertisement variable assign to $advertisementBaseFilterPrice
        $advertisement=($advertisementWithoutFilterPrice)??$advertisementBaseFilterPrice;

        $filterChildCategory = $subcategorySlug->ads->unique('childcategory_id');

        return view('products.childcategory',compact('advertisement','filterChildCategory'));
    }




    public function ShowProductInfo($id, $slug){
      
        $advertisement = Advertisement::where('id', $id)->where('slug', $slug)->first();
       // dd($advertisement);
        return view('products.product_info',compact('advertisement'));


    }
}
