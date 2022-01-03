<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;

class MenuCategoryController extends Controller
{
    public function index(){
        
       // $category = Category::with
        return view('front-design',compact('menus'));
    }
}
