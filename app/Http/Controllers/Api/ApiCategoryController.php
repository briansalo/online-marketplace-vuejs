<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;

use App\Models\Advertisement;

class ApiCategoryController extends Controller
{
    public function getCategory(){
        $category =Category::all();
        return response()->json($category);

    }
    public function getSubCategory(Request $request){
        $subcategory =Subcategory::where('category_id',$request->category_id)->get();
       //$subcategory =Subcategory::all();
        return response()->json($subcategory);

    }

    public function getChildCategory(Request $request){
        $childcategory =Childcategory::where('subcategory_id',$request->subcategory_id)->get();
        return response()->json($childcategory);

    }


    public function getAllCategory(Request $request){
        $updatecategory =Category::all();
        return response()->json($updatecategory);

    }

    public function getAllSubcategory(Request $request){
        $updatesubcategory =Subcategory::all();
        return response()->json($updatesubcategory);

    }

    public function getAllChildcategory(Request $request){
        $updatechildcategory =Childcategory::all();
        return response()->json($updatechildcategory);

    }


}
