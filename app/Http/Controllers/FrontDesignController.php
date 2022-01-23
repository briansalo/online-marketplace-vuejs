<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Advertisement;

use DB;
class FrontDesignController extends Controller
{
    //
    public function FrontView(){

             $sortByCount = DB::table('advertisement_user')
             ->select('advertisement_id')
             ->groupBy('advertisement_id')
             ->orderBy(DB::raw('count(advertisement_id)'),'DESC')
             ->take(8)->get();
            
             $ads_id=[];
             foreach($sortByCount as $row){
                $ads_id[] = $row->advertisement_id;
             }

             $implode_id = implode(',', $ads_id);

             //what i do here is ordering the advertisement id base on the array arrangement in $ads_id variable
             $first_display_save_product = Advertisement::whereIn('id',$ads_id)->orderByRaw(DB::raw("FIELD(id,$implode_id)"))->take(4)->get();
    
             if(count($ads_id)>8){
                $second_display_save_product=Advertisement::whereIn('id',$ads_id)
                ->whereNotIn('id',$first_display_save_product->pluck('id')->toArray())
                ->take(4)
                ->get();        
            }else{
                $second_display_save_product=Advertisement::whereNotIn('id',$first_display_save_product->pluck('id')->toArray())
                ->take(4)
                ->get();
            }            

            $first_latest_product = Advertisement::where('published',1)->orderBy('updated_at','desc')->take(4)->get();
   
            $second_latest_product = Advertisement::latest()
            ->where('published',1)
            ->whereNotIn('id',$first_latest_product->pluck('id')->toArray())
            ->take(4)
            ->get();

            $allproduct = Advertisement::inRandomOrder()->where('published',1)->take(20)->get();

     
        return view('front-design',compact('first_display_save_product','second_display_save_product','allproduct','first_latest_product','second_latest_product'));
    }
}
