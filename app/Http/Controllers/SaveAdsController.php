<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Advertisement;

use DB;

class SaveAdsController extends Controller
{
    //

    public function AdsSave(Request $request){
      
        $ad = Advertisement::find($request->adsId);
        $ad->userads()->syncWithoutDetaching($request->userId);

    }

    public function GetMySavedAds(){

         $adsId = DB::table('advertisement_user')
            ->where('user_id',auth()->user()->id)
            ->pluck('advertisement_id');

            $advertisements = Advertisement::whereIn('id', $adsId)->get();

            return view('backend.dashboard.content.save_ads.save_ads_index', compact('advertisements'));
    }


    public function RemoveSavedAds($id){
      DB::table('advertisement_user')->where('user_id', auth()->user()->id)
      ->where('advertisement_id',$id)
      ->delete();
      return back()->with('message','Ad removed form the save list');
    }

}
